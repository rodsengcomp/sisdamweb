    require(["jquery", "gmap", "hbs!views/template/mapa-solicitacoes"],
        function($, gmaps, template) {

            var pinImage = new google.maps.MarkerImage("/resolucao-web/img/pin.png");

            var pinShadow = new google.maps.MarkerImage(location.protocol + "//chart.apis.google.com/chart?chst=d_map_pin_shadow",
                new google.maps.Size(40, 37),
                new google.maps.Point(7, 7),
                new google.maps.Point(7, 37)
            );

            var mapOptions = {
                center: new gmaps.LatLng(-23.550002,-46.634238),
                zoom: 11,
                mapTypeId: gmaps.MapTypeId.ROADMAP
            };

            var map = new gmaps.Map($("#map_canvas").get(0), mapOptions);
            var solicitacoes = new Array();
            solicitacoes.push({
                id: 20496586,
                latitude : -23.5310137,
                longitude : -46.6381672,
                imgSolicitacao : 'https://sigrc.prefeitura.sp.gov.br/static/2017/07/tQdAZ5fSSAaPZ5aGEeOCOA.png',
                imgTipoSolicitacao : 'https://sigrc.prefeitura.sp.gov.br/assets/media/cube/icone_023.png',
                descricao: 'Denúncias de locais com acúmulo de água limpa e parada',
                context: '/resolucao-web'

            });

            for(index in solicitacoes) {

                var position = new gmaps.LatLng(solicitacoes[index].latitude, solicitacoes[index].longitude);
                var marker = new gmaps.Marker({
                    icon: pinImage,
                    shadow: pinShadow,
                    position: position,
                    map: map,
                    msg : new gmaps.InfoWindow({
                        content: template(solicitacoes[index])
                    })
                });

                gmaps.event.addListener(marker, 'click', function() {
                    this.get('msg').open(this.get('map'), this);
                });
            }

            $(function() {
                var menuOrigem = 'label.orfas';
                menuOrigem = menuOrigem.replace('label.', '');

                $('#menu-' + menuOrigem).addClass("ativo");
            });

        });
