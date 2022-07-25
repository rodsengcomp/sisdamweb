-- Comandos sql para limpar tabelas do banco de dados --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus_total - rodolfo.romaioli@gmail.com
-- Criado: 03/01/2022 10:40

-- Script criado para carregar tabelas extraídas de bancos de dados -> esus_total Notifica, esus_total Covisa Geo e Biofast Lab
-- A novidade é a inserção de campos de testes rápidos na consulta final

-- Limpando dados das tabelas
-- TRUNCATE TABLE esus_covisa;
TRUNCATE TABLE esus_total;
-- TRUNCATE TABLE biofast_lab;


--*** Script de extração mensal de dados retirados no eSUS Notifica -> https://notifica.saude.gov.br/exportacoes --***

-- Carregando os dados em excel .csv da pasta abaixo para o servidor -> tabela -> esus_total ...
LOAD DATA INFILE 'C:/csv/esus/esus_total_.csv'
INTO TABLE `esus_total` CHARACTER SET utf8 FIELDS TERMINATED BY ';' IGNORE 1 ROWS;

-- Alterando o campo Número de Notificação da tabela esus_total para chave primária
-- Importante retirar duplicatas antes de carregar a planilha excel .csv para o servidor ...
ALTER TABLE `esus_total` ADD PRIMARY KEY(`Número da Notificação`);

--*** Script de extração mensal de dados retirados no Covisa Intranet -> http://covisa.prodam/SUVIS/Resp.aspx

-- Carregando os dados em excel .csv da pasta abaixo para o servidor -> tabela -> esus_covisa ...
LOAD DATA INFILE 'C:/csv/esus/esus_.csv'
INTO TABLE `esus_total` CHARACTER SET utf8 FIELDS TERMINATED BY ';' IGNORE 1 ROWS;

-- Alterando o campo NU_NOTIFIC da tabela esus_covisa para chave primária
-- Importante retirar duplicatas antes de carregar a planilha excel .csv para o servidor ...
ALTER TABLE `esus_covisa` ADD PRIMARY KEY(`NU_NOTIFIC`);

--*** Script de extração mensal de dados retirados no Laboratório Biofast ->

-- Carregando os dados em excel .csv da pasta abaixo para o servidor -> tabela -> biofast_lab ...
LOAD DATA INFILE 'C:/csv/esus/biofast_lab.csv'
INTO TABLE `biofast_lab` CHARACTER SET utf8 FIELDS TERMINATED BY ';' IGNORE 1 ROWS;

-- Alterando o campo Nome do paciente da tabela biofast_lab para chave primária
-- Importante retirar duplicatas antes de carregar a planilha excel .csv para o servidor ...
ALTER TABLE `biofast_lab` ADD PRIMARY KEY(`Nome do paciente`);

--- $$$ --- Script para consulta e exportação dos bancos --- $$$ ---

SELECT esus_covisa.`NU_NOTIFIC`, esus_covisa.`DT_NOTIFIC`, esus_covisa.`NM_PACIENT`, esus_covisa.`DT_NASC`, esus_total.`Data do início dos sintomas`,
       esus_covisa.SINTOMAS, biofast_lab.`Requisicao`, biofast_lab.`Data de cadastro`,
       CASE
           WHEN biofast_lab.Resultado LIKE '%NÃO DETECTADO%'
               THEN 'NÃO DETECTADO'
           WHEN biofast_lab.Resultado LIKE '%DETECTADO%'
               THEN 'DETECTADO'
           ELSE '' END AS Resultado,
       esus_total.`Data da Coleta RT-PCR`, esus_total.`Resultado RT-PCR`, esus_total.`Estado do Teste RT-PCR`, esus_total.`Estado do Teste RT-LAMP`, esus_total.`Data da Coleta RT-LAMP`,
       esus_total.`Resultado RT-LAMP`, esus_total.`Estado do Teste Sorológico IgA`, esus_total.`Data da Coleta Sorológico IgA`, esus_total.`Resultado Sorológico IgA`,
       esus_total.`Estado do Teste Sorológico IgM`,	esus_total.`Data da Coleta Sorológico IgM`, esus_total.`Resultado Sorológico IgM`, esus_total.`Estado do Teste Sorológico IgG`,
       esus_total.`Data da Coleta Sorológico IgG`, esus_total.`Resultado Sorológico IgG`, esus_total.`Estado do Teste Rápido antígeno`, esus_total.`Data da Coleta Rápido antígeno`,
       esus_total.`Resultado Rápido antígeno`, esus_total.`Estado do Teste Sorológico Anti Tot`, esus_total.`Data da Coleta Sorológico Anti Tot`,
       esus_total.`Resultado Sorológico Anticorpos Totais`,	esus_total.`Estado do Teste Rápido anticorpo IgM`, esus_total.`Data da Coleta Rápido anticorpo IgM`,
       esus_total.`Resultado Rápido anticorpo IgM`,	esus_total.`Estado do Teste Rápido anticorpo IgG`,	esus_total.`Data da Coleta Rápido anticorpo IgG`,
       esus_total.`Resultado Rápido anticorpo IgG`,	esus_total.`Estado do Teste Rápido antígeno`, esus_total.`Data da Coleta Rápido antígeno`, esus_total.`Resultado Rápido antígeno`,
       esus_total.`Lote TR Antígeno`, esus_total.`Estado do Teste Outros 1`, esus_total.`Tipo de Teste Outros 1`, esus_total.`Data da Coleta Outros 1`,
       esus_total.`Resultado Outros 1`,	esus_total.`Lote Outros 1`, esus_total.`Fabricante Outros 1`, esus_total.`Tipo de Teste Outros 2`, esus_total.`Estado do Teste Outros 2`,
       esus_total.`Data da Coleta Outros 2`, esus_total.`Resultado Outros 2`, esus_total.`Lote Outros 2`, esus_total.`Fabricante Outros 2`, esus_total.`Tipo de Teste Outros 3`,
       esus_total.`Estado do Teste Outros 3`, esus_total.`Data da Coleta Outros 3`, esus_total.`Resultado Outros 3`, esus_total.`Lote Outros 3`, esus_total.`Fabricante Outros 3`,
       esus_total.`Evolução Caso`, esus_total.`Classificação Final`, esus_total.`Data de encerramento`, biofast_lab.`Nome do paciente`,
       CASE -- Parâmetros SQL para fechamento de casos
           WHEN esus_total.`Resultado RT-PCR`='Detectável'
               THEN 'CONF. LABOR.'
           WHEN esus_total.`Resultado RT-PCR`<>'Detectável' AND biofast_lab.Resultado LIKE '%DETECTADO%'
               THEN 'CONF. LABOR.'
           WHEN esus_total.`Resultado RT-PCR`='Inconclusivo ou Indeterminado' AND biofast_lab.Resultado LIKE '%DETECTADO%'
               THEN 'CONF. LABOR.'
           WHEN esus_total.`Resultado RT-PCR`='Não detectável'
               AND (esus_covisa.SINTOMAS LIKE '%Olf%' OR esus_covisa.SINTOMAS LIKE '%Gust%')
               THEN 'CONF. CRIT. CLÍNICO'
           WHEN esus_total.`Resultado RT-PCR`<>'Não detectável' AND biofast_lab.Resultado LIKE '%NÃO DETECTADO%'
               AND (esus_covisa.SINTOMAS LIKE '%Olf%' OR esus_covisa.SINTOMAS LIKE '%Gust%')
               THEN 'CONF. CRIT. CLÍNICO'
           WHEN esus_total.`Resultado RT-PCR`='Inconclusivo ou Indeterminado' AND biofast_lab.Resultado LIKE '%NÃO DETECTADO%'
               AND (esus_covisa.SINTOMAS LIKE '%Olf%' OR esus_covisa.SINTOMAS LIKE '%Gust%')
               THEN 'CONF. CRIT. CLÍNICO'
           WHEN esus_total.`Resultado RT-PCR`='Não detectável'
               AND (esus_covisa.SINTOMAS NOT LIKE '%Olf%' OR esus_covisa.SINTOMAS NOT LIKE '%Gust%')
               THEN 'SGNE'
           WHEN biofast_lab.Resultado LIKE '%NÃO DETECTADO%' AND esus_total.`Resultado RT-PCR`<>'Não detectável'
               AND (esus_covisa.SINTOMAS NOT LIKE '%Olf%' OR esus_covisa.SINTOMAS NOT LIKE '%Gust%')
               THEN 'SGNE'
           WHEN (esus_total.`Resultado RT-PCR` IS NULL OR esus_total.`Resultado RT-PCR`='') AND (biofast_lab.Resultado IS NULL OR biofast_lab.Resultado='')
               AND (esus_covisa.SINTOMAS LIKE '%Olf%' OR esus_covisa.SINTOMAS LIKE '%Gust%')
               THEN 'CONF. CRIT. CLÍNICO'
           WHEN esus_total.`Resultado RT-PCR`='Inconclusivo ou Indeterminado' AND (biofast_lab.Resultado IS NULL OR biofast_lab.Resultado='')
               AND (esus_covisa.SINTOMAS LIKE '%Olf%' OR esus_covisa.SINTOMAS LIKE '%Gust%')
               THEN 'CONF. CRIT. CLÍNICO'
           WHEN esus_total.`Resultado RT-PCR`='Inconclusivo ou Indeterminado' AND (biofast_lab.Resultado IS NULL OR biofast_lab.Resultado='')
               THEN 'SGNE'
           WHEN esus_covisa.SINTOMAS LIKE '%Olf%' OR esus_covisa.SINTOMAS LIKE '%Gust%'
               THEN 'CONF. CRIT. CLÍNICO'
           ELSE 'SGNE' END AS ROBÔ,
       CASE -- Parâmetros SQL para verificar casos em aberto
           WHEN esus_total.`Resultado RT-PCR`='Detectável' AND esus_total.`Evolução Caso`='Cura'
               AND esus_total.`Classificação Final`='Confirmado Laboratorial'
               THEN 'NAO'
           WHEN biofast_lab.Resultado LIKE '%DETECTADO%' AND esus_total.`Evolução Caso`='Cura'
               AND esus_total.`Classificação Final`='Confirmado Laboratorial'
               THEN 'NAO'
           WHEN esus_total.`Resultado RT-PCR`='Inconclusivo ou Indeterminado' AND biofast_lab.Resultado LIKE '%DETECTADO%'
               AND esus_total.`Evolução Caso`='Cura' AND esus_total.`Classificação Final`='Confirmado Laboratorial'
               THEN 'NAO'
           WHEN esus_total.`Resultado RT-PCR`='Não detectável'
               AND (esus_covisa.SINTOMAS LIKE '%Olf%' OR esus_covisa.SINTOMAS LIKE '%Gust%')
               AND esus_total.`Evolução Caso`='Cura' AND esus_total.`Classificação Final`='Confirmado por Critério Clínico'
               THEN 'NAO'
           WHEN biofast_lab.Resultado LIKE '%NÃO DETECTADO%'
               AND (esus_covisa.SINTOMAS LIKE '%Olf%' OR esus_covisa.SINTOMAS LIKE '%Gust%')
               AND esus_total.`Evolução Caso`='Cura' AND esus_total.`Classificação Final`='Confirmado por Critério Clínico'
               THEN 'NAO'
           WHEN esus_total.`Resultado RT-PCR`='Inconclusivo ou Indeterminado' AND biofast_lab.Resultado LIKE '%NÃO DETECTADO%'
               AND (esus_covisa.SINTOMAS LIKE '%Olf%' OR esus_covisa.SINTOMAS LIKE '%Gust%')
               AND esus_total.`Evolução Caso`='Cura' AND esus_total.`Classificação Final`='Confirmado por Critério Clínico'
               THEN 'NAO'
           WHEN esus_total.`Resultado RT-PCR`='Não detectável'
               AND (esus_covisa.SINTOMAS NOT LIKE '%Olf%' OR esus_covisa.SINTOMAS NOT LIKE '%Gust%')
               AND esus_total.`Evolução Caso`='Cura' AND esus_total.`Classificação Final`='Síndrome Gripal Não Especificada'
               THEN 'NAO'
           WHEN biofast_lab.Resultado LIKE '%NÃO DETECTADO%'
               AND (esus_covisa.SINTOMAS NOT LIKE '%Olf%' OR esus_covisa.SINTOMAS NOT LIKE '%Gust%')
               AND esus_total.`Evolução Caso`='Cura' AND esus_total.`Classificação Final`='Síndrome Gripal Não Especificada'
               THEN 'NAO'
           WHEN (esus_total.`Resultado RT-PCR` IS NULL OR esus_total.`Resultado RT-PCR`='') AND (biofast_lab.Resultado IS NULL OR biofast_lab.Resultado='')
               AND (esus_covisa.SINTOMAS LIKE '%Olf%' OR esus_covisa.SINTOMAS LIKE '%Gust%')
               AND esus_total.`Evolução Caso`='Cura' AND esus_total.`Classificação Final`='Confirmado por Critério Clínico'
               THEN 'NAO'
           WHEN (esus_total.`Resultado RT-PCR` IS NULL OR esus_total.`Resultado RT-PCR`='') AND (biofast_lab.Resultado IS NULL OR biofast_lab.Resultado='')
               AND esus_total.`Evolução Caso`='Cura' AND esus_total.`Classificação Final`='Síndrome Gripal Não Especificada'
               THEN 'NAO'
           ELSE 'SIM' END AS `CASOS EM ABERTO`
FROM (esus_covisa
    LEFT JOIN esus_total ON (esus_covisa.DT_NASC = esus_total.`Data de Nascimento`)
        AND (esus_covisa.NU_NOTIFIC = esus_total.`Número da Notificação`))
         LEFT JOIN biofast_lab ON (esus_covisa.DT_NASC = biofast_lab.`Data de nascimento`)
    AND (esus_covisa.NM_PACIENT = biofast_lab.`Nome do paciente`)
WHERE esus_covisa.`DT_NOTIFIC` LIKE '%/02/%'; -- Filtro de mês

-- Comando SQL para apagar um ou mais dos de cada registro duplicado (mantém um dos registros)
-- DELETE a FROM biofast_lab AS a, biofast_lab AS b WHERE a.`Nome do paciente`=b.`Nome do paciente` AND a.id < b.id;

--**** Caso extremamente necessário recriar as tabelas do servidor (Script do Banco de Dados Esus ...)

-- Criando a tabela esus_total
-- CREATE TABLE `esus_total` (`Número da Notificação` bigint(12) DEFAULT NULL,`Estado da Notificação` varchar(19) DEFAULT NULL,`Município da Notificação` varchar(22) DEFAULT NULL,`Tipo de Teste` varchar(24) DEFAULT NULL,`Resultado (PCR/Rápidos)` varchar(29) DEFAULT NULL,`Evolução Caso` varchar(24) DEFAULT NULL,`Data do Teste (PCR/Rápidos)` varchar(10) DEFAULT NULL,`Estado do Teste` varchar(20) DEFAULT NULL,`Data de encerramento` varchar(10) DEFAULT NULL,`Classificação Final` varchar(32) DEFAULT NULL,`Resultado Totais` varchar(12) DEFAULT NULL,`Resultado IgA` varchar(50) DEFAULT NULL,`Resultado IgM` varchar(29) DEFAULT NULL,`Resultado IgG` varchar(50) DEFAULT NULL,`Teste Sorológico` varchar(32) DEFAULT NULL,`Data do Teste (Sorologico)` varchar(10) DEFAULT NULL,`Telefone de Contato` varchar(16) DEFAULT NULL,`Estado de Residência` varchar(18) DEFAULT NULL,`Sexo` varchar(9) DEFAULT NULL,`Tem CPF?` varchar(3) DEFAULT NULL,`Estrangeiro` varchar(3) DEFAULT NULL,`CPF` varchar(14) DEFAULT NULL,`Município de Residência` varchar(26) DEFAULT NULL,`CNS` varchar(20) DEFAULT NULL,`Data de Nascimento` varchar(10) DEFAULT NULL,`Passaporte` varchar(9) DEFAULT NULL,`Nome Completo da Mãe` varchar(55) DEFAULT NULL,`Pais de origem` varchar(5) DEFAULT NULL,`Telefone Celular` varchar(17) DEFAULT NULL,`Nome Completo` varchar(131) DEFAULT NULL,`É profissional de saúde?` varchar(3) DEFAULT NULL,`CBO` varchar(75) DEFAULT NULL,`CEP` varchar(10) DEFAULT NULL,`Logradouro` varchar(103) DEFAULT NULL,`Número (ou SN para Sem Número)` varchar(14) DEFAULT NULL,`Complemento` varchar(59) DEFAULT NULL,`Bairro` varchar(65) DEFAULT NULL,`Raça/Cor` varchar(30) DEFAULT NULL,`Profissional de Segurança` varchar(3) DEFAULT NULL,`Etnia` varchar(13) DEFAULT NULL,`E-mail` varchar(38) DEFAULT NULL,`Comunidade/Povo Tradicional?` varchar(3) DEFAULT NULL,`Comunidade/Povo Tradicional` varchar(3) DEFAULT NULL,`Sintoma- Dor de Garganta` varchar(3) DEFAULT NULL,`Sintoma- Dispneia` varchar(3) DEFAULT NULL,`Sintoma- Febre` varchar(3) DEFAULT NULL,`Sintoma- Tosse` varchar(3) DEFAULT NULL,`Sintoma- Outros` varchar(3) DEFAULT NULL,`Sintoma- Dor de Cabeça` varchar(3) DEFAULT NULL,`Sintoma- Distúrbios Gustativos` varchar(3) DEFAULT NULL,`Sintoma- Distúrbios Olfativos` varchar(3) DEFAULT NULL,`Sintoma- Coriza` varchar(3) DEFAULT NULL,`Sintoma- Assintomático` varchar(3) DEFAULT NULL,`Data da Notificação` varchar(10) DEFAULT NULL,`Condições- Doenças resp` varchar(3) DEFAULT NULL,`Condições- Doenças cardíacas crônicas` varchar(3) DEFAULT NULL,`Condições- Diabetes` varchar(3) DEFAULT NULL,`Condições- Doenças renais crônicas` varchar(3) DEFAULT NULL,`Condições- Imunossupressão` varchar(3) DEFAULT NULL,`Condições- Gestante` varchar(3) DEFAULT NULL,`Condições- Portador de doenças crom` varchar(3) DEFAULT NULL,`Condições- Puérpera (até 45 dias do parto)` varchar(3) DEFAULT NULL,`Condições- Obesidade` varchar(3) DEFAULT NULL,`Data do início dos sintomas` varchar(10) DEFAULT NULL,`Descrição do Sintoma` varchar(81) DEFAULT NULL,`CNES Laboratório` varchar(10) DEFAULT NULL,`Notificante CNES` varchar(15) DEFAULT NULL,`Notificante CPF` varchar(14) DEFAULT NULL,`Notificante Email` varchar(52) DEFAULT NULL,`Notificante Nome Completo` varchar(47) DEFAULT NULL,`Notificante CNPJ` varchar(18) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Criando a tabela esus_covisa
-- CREATE TABLE `esus_covisa` (`NU_NOTIFIC` varchar(13) NOT NULL,`NU_CPF` varchar(11) DEFAULT NULL,`OP_CNES` varchar(51) DEFAULT NULL,`DT_NOTIFIC` varchar(10) DEFAULT NULL,`IT_SNT_NOT` varchar(15) DEFAULT NULL,`COUNT1` varchar(6) DEFAULT NULL,`ID_UF_NOTI` varchar(38) DEFAULT NULL,`ID_MN_NOTI` varchar(100) DEFAULT NULL,`NM_PACIENT` varchar(100) DEFAULT NULL,`NM_MAE_PAC` varchar(100) DEFAULT NULL,`CS_SEXO` varchar(10) DEFAULT NULL,`DT_NASC` varchar(10) DEFAULT NULL,`NU_IDADE` varchar(8) DEFAULT NULL,`CS_RACA` varchar(34) DEFAULT NULL,`ETNIA` varchar(92) DEFAULT NULL,`NM_OCUPA` varchar(49) DEFAULT NULL,`ID_CNS_SUS` varchar(15) DEFAULT NULL,`PROF_SAUDE` varchar(10) DEFAULT NULL,`PROF_SEGUR` varchar(10) DEFAULT NULL,`ESTRANGEIR` varchar(29) DEFAULT NULL,`ID_PASSAPO` varchar(57) DEFAULT NULL,`NM_LOGRADO` varchar(62) DEFAULT NULL,`NU_NUMERO` varchar(18) DEFAULT NULL,`NM_COMPLEM` varchar(29) DEFAULT NULL,`NM_BAIRRO` varchar(30) DEFAULT NULL,`ID_MN_RESI` varchar(15) DEFAULT NULL,`NU_CEP` varchar(15) DEFAULT NULL,`ID_UF_RESI` varchar(15) DEFAULT NULL,`NU_CELULAR` varchar(15) DEFAULT NULL,`NU_TELEFON` varchar(15) DEFAULT NULL,`DT_SIN_PRI` varchar(10) DEFAULT NULL,`SEM_PRI` varchar(24) DEFAULT NULL,`ANO_PRI` varchar(39) DEFAULT NULL,`ANO` varchar(100) DEFAULT NULL,`SINTOMAS` varchar(86) DEFAULT NULL,`FEBRE` varchar(5) DEFAULT NULL,`TOSSE` varchar(5) DEFAULT NULL,`GARGANTA` varchar(8) DEFAULT NULL,`DISPNEIA` varchar(8) DEFAULT NULL,`DESC_RESP` varchar(9) DEFAULT NULL,`SATURACAO` varchar(9) DEFAULT NULL,`DIARREIA` varchar(8) DEFAULT NULL,`VOMITO` varchar(6) DEFAULT NULL,`DOR_ABD` varchar(7) DEFAULT NULL,`CORIZA` varchar(6) DEFAULT NULL,`CABECA` varchar(6) DEFAULT NULL,`OUTRO_SIN` varchar(9) DEFAULT NULL,`ASSINTOMAT` varchar(48) DEFAULT NULL,`COMORBID` varchar(73) DEFAULT NULL,`GESTANTE` varchar(8) DEFAULT NULL,`PUERPERA` varchar(8) DEFAULT NULL,`CARDIOPATI` varchar(10) DEFAULT NULL,`HEMATOLOGI` varchar(10) DEFAULT NULL,`SIND_DOWN` varchar(9) DEFAULT NULL,`HEPATICA` varchar(8) DEFAULT NULL,`ASMA` varchar(4) DEFAULT NULL,`DIABETES` varchar(8) DEFAULT NULL,`NEUROLOGIC` varchar(10) DEFAULT NULL,`PNEUMOPATI` varchar(10) DEFAULT NULL,`IMUNODEPRE` varchar(10) DEFAULT NULL,`RENAL` varchar(5) DEFAULT NULL,`OBESIDADE` varchar(9) DEFAULT NULL,`CROMOSSOMO` varchar(10) DEFAULT NULL,`OUT_MORBI` varchar(10) DEFAULT NULL,`HOSPITAL` varchar(10) DEFAULT NULL,`DT_INTERNA` varchar(13) DEFAULT NULL,`COD_TPTEST` varchar(14) DEFAULT NULL,`SITU_TESTE` varchar(14) DEFAULT NULL,`RESUL_TEST` varchar(14) DEFAULT NULL,`SRAG_CLASS` varchar(13) DEFAULT NULL,`COD_CLASSI` varchar(13) DEFAULT NULL,`CLASSIFIN` varchar(9) DEFAULT NULL,`CLASSI_COM` varchar(10) DEFAULT NULL,`CLASSI_LAB` varchar(10) DEFAULT NULL,`CRITERIO` varchar(24) DEFAULT NULL,`EVOLUCAO` varchar(24) DEFAULT NULL,`EVOL_COMUM` varchar(10) DEFAULT NULL,`DT_EVOLUCA` varchar(10) DEFAULT NULL,`SEM_EVOLUC` varchar(10) DEFAULT NULL,`DT_DIGITA` varchar(10) DEFAULT NULL,`DT_ENCERRA` varchar(10) DEFAULT NULL,`CO_UN_INTE` varchar(10) DEFAULT NULL,`NM_UN_INTE` varchar(10) DEFAULT NULL,`CLASSI_FIN` varchar(10) DEFAULT NULL,`MES_DIGI` varchar(8) DEFAULT NULL,`ANO_DIGI` varchar(8) DEFAULT NULL,`CLASSIFINS` varchar(10) DEFAULT NULL,`CLASSI_COS` varchar(19) DEFAULT NULL,`CLASSICOMS` varchar(29) DEFAULT NULL,`COD_RESULT` varchar(29) DEFAULT NULL,`geocode` varchar(29) DEFAULT NULL,`latsirgas` varchar(18) DEFAULT NULL,`lonsirgas` varchar(25) DEFAULT NULL,`nome_distr` varchar(25) DEFAULT NULL,`subpref` varchar(25) DEFAULT NULL,`sts` varchar(27) DEFAULT NULL,`crs` varchar(44) DEFAULT NULL,`uvis` varchar(34) DEFAULT NULL,`cnes` varchar(46) DEFAULT NULL,`nomeubs` varchar(48) DEFAULT NULL,`esf` varchar(38) DEFAULT NULL,`sts_ubs` varchar(38) DEFAULT NULL,`crs_ubs` varchar(17) DEFAULT NULL,`cd_geocodi` varchar(17) DEFAULT NULL,`ipvs` varchar(17) DEFAULT NULL,`cod_ap` varchar(17) DEFAULT NULL,`COD_DISTRI` varchar(10) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Criando a tabela biofast_lab
-- CREATE TABLE `biofast_lab` (`Unidade` varchar(19) DEFAULT NULL,`Posto` varchar(46) DEFAULT NULL,`Nome do paciente` varchar(36) DEFAULT NULL,`Codigo SUS` varchar(48) DEFAULT NULL,`Exame realizado` varchar(48) DEFAULT NULL,`Idade` varchar(10) DEFAULT NULL,`Data de nascimento` varchar(18) DEFAULT NULL,`Data de cadastro` varchar(16) DEFAULT NULL,`Sexo` varchar(33) DEFAULT NULL,`Nome do solicitante` varchar(35) DEFAULT NULL,`Requisicao` varchar(33) DEFAULT NULL,`Material coletado` varchar(33) DEFAULT NULL,`Resultado` varchar(12) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--- +++ Senhas de Banco de Dados +++ ---

-- J11n3ts1n@n	J11	COVID (Covisa Intranet)