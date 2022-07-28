-- Comandos sql para apagar tabelas do banco de dados --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
-- Criado: 15/05/2018 11:30
-- Alterado em 01/04/2019 às 10:26

-- drop table esus_total;

-- Estrutura da tabela `esus_total`
--

CREATE TABLE `esus_total` (`Número da Notificação` bigint(12) NOT NULL,`Estado da Notificação` text DEFAULT NULL,`Município da Notificação` text DEFAULT NULL,
            `Telefone 1` varchar(16) DEFAULT NULL,`Estado de Residência` varchar(19) DEFAULT NULL,`Sexo` varchar(9) DEFAULT NULL,`Tem CPF?` varchar(3) DEFAULT NULL,
            `Estrangeiro` varchar(3) DEFAULT NULL,`CPF` varchar(14) DEFAULT NULL,`Município de Residência` varchar(26) DEFAULT NULL,`CNS` varchar(20) DEFAULT NULL,
            `Data de Nascimento` varchar(10) DEFAULT NULL,`Passaporte` varchar(9) DEFAULT NULL,`Nome Completo da Mãe` text DEFAULT NULL,`Pais de origem` varchar(5) DEFAULT NULL,
            `Telefone 2` varchar(17) DEFAULT NULL,`Nome Completo` text DEFAULT NULL,`É profissional de saúde?` varchar(3) DEFAULT NULL,`CBO` varchar(75) DEFAULT NULL,
            `CEP` varchar(10) DEFAULT NULL,`Logradouro` varchar(103) DEFAULT NULL,`Número (ou SN para Sem Número)` varchar(14) DEFAULT NULL,`Complemento` varchar(59) DEFAULT NULL,
            `Bairro` varchar(65) DEFAULT NULL,`Raça/Cor` varchar(30) DEFAULT NULL,`Profissional de Segurança` varchar(3) DEFAULT NULL,`Etnia` varchar(13) DEFAULT NULL,`E-mail` varchar(38) DEFAULT NULL,
            `Comunidade/Povo Tradicional?` varchar(3) DEFAULT NULL,`Comunidade/Povo Tradicional` varchar(3) DEFAULT NULL,`Se triagem de população específica` varchar(32) DEFAULT NULL,
            `Descrição local de testagem` varchar(32) DEFAULT NULL,`Descrição triagem população es` varchar(32) DEFAULT NULL,`Local de realização de testagem` varchar(32) DEFAULT NULL,
            `Descrição` varchar(32) DEFAULT NULL,`Estratégia` varchar(32) DEFAULT NULL,`Se busca ativa de assintomático` varchar(32) DEFAULT NULL,`Data dose de Reforço` varchar(10) DEFAULT NULL,
            `Recebeu  vacina  Covid-19?` varchar(3) DEFAULT NULL,`Lote 1ª dose` varchar(12) DEFAULT NULL,`Sintomas` varchar(30) DEFAULT NULL,`Data da Notificação` varchar(10) DEFAULT NULL,
            `Descrição do Sintoma` varchar(81) DEFAULT NULL,`Doses` text DEFAULT NULL,`Laboratório produtor dose de r` text DEFAULT NULL,`Descrição da Condição` varchar(32) DEFAULT NULL,
            `Condições` text DEFAULT NULL,`Data do início dos sintomas` text NOT NULL,`Data 1ª dose` varchar(10) DEFAULT NULL,`Data 2ª dose` varchar(10) DEFAULT NULL,
            `Laboratório produtor 1ª dose` varchar(12) DEFAULT NULL,`Lote dose de reforço` varchar(12) DEFAULT NULL,`Laboratório produtor 2ª dose` varchar(12) DEFAULT NULL,
            `Lote 2ª dose` varchar(12) DEFAULT NULL,`Estado do Teste RT-PCR` varchar(20) DEFAULT NULL,`Data da Coleta RT-PCR` varchar(10) DEFAULT NULL,`Resultado RT-PCR` varchar(50) DEFAULT NULL,
            `Estado do Teste RT-LAMP` varchar(20) DEFAULT NULL,`Data da Coleta RT-LAMP` varchar(10) DEFAULT NULL,`Resultado RT-LAMP` varchar(50) DEFAULT NULL,`Estado do Teste Sorológico IgA` varchar(20) DEFAULT NULL,
            `Data da Coleta Sorológico IgA` varchar(10) DEFAULT NULL,`Resultado Sorológico IgA` varchar(50) DEFAULT NULL,`Estado do Teste Sorológico IgM` varchar(20) DEFAULT NULL,
            `Data da Coleta Sorológico IgM` varchar(10) DEFAULT NULL,`Resultado Sorológico IgM` varchar(50) DEFAULT NULL,`Estado do Teste Sorológico IgG` varchar(20) DEFAULT NULL,
            `Data da Coleta Sorológico IgG` varchar(10) DEFAULT NULL,`Resultado Sorológico IgG` varchar(50) DEFAULT NULL,`Estado do Teste Sorológico Anti Tot` varchar(20) DEFAULT NULL,
            `Data da Coleta Sorológico Anti Tot` varchar(10) DEFAULT NULL,`Resultado Sorológico Anticorpos Totais` varchar(50) DEFAULT NULL,`Estado do Teste Rápido anticorpo IgM` varchar(20) DEFAULT NULL,
            `Data da Coleta Rápido anticorpo IgM` varchar(10) DEFAULT NULL,`Resultado Rápido anticorpo IgM` varchar(50) DEFAULT NULL,`Estado do Teste Rápido anticorpo IgG` varchar(20) DEFAULT NULL,
            `Data da Coleta Rápido anticorpo IgG` varchar(10) DEFAULT NULL,`Resultado Rápido anticorpo IgG` varchar(50) DEFAULT NULL,`Estado do Teste Rápido antígeno` varchar(20) DEFAULT NULL,
            `Data da Coleta Rápido antígeno` varchar(10) DEFAULT NULL,`Resultado Rápido antígeno` varchar(50) DEFAULT NULL,`Lote TR Antígeno` varchar(12) DEFAULT NULL,
            `Fabricante TR Antígeno` varchar(42) DEFAULT NULL,`Estado do Teste Outros 1` varchar(20) DEFAULT NULL,`Tipo de Teste Outros 1` varchar(20) DEFAULT NULL,`Data da Coleta Outros 1` varchar(10) DEFAULT NULL,
            `Resultado Outros 1` varchar(29) DEFAULT NULL,`Lote Outros 1` varchar(12) DEFAULT NULL,`Fabricante Outros 1` varchar(12) DEFAULT NULL,`Tipo de Teste Outros 2` varchar(20) DEFAULT NULL,
            `Estado do Teste Outros 2` varchar(20) DEFAULT NULL,`Data da Coleta Outros 2` varchar(10) DEFAULT NULL,`Resultado Outros 2` varchar(29) DEFAULT NULL,`Lote Outros 2` varchar(12) DEFAULT NULL,
            `Fabricante Outros 2` varchar(12) DEFAULT NULL,`Tipo de Teste Outros 3` varchar(20) DEFAULT NULL,`Estado do Teste Outros 3` varchar(20) DEFAULT NULL,`Data da Coleta Outros 3` varchar(10) DEFAULT NULL,
            `Resultado Outros 3` varchar(29) DEFAULT NULL,`Lote Outros 3` varchar(12) DEFAULT NULL,`Fabricante Outros 3` varchar(12) DEFAULT NULL,`Evolução Caso` varchar(24) DEFAULT NULL,
            `Data de encerramento` varchar(10) DEFAULT NULL,`Classificação Final` varchar(32) DEFAULT NULL,`CNES Laboratório` varchar(10) DEFAULT NULL,`CNES Notificação` varchar(10) DEFAULT NULL,
            `Notificante CPF` varchar(14) DEFAULT NULL,`Notificante Email` varchar(52) DEFAULT NULL,`Notificante Nome Completo` text DEFAULT NULL,
            `Notificante CNPJ` varchar(18) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ALTER TABLE `esus_total` ADD PRIMARY KEY (`Número da Notificação`);

-- Criando a tabela `esus`
CREATE TABLE `esus` (`Número da Notificação` bigint(12) DEFAULT NULL,`Data da Notificação` varchar(10) DEFAULT NULL,`Telefone de Contato` varchar(17) DEFAULT NULL,
             `Nome Completo` varchar(108) DEFAULT NULL,`Data de Nascimento` varchar(10) DEFAULT NULL,`Sexo` varchar(1) DEFAULT NULL,`Data do início dos sintomas` varchar(10) DEFAULT NULL,
             `Se Dt Sint` varchar(10) DEFAULT NULL,`Telefone Celular` varchar(17) DEFAULT NULL,`CEP` varchar(10) DEFAULT NULL,`Logradouro` varchar(200) DEFAULT NULL,
             `Bairro` varchar(100) DEFAULT NULL,`Número (ou SN para Sem Número)` varchar(30) DEFAULT NULL,`Complemento` varchar(100) DEFAULT NULL,`Ubs` varchar(200) DEFAULT NULL,
             `UVIS` varchar(15) DEFAULT NULL,`LATSIRGAS` varchar(33) DEFAULT NULL,`LONSIRGAS` varchar(33) DEFAULT NULL,`Da` varchar(2) DEFAULT NULL,`CNES` varchar(7) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Criando a tabela `esus_geo`
CREATE TABLE `esus_geo` (`NU_NOTIFIC` bigint(13) DEFAULT NULL,`NU_CEP` varchar(10) DEFAULT NULL,`LATSIRGAS` varchar(10) DEFAULT NULL,`LONSIRGAS` varchar(10) DEFAULT NULL,`COD_DISTRI` int(2) DEFAULT NULL,`CNES` int(7) DEFAULT NULL,
  `NOMEUBS` varchar(100) DEFAULT NULL)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Criando a Tabela Aline
CREATE TABLE `esus_aline` (`NOME` varchar(100) DEFAULT NULL,`PROT_ESUS` varchar(14) DEFAULT NULL,`DT_NOTIFIC` varchar(10) DEFAULT NULL,`CAD_EXAME` varchar(10) DEFAULT NULL,
             `PROF_SAUDE` varchar(7) DEFAULT NULL,`UBS_ABRANG` varchar(33) DEFAULT NULL,`LOCAL_ATEND` varchar(27) DEFAULT NULL,`TIP_TEST` varchar(53) DEFAULT NULL,
             `DT_PCR_RAP` varchar(10) DEFAULT NULL,`RES_PCR_RAP_ESUS` varchar(8) DEFAULT NULL,`DT_SORO_ESUS` varchar(10) DEFAULT NULL,`RES_IGM_ESUS` varchar(30) DEFAULT NULL,
             `RES_IGG_ESUS` varchar(30) DEFAULT NULL,`RES_IGA_ESUS` varchar(30) DEFAULT NULL,`RES_TOT_ESUS` varchar(10) DEFAULT NULL,`DT_COL_UVIS` varchar(10) DEFAULT NULL,
             `RES_UVIS` varchar(30) DEFAULT NULL,`CLASS_FIN` varchar(50) DEFAULT NULL,`EVOLUCAO` varchar(50) DEFAULT NULL,`INFO` varchar(28) DEFAULT NULL,
             `CONT_EF_1_S_2_N` varchar(10) DEFAULT NULL,`1_CURA_2_INT_3_TENT_ESG_4_OBT` varchar(1) DEFAULT NULL,`DT_ALT_OBT` varchar(10) DEFAULT NULL,
             `MT_NAO_LOC` varchar(10) DEFAULT NULL,`DT_SINT` varchar(10) DEFAULT NULL,`SE_DT_SINT` varchar(4) DEFAULT NULL,`RACA_COR` varchar(50) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `esus_aline_atual` (`NOME` varchar(100) DEFAULT NULL,`PROT_ESUS` bigint(14) DEFAULT NULL,`DT_NOTIFIC` varchar(10) DEFAULT NULL,`TEL` varchar(15) DEFAULT NULL,
             `PROF_SAUDE` varchar(7) DEFAULT NULL,`UBS_ABRANG` varchar(50) DEFAULT NULL,`DATA_BANCO` varchar(100) DEFAULT NULL,`TIP_TEST` varchar(53) DEFAULT NULL,
             `DT_PCR_RAP` varchar(10) DEFAULT NULL,`RES_PCR_RAP_ESUS` varchar(20) DEFAULT NULL,`DT_SORO_ESUS` varchar(10) DEFAULT NULL,`RES_IGM_ESUS` varchar(30) DEFAULT NULL,
             `RES_IGG_ESUS` varchar(30) DEFAULT NULL,`RES_IGA_ESUS` varchar(30) DEFAULT NULL,`RES_TOT_ESUS` varchar(10) DEFAULT NULL,`DT_COL_UVIS` varchar(10) DEFAULT NULL,
             `RES_UVIS` varchar(30) DEFAULT NULL,`CLASS_FIN` varchar(50) DEFAULT NULL,`EVOLUCAO` varchar(50) DEFAULT NULL,`INFO` varchar(150) DEFAULT NULL,
             `CONT_EF_1_S_2_N` varchar(10) DEFAULT NULL,`1_CURA_2_INT_3_TENT_ESG_4_OBT` varchar(1) DEFAULT NULL,`DT_ALT_OBT` varchar(10) DEFAULT NULL,`MT_NAO_LOC` varchar(10) DEFAULT NULL,
             `DT_SINT` varchar(10) DEFAULT NULL,`SE_DT_SINT` varchar(4) DEFAULT NULL,`RACA_COR` varchar(50) DEFAULT NULL,`SINT_GUST` varchar(3) DEFAULT NULL,`SINT_OLF` varchar(3) DEFAULT NULL,
             `SINT_ASS` varchar(3) DEFAULT NULL,`DESC_SINT` varchar(100) DEFAULT NULL,`DT_NASC` varchar(10) DEFAULT NULL,`DT_ENC` varchar(10) DEFAULT NULL,`NT_CNES` varchar(12) DEFAULT NULL,
             `NT_EMAIL` varchar(52) DEFAULT NULL,`NT_NOME` varchar(50) DEFAULT NULL,`CEP` varchar(10) NOT NULL,`SEXO` varchar(1) NOT NULL,`NU_NM` varchar(10) NOT NULL,
             `NM_COMP` varchar(50) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `esus_aline_atual_final` (`NOME` varchar(100) DEFAULT NULL,`PROT_ESUS` bigint(14) DEFAULT NULL,`DT_NOTIFIC` varchar(10) DEFAULT NULL,`TEL` varchar(15) DEFAULT NULL,
             `PROF_SAUDE` varchar(7) DEFAULT NULL,`UBS_ABRANG` varchar(50) DEFAULT NULL,`TIP_TEST` varchar(53) DEFAULT NULL,`DT_PCR_RAP` varchar(10) DEFAULT NULL,
             `RES_PCR_RAP_ESUS` varchar(20) DEFAULT NULL,`DT_SORO_ESUS` varchar(10) DEFAULT NULL,`RES_IGM_ESUS` varchar(30) DEFAULT NULL,`RES_IGG_ESUS` varchar(30) DEFAULT NULL,
             `RES_IGA_ESUS` varchar(30) DEFAULT NULL,`RES_TOT_ESUS` varchar(10) DEFAULT NULL,`DT_COL_UVIS` varchar(10) DEFAULT NULL,`RES_UVIS` varchar(30) DEFAULT NULL,
             `CLASS_FIN` varchar(50) DEFAULT NULL,`EVOLUCAO` varchar(50) DEFAULT NULL,`INFO` varchar(150) DEFAULT NULL,`CONT_EF_1_S_2_N` varchar(10) DEFAULT NULL,
             `1_CURA_2_INT_3_TENT_ESG_4_OBT` varchar(1) DEFAULT NULL,`DT_ALT_OBT` varchar(10) DEFAULT NULL,`MT_NAO_LOC` varchar(10) DEFAULT NULL,`DT_SINT` varchar(10) DEFAULT NULL,
             `SE_DT_SINT` varchar(4) DEFAULT NULL,`RACA_COR` varchar(50) DEFAULT NULL,`SINT_GUST` varchar(3) DEFAULT NULL,`SINT_OLF` varchar(3) DEFAULT NULL,`SINT_ASS` varchar(3) DEFAULT NULL,
             `DESC_SINT` varchar(100) DEFAULT NULL,`DT_NASC` varchar(10) DEFAULT NULL,`DT_ENC` varchar(10) DEFAULT NULL,`NT_CNES` varchar(12) DEFAULT NULL,`NT_EMAIL` varchar(52) DEFAULT NULL,
             `NT_NOME` varchar(50) DEFAULT NULL,`CEP` varchar(10) NOT NULL,`SEXO` varchar(1) NOT NULL,`NU_NM` varchar(10) NOT NULL,`NM_COMP` varchar(50) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `esus_covisa` (`COD_DISTRI` varchar(2) DEFAULT NULL,`NU_NOTIFIC` varchar(13) NOT NULL,`NU_CPF` varchar(11) DEFAULT NULL,`OP_CNES` varchar(51) DEFAULT NULL,
             `DT_NOTIFIC` varchar(10) DEFAULT NULL,`IT_SNT_NOT` varchar(15) DEFAULT NULL,`COUNT1` varchar(6) DEFAULT NULL,`ID_UF_NOTI` varchar(38) DEFAULT NULL,
             `ID_MN_NOTI` varchar(100) DEFAULT NULL,`NM_PACIENT` varchar(100) DEFAULT NULL,`NM_MAE_PAC` varchar(100) DEFAULT NULL,`CS_SEXO` varchar(10) DEFAULT NULL,
             `DT_NASC` varchar(10) DEFAULT NULL,`NU_IDADE` varchar(8) DEFAULT NULL,`CS_RACA` varchar(34) DEFAULT NULL,`ETNIA` varchar(92) DEFAULT NULL,`NM_OCUPA` varchar(49) DEFAULT NULL,
             `ID_CNS_SUS` varchar(15) NOT NULL,`PROF_SAUDE` varchar(10) DEFAULT NULL,`PROF_SEGUR` varchar(10) DEFAULT NULL,`ESTRANGEIR` varchar(29) DEFAULT NULL,
             `ID_PASSAPO` varchar(57) DEFAULT NULL,`NM_LOGRADO` varchar(62) DEFAULT NULL,`NU_NUMERO` varchar(18) DEFAULT NULL,`NM_COMPLEM` varchar(29) DEFAULT NULL,
             `NM_BAIRRO` varchar(30) DEFAULT NULL,`ID_MN_RESI` varchar(15) DEFAULT NULL,`NU_CEP` varchar(15) DEFAULT NULL,`ID_UF_RESI` varchar(15) DEFAULT NULL,
             `NU_CELULAR` varchar(15) DEFAULT NULL,`NU_TELEFON` varchar(15) DEFAULT NULL,`DT_SIN_PRI` varchar(10) DEFAULT NULL,`SEM_PRI` varchar(24) DEFAULT NULL,
             `ANO_PRI` varchar(39) DEFAULT NULL,`ANO` varchar(100) DEFAULT NULL,`SINTOMAS` varchar(86) DEFAULT NULL,`FEBRE` varchar(5) DEFAULT NULL,`TOSSE` varchar(5) DEFAULT NULL,
             `GARGANTA` varchar(8) DEFAULT NULL,`DISPNEIA` varchar(8) DEFAULT NULL,`DESC_RESP` varchar(9) DEFAULT NULL,`SATURACAO` varchar(9) DEFAULT NULL,`DIARREIA` varchar(8) DEFAULT NULL,
             `VOMITO` varchar(6) DEFAULT NULL,`DOR_ABD` varchar(7) DEFAULT NULL,`CORIZA` varchar(6) DEFAULT NULL,`CABECA` varchar(6) DEFAULT NULL,`OUTRO_SIN` varchar(9) DEFAULT NULL,
             `ASSINTOMAT` varchar(48) DEFAULT NULL,`COMORBID` varchar(73) DEFAULT NULL,`GESTANTE` varchar(8) DEFAULT NULL,`PUERPERA` varchar(8) DEFAULT NULL,
             `CARDIOPATI` varchar(10) DEFAULT NULL,`HEMATOLOGI` varchar(10) DEFAULT NULL,`SIND_DOWN` varchar(9) DEFAULT NULL,`HEPATICA` varchar(8) DEFAULT NULL,
             `ASMA` varchar(4) DEFAULT NULL,`DIABETES` varchar(8) DEFAULT NULL,`NEUROLOGIC` varchar(10) DEFAULT NULL,`PNEUMOPATI` varchar(10) DEFAULT NULL,`IMUNODEPRE` varchar(10) DEFAULT NULL,
             `RENAL` varchar(5) DEFAULT NULL,`OBESIDADE` varchar(9) DEFAULT NULL,`CROMOSSOMO` varchar(10) DEFAULT NULL,`OUT_MORBI` varchar(10) DEFAULT NULL,`HOSPITAL` varchar(10) DEFAULT NULL,
             `DT_INTERNA` varchar(13) DEFAULT NULL,`COD_TPTEST` varchar(14) DEFAULT NULL,`SITU_TESTE` varchar(14) DEFAULT NULL,`RESUL_TEST` varchar(14) DEFAULT NULL,
             `SRAG_CLASS` varchar(13) DEFAULT NULL,`COD_CLASSI` varchar(13) DEFAULT NULL,`CLASSIFIN` varchar(9) DEFAULT NULL,`CLASSI_COM` varchar(10) DEFAULT NULL,
             `CLASSI_LAB` varchar(10) DEFAULT NULL,`CRITERIO` varchar(24) DEFAULT NULL,`EVOLUCAO` varchar(24) DEFAULT NULL,`EVOL_COMUM` varchar(10) DEFAULT NULL,
             `DT_EVOLUCA` varchar(10) DEFAULT NULL,`SEM_EVOLUC` varchar(10) DEFAULT NULL,`DT_DIGITA` varchar(10) DEFAULT NULL,`DT_ENCERRA` varchar(10) DEFAULT NULL,
             `CO_UN_INTE` varchar(10) DEFAULT NULL,`NM_UN_INTE` varchar(10) DEFAULT NULL,`CLASSI_FIN` varchar(10) DEFAULT NULL,`MES_DIGI` varchar(8) DEFAULT NULL,
             `ANO_DIGI` varchar(8) DEFAULT NULL,`CLASSIFINS` varchar(10) DEFAULT NULL,`CLASSI_COS` varchar(19) DEFAULT NULL,`CLASSICOMS` varchar(29) DEFAULT NULL,
             `COD_RESULT` varchar(29) DEFAULT NULL,`NOME_DISTR` varchar(18) DEFAULT NULL,`SUBPREF` varchar(25) DEFAULT NULL,`STS` varchar(25) DEFAULT NULL,`UVIS` varchar(25) DEFAULT NULL,
             `CRS` varchar(27) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;


