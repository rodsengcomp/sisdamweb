<?php

// Name:		PolylineEncoder
// Version:		0.3
// Author:		Gabriel Svennerberg
// Email:		gabriel@svennerberg.com
// URL:			www.svennerberg.com
// Created:		November 2008


// Descrição
//
// Esta classe é usada para codificar um número de coordenadas em uma polilinha codificada
// para ser usado no Google Maps
//
// O código é originalmente de Jim Hribar [http://www.jimhribar.com/cgi-bin/moin.cgi/PolylineEncoder]
// e é reescrito por mim em uma classe. Também fiz algumas pequenas alterações no que o método Encode retorna.
//
// O código é escrito usando os métodos e algoritmos encontrados no trabalho de Mark MacClure [http://facstaff.unca.edu/mcmcclur/GoogleMaps/EncodePolyline/]
//
// Construtor:
// polylineEncoder = new PolylineEncoder (points, numLevels ?, zoomFactor ?, verySmall ?, forceEndpoints?);
//
// O único argumento necessário são os pontos que são um
// matriz que contém as coordenadas da polilinha
//
// numLevels e zoomFactor são opcionais e indicam
// quantos níveis diferentes de ampliação a polilinha possui
// e a alteração na ampliação entre esses níveis,
// Valores padrão para estes são
// numLevels = 18
// zoomFactor = 2
//
// Certifique-se de usar o sam numLevels e o zoomFactor no seu Javascript ou as linhas não serão exibidas corretamente
//
// verySmall indica o comprimento de um objeto pouco visível
// objeto no nível mais alto de zoom. O valor padrão
// é 0,00001 Ao diminuir esse número, você pode diminuir o número de coordenadas usadas.

// forceEndpoints indica se o parâmetro
// pontos finais devem estar visíveis em todos os níveis de zoom.
// forceEndpoints é opcional com um valor padrão
// de verdade. Provavelmente deve permanecer verdadeiro independentemente.
//
// Principais métodos:
//
// * PolylineEncoder.dpEncode ()
//
// Aceita uma matriz de objetos latLng (veja abaixo)
// Retorna uma matriz associativa com a polilinha codificada.
// array ["Points"] = As coordenadas codificadas
// array ["Níveis"] = Nível codificado
// array ["PointsLiteral"] = As coordenadas codificadas como um literal
// array ["NumLevels"] = Retorna o valor para NumLevels
// array ["ZoomFactor"] = Retorna o valor para ZoomFactor
//
//
//
// * PolylineEncoder.getPoints ()
//
// Retorna uma matriz com as coordenadas fornecidas (não codificadas)
//
//
// Licenciado sob a licença MIT:
// http://www.opensource.org/licenses/mit-license.php
// Pode ser usado e alterado livremente
// Nenhuma garantia se aplica

class PolylineEncoder
{

    // The constructor
    function __construct(array $points = array(), $numLevels = 18, $zoomFactor = 2, $verySmall = 0.00001, $forceEndpoints = true)
    {
        $this->points = $points;
        $this->numLevels = $numLevels;
        $this->zoomFactor = $zoomFactor;
        $this->verySmall = $verySmall;
        $this->forceEndpoints = $forceEndpoints;

        for ($i = 0; $i < $this->numLevels; $i++) {
            $this->zoomLevelBreaks[$i] = $this->verySmall * pow($this->zoomFactor, $this->numLevels - $i - 1);
        }
    }

    protected $points;
    protected $numLevels;
    protected $zoomFactor;
    protected $verySmall;
    protected $forceEndpoints;
    protected $zoomLevelBreaks;

    // Returns the supplied coordinates
    public function getPoints()
    {
        return $this->points;
    }


    // The main method which is called to perform the encoding
    // Returns an associative array containing the encoded points, levels,
    // an escaped string literal containing the encoded points
    // It also returns the zoomFactor and numLevels
    public function dpEncode()
    {
        if (count($this->points) > 2) {

            $stack[] = array(0, count($this->points) - 1);

            while (count($stack) > 0) {
                $current = array_pop($stack);
                $maxDist = 0;
                $absMaxDist = 0;

                for ($i = $current[0] + 1; $i < $current[1]; $i++) {
                    $temp = self::distance($this->points[$i], $this->points[$current[0]], $this->points[$current[1]]);
                    if ($temp > $maxDist) {
                        $maxDist = $temp;
                        $maxLoc = $i;
                        if ($maxDist > $absMaxDist) {
                            $absMaxDist = $maxDist;
                        }
                    }
                }

                if ($maxDist > $this->verySmall) {
                    $dists[$maxLoc] = $maxDist;
                    array_push($stack, array($current[0], $maxLoc));
                    array_push($stack, array($maxLoc, $current[1]));
                }
            }
        }

        $encodedPoints = self::createEncodings($this->points, $dists);
        $encodedLevels = self::encodeLevels($this->points, $dists, $absMaxDist);
        $encodedPointsLiteral = str_replace('\\', "\\\\", $encodedPoints);

        $polyline["Points"] = $encodedPoints;
        $polyline["Levels"] = $encodedLevels;
        $polyline["PointsLiteral"] = $encodedPointsLiteral;
        $polyline["ZoomFactor"] = $this->zoomFactor;
        $polyline["NumLevels"] = $this->numLevels;

        return $polyline;
    }

    protected function computeLevel($dd)
    {
        if ($dd > $this->verySmall) {
            $lev = 0;
            while ($dd < $this->zoomLevelBreaks[$lev]) {
                $lev++;
            }
        }

        return $lev;
    }

    protected function distance($p0, $p1, $p2)
    {
        if ($p1[0] == $p2[0] && $p1[1] == $p2[1]) {
            $out = sqrt(pow($p2[0] - $p0[0], 2) + pow($p2[1] - $p0[1], 2));
        } else {
            $u = (($p0[0] - $p1[0]) * ($p2[0] - $p1[0]) + ($p0[1] - $p1[1]) * ($p2[1] - $p1[1])) / (pow($p2[0] - $p1[0], 2) + pow($p2[1] - $p1[1], 2));
            if ($u <= 0) {
                $out = sqrt(pow($p0[0] - $p1[0], 2) + pow($p0[1] - $p1[1], 2));
            }
            if ($u >= 1) {
                $out = sqrt(pow($p0[0] - $p2[0], 2) + pow($p0[1] - $p2[1], 2));
            }
            if (0 < $u && $u < 1) {
                $out = sqrt(pow($p0[0] - $p1[0] - $u * ($p2[0] - $p1[0]), 2) + pow($p0[1] - $p1[1] - $u * ($p2[1] - $p1[1]), 2));
            }
        }

        return $out;
    }

    protected static function encodeSignedNumber($num)
    {
        $sgn_num = $num << 1;

        if ($num < 0) {
            $sgn_num = ~($sgn_num);
        }

        return self::encodeNumber($sgn_num);
    }

    protected static function createEncodings($points, $dists)
    {
        $plat = 0;
        $plng = 0;
        $encoded_points = "";

        for ($i = 0; $i < count($points); $i++) {
            if (isset($dists[$i]) || $i == 0 || $i == count($points) - 1) {
                $point = $points[$i];
                $lat = $point[0];
                $lng = $point[1];
                $late5 = floor($lat * 1e5);
                $lnge5 = floor($lng * 1e5);
                $dlat = $late5 - $plat;
                $dlng = $lnge5 - $plng;
                $plat = $late5;
                $plng = $lnge5;
                $encoded_points .= self::encodeSignedNumber($dlat) . self::encodeSignedNumber($dlng);
            }
        }

        return $encoded_points;
    }

    protected function encodeLevels($points, $dists, $absMaxDist)
    {
        $encoded_levels = "";

        if ($this->forceEndpoints) {
            $encoded_levels .= self::encodeNumber($this->numLevels - 1);
        } else {
            $encoded_levels .= self::encodeNumber($this->numLevels - self::computeLevel($absMaxDist) - 1);
        }

        for ($i = 1; $i < count($points) - 1; $i++) {
            if (isset($dists[$i])) {
                $encoded_levels .= self::encodeNumber($this->numLevels - self::computeLevel($dists[$i]) - 1);
            }
        }

        if ($this->forceEndpoints) {
            $encoded_levels .= self::encodeNumber($this->numLevels - 1);
        } else {
            $encoded_levels .= self::encodeNumber($this->numLevels - self::computeLevel($absMaxDist) - 1);
        }

        return $encoded_levels;
    }

    protected static function encodeNumber($num)
    {
        $encodeString = "";

        while ($num >= 0x20) {
            $nextValue = (0x20 | ($num & 0x1f)) + 63;
            $encodeString .= chr($nextValue);
            $num >>= 5;
        }

        $finalValue = $num + 63;
        $encodeString .= chr($finalValue);

        return $encodeString;
    }
}
