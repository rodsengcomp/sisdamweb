-- Comandos sql para atualizar banco de dados --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
-- Criado: 15/12/2018 11:30

-- Criando a tabela tbldengue
SELECT tbldengue.nDoc,tbldengue.DataEntrada,tbldengue.Da,tbldengue.Setor1,tbldengue.Cep1,tbldengue.Logradouro,tbldengue.Endereco1,tbldengue.Bairro1,tbldengue.UBS1,
tbldengue.PgGuia1,tbldengue.DataBloqueio,tbldengue.DataNeb,tbldengue.ResultadoTr,tbldengue.UnidadeNotificadora,tbldengue.usuarioAlteracao,tbldengue.DataAlteracao,
tbldengue.usuarioLer,tbldengue.DataLer,tbldengue.Impressao,tbldengue.Latitude,tbldengue.Longitude,tbldengue.RuaGoogle,tbldengue.Descarte,tbldengue.idRua,
tbldengue.agravo,tbldengue.type,dengnet.ID_UNIDADE,dengnet.DT_NOTIFIC,dengnet.NM_PACIENT,dengnet.DT_SIN_PRI,dengnet.NU_DDD_TEL,dengnet.NU_TELEFON,
dengnet.NU_NUMERO,dengnet.NM_COMPLEM,dengnet.DS_OBS,dengnet.CLASSI_FIN,dengnet.CRITERIO,dengnet.DT_OBITO,dengnet.DT_ENCERRA,dengnet.DT_SORO,dengnet.RESUL_SORO,
dengnet.DT_NS1,dengnet.RESUL_NS1,
resultado_ccz.Coleta,resultado_ccz.LIBERACAO_EM,resultado_ccz.Resultado_IgM_Panbio,resultado_ccz.Resultado_IgM_Focus,resultado_ccz.Resultado_NS1
FROM dengnet INNER JOIN tbldengue ON dengnet.NU_NOTIFIC = tbldengue.nDoc
LEFT JOIN resultado_ccz ON dengnet.NU_NOTIFIC = resultado_ccz.SINAN
WHERE dengnet.ID_DISTRIT="70";

-- DROP TABLE tbldengue;

-- Criando a tbldengue

CREATE TABLE `tbldengue` (`nDoc` int(11) NOT NULL,`DataEntrada` varchar(10) DEFAULT NULL,`Da` varchar(2) DEFAULT NULL,`Setor1` varchar(4) DEFAULT NULL,
`Cep1` varchar(9) DEFAULT NULL,`Logradouro` varchar(15) DEFAULT NULL,`Endereco1` varchar(83) DEFAULT NULL,`Bairro1` varchar(30) DEFAULT NULL,
`UBS1` varchar(33) DEFAULT NULL,`PgGuia1` varchar(7) DEFAULT NULL,`DataBloqueio` varchar(10) DEFAULT NULL,`DataNeb` varchar(10) DEFAULT NULL,
`ResultadoTr` varchar(19) DEFAULT 'Exame Nao Realizado',`UnidadeNotificadora` varchar(60) DEFAULT NULL,`usuarioAlteracao` varchar(13) DEFAULT NULL,
`DataAlteracao` datetime DEFAULT CURRENT_TIMESTAMP,`usuarioLer` varchar(13) DEFAULT NULL,`DataLer` varchar(19) DEFAULT NULL,`Impressao` varchar(2) DEFAULT '0',
`Latitude` float(10,6) DEFAULT NULL,`Longitude` float(10,6) DEFAULT NULL,`RuaGoogle` varchar(103) DEFAULT NULL,`Descarte` varchar(2) DEFAULT '0',
`idRua` varchar(4) DEFAULT NULL,`agravo` varchar(20) NOT NULL DEFAULT 'DENGUE',`type` varchar(30) NOT NULL DEFAULT 'Dengue',`ID_UNIDADE` int(7) DEFAULT NULL,
`DT_NOTIFIC` varchar(10) DEFAULT NULL,`NM_PACIENT` varchar(54) DEFAULT NULL,`DT_SIN_PRI` varchar(10) DEFAULT NULL,`NU_DDD_TEL` varchar(2) DEFAULT NULL,
`NU_TELEFON` varchar(9) DEFAULT NULL,`NU_NUMERO` varchar(6) DEFAULT NULL,`NM_COMPLEM` varchar(30) DEFAULT NULL,`DS_OBS` varchar(255) DEFAULT NULL,
`CLASSI_FIN` varchar(2) DEFAULT NULL,`CRITERIO` varchar(1) DEFAULT NULL,`DT_OBITO` varchar(10) DEFAULT NULL,`DT_ENCERRA` varchar(10) DEFAULT NULL,
`DT_SORO` varchar(10) DEFAULT NULL,`RESUL_SORO` varchar(1) DEFAULT NULL,`DT_NS1` varchar(10) DEFAULT NULL,`RESUL_NS1` varchar(1) DEFAULT NULL,
`Coleta` varchar(13) DEFAULT NULL,`LIBERACAO_EM` varchar(10) DEFAULT NULL,`Resultado_IgM_Panbio` varchar(17) DEFAULT NULL,
`Resultado_IgM_Focus` varchar(17) DEFAULT NULL,`Resultado_NS1` varchar(12) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Alterando nDoc para chave primária
ALTER TABLE `tbldengue`
  ADD PRIMARY KEY (`nDoc`);

  -- Carregando os dados do excel csv da pasta abaixo ...
  LOAD DATA LOCAL INFILE 'c:/Users/SMS/Desktop/csv/tbldengue.csv'
  INTO TABLE `tbldengue` CHARACTER SET latin1 FIELDS TERMINATED BY ';' IGNORE 1 ROWS
  (`nDoc`,`DataEntrada`,`Da`,`Setor1`,`Cep1`,`Logradouro`,`Endereco1`,`Bairro1`,`UBS1`,`PgGuia1`,`DataBloqueio`,`DataNeb`,`ResultadoTr`,`UnidadeNotificadora`,
  `usuarioAlteracao`,`DataAlteracao`,`usuarioLer`,`DataLer`,`Impressao`,`Latitude`,`Longitude`,`RuaGoogle`,`Descarte`,`idRua`,`agravo`,`type`,`ID_UNIDADE`,
  `DT_NOTIFIC`,`NM_PACIENT`,`DT_SIN_PRI`,`NU_DDD_TEL`,`NU_TELEFON`,`NU_NUMERO`,`NM_COMPLEM`,`DS_OBS`,`CLASSI_FIN`,`CRITERIO`,`DT_OBITO`,`DT_ENCERRA`,
  `DT_SORO`,`RESUL_SORO`,`DT_NS1`,`RESUL_NS1`,
  `Coleta`,`LIBERACAO_EM`,`Resultado_IgM_Panbio`,`Resultado_IgM_Focus`,`Resultado_NS1`);