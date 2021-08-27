-- Comandos sql para atualizar banco de dados --
-- Comandos sql para atualizar banco de dados --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
-- Criado: 15/05/2018 11:30
-- Alterado em 20/12/2012 às 10:26

-- Script criado para carregar tabelas extraídas de bancos de dados -> SinanNet, Getwin e GAL-Instituto Adolfo Lutz
--
-- Carregando

-- IAL disponivel em https://gal.saude.sp.gov.br/gal/login/ => Usuário: 4050339.ve Senha: suvisjacana Módulo: Biologia Medica Laboratorio: Sao Paulo
-- menu => consultas => Consultar Exame => Digitar a Data Inicio, Data Fim, Exame e clicar em filtrar para gerar tabela, em seguida clique no botao de excel
CREATE TABLE `chiku_ial` (`Requisição` bigint(12) DEFAULT NULL,`Paciente` varchar(43) DEFAULT NULL,`CNS` varchar(15) DEFAULT NULL,`Setor` varchar(7) DEFAULT NULL,
  `Bancada` varchar(9) DEFAULT NULL,`Mun. Residência` varchar(22) DEFAULT NULL,`UF Residência` varchar(2) DEFAULT NULL,`Requisitante` varchar(60) DEFAULT NULL,
  `Mun. Requisitante` varchar(9) DEFAULT NULL,`Exame` varchar(33) DEFAULT NULL,`Metodo` varchar(21) DEFAULT NULL,`Material` varchar(33) DEFAULT NULL,
  `Cód. Amostra` int(6) DEFAULT NULL,`Amostra` int(1) DEFAULT NULL,`Restrição` varchar(10) DEFAULT NULL,`Labotório Cadastro` varchar(32) DEFAULT NULL,`Dt. Cadastro` varchar(16) DEFAULT NULL,
  `Dt. Recebimento` varchar(16) DEFAULT NULL,`Dt. Liberação` varchar(16) DEFAULT NULL,`Tempo Liberação` varchar(3) DEFAULT NULL,`Labotório Executor` varchar(29) DEFAULT NULL,
  `Status Exame` varchar(26) DEFAULT NULL,`Resultado` varchar(22) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserindo os dados na tabela criada no script acima ...
LOAD DATA LOCAL INFILE 'c:/Users/SMS/Desktop/csv/dataChiku.csv'
INTO TABLE `chiku_ial`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS
(`Requisição`,`Paciente`,`CNS`,`Setor`,`Bancada`,`Mun. Residência`,`UF Residência`,`Requisitante`,`Mun. Requisitante`,`Exame`,`Metodo`,`Material`,`Cód. Amostra`,`Amostra`,
`Restrição`,`Labotório Cadastro`,`Dt. Cadastro`,`Dt. Recebimento`,`Dt. Liberação`,`Tempo Liberação`,`Labotório Executor`,`Status Exame`,`Resultado`);

-- Inserindo o campo id na tabela
ALTER TABLE `chiku_ial` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);

-- IAL disponivel em https://gal.saude.sp.gov.br/gal/login/ => Usuário: 4050339.ve Senha: suvisjacana Módulo: Biologia Medica Laboratorio: Sao Paulo
-- menu => consultas => Consultar Exame => Digitar a Data Inicio, Data Fim, Exame e clicar em filtrar para gerar tabela, em seguida clique no botao de excel
CREATE TABLE `febrea_ial` (`Requisição` bigint(12) DEFAULT NULL,`Paciente` varchar(43) DEFAULT NULL,`CNS` varchar(15) DEFAULT NULL,`Setor` varchar(7) DEFAULT NULL,
  `Bancada` varchar(9) DEFAULT NULL,`Mun. Residência` varchar(22) DEFAULT NULL,`UF Residência` varchar(2) DEFAULT NULL,`Requisitante` varchar(60) DEFAULT NULL,
  `Mun. Requisitante` varchar(9) DEFAULT NULL,`Exame` varchar(33) DEFAULT NULL,`Metodo` varchar(21) DEFAULT NULL,`Material` varchar(33) DEFAULT NULL,
  `Cód. Amostra` int(6) DEFAULT NULL,`Amostra` int(1) DEFAULT NULL,`Restrição` varchar(10) DEFAULT NULL,`Labotório Cadastro` varchar(32) DEFAULT NULL,`Dt. Cadastro` varchar(16) DEFAULT NULL,
  `Dt. Recebimento` varchar(16) DEFAULT NULL,`Dt. Liberação` varchar(16) DEFAULT NULL,`Tempo Liberação` varchar(3) DEFAULT NULL,`Labotório Executor` varchar(29) DEFAULT NULL,
  `Status Exame` varchar(26) DEFAULT NULL,`Resultado` varchar(22) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserindo os dados na tabela criada no script acima ...
LOAD DATA LOCAL INFILE 'c:/Users/SMS/Desktop/csv/dataFebre.csv'
INTO TABLE `febrea_ial`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS
(`Requisição`,`Paciente`,`CNS`,`Setor`,`Bancada`,`Mun. Residência`,`UF Residência`,`Requisitante`,`Mun. Requisitante`,`Exame`,`Metodo`,`Material`,`Cód. Amostra`,`Amostra`,
`Restrição`,`Labotório Cadastro`,`Dt. Cadastro`,`Dt. Recebimento`,`Dt. Liberação`,`Tempo Liberação`,`Labotório Executor`,`Status Exame`,`Resultado`);

-- Inserindo o campo id na tabela
ALTER TABLE `febrea_ial` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);

-- IAL disponivel em https://gal.saude.sp.gov.br/gal/login/ => Usuário: 4050339.ve Senha: suvisjacana Módulo: Biologia Medica Laboratorio: Sao Paulo
-- menu => consultas => Consultar Exame => Digitar a Data Inicio, Data Fim, Exame e clicar em filtrar para gerar tabela, em seguida clique no botao de excel
CREATE TABLE `coque_ial` (`Requisição` bigint(12) DEFAULT NULL,`Paciente` varchar(43) DEFAULT NULL,`CNS` varchar(15) DEFAULT NULL,`Setor` varchar(7) DEFAULT NULL,
  `Bancada` varchar(9) DEFAULT NULL,`Mun. Residência` varchar(22) DEFAULT NULL,`UF Residência` varchar(2) DEFAULT NULL,`Requisitante` varchar(60) DEFAULT NULL,
  `Mun. Requisitante` varchar(9) DEFAULT NULL,`Exame` varchar(33) DEFAULT NULL,`Metodo` varchar(21) DEFAULT NULL,`Material` varchar(33) DEFAULT NULL,
  `Cód. Amostra` int(6) DEFAULT NULL,`Amostra` int(1) DEFAULT NULL,`Restrição` varchar(10) DEFAULT NULL,`Labotório Cadastro` varchar(32) DEFAULT NULL,`Dt. Cadastro` varchar(16) DEFAULT NULL,
  `Dt. Recebimento` varchar(16) DEFAULT NULL,`Dt. Liberação` varchar(16) DEFAULT NULL,`Tempo Liberação` varchar(3) DEFAULT NULL,`Labotório Executor` varchar(29) DEFAULT NULL,
  `Status Exame` varchar(26) DEFAULT NULL,`Resultado` varchar(22) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserindo os dados na tabela criada no script acima ...
LOAD DATA LOCAL INFILE 'c:/Users/SMS/Desktop/csv/dataCoque.csv'
INTO TABLE `coque_ial`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS
(`Requisição`,`Paciente`,`CNS`,`Setor`,`Bancada`,`Mun. Residência`,`UF Residência`,`Requisitante`,`Mun. Requisitante`,`Exame`,`Metodo`,`Material`,`Cód. Amostra`,`Amostra`,
`Restrição`,`Labotório Cadastro`,`Dt. Cadastro`,`Dt. Recebimento`,`Dt. Liberação`,`Tempo Liberação`,`Labotório Executor`,`Status Exame`,`Resultado`);

-- Inserindo o campo id na tabela
ALTER TABLE `coque_ial` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);


-- IAL disponivel em https://gal.saude.sp.gov.br/gal/login/ => Usuário: 4050339.ve Senha: suvisjacana Módulo: Biologia Medica Laboratorio: Sao Paulo
-- menu => consultas => Consultar Exame => Digitar a Data Inicio, Data Fim, Exame e clicar em filtrar para gerar tabela, em seguida clique no botao de excel
CREATE TABLE `dengue_ial` (`Requisição` bigint(12) DEFAULT NULL,`Paciente` varchar(43) DEFAULT NULL,`CNS` varchar(15) DEFAULT NULL,`Setor` varchar(7) DEFAULT NULL,
  `Bancada` varchar(9) DEFAULT NULL,`Mun. Residência` varchar(22) DEFAULT NULL,`UF Residência` varchar(2) DEFAULT NULL,`Requisitante` varchar(60) DEFAULT NULL,
  `Mun. Requisitante` varchar(9) DEFAULT NULL,`Exame` varchar(33) DEFAULT NULL,`Metodo` varchar(21) DEFAULT NULL,`Material` varchar(33) DEFAULT NULL,
  `Cód. Amostra` int(6) DEFAULT NULL,`Amostra` int(1) DEFAULT NULL,`Restrição` varchar(10) DEFAULT NULL,`Labotório Cadastro` varchar(32) DEFAULT NULL,`Dt. Cadastro` varchar(16) DEFAULT NULL,
  `Dt. Recebimento` varchar(16) DEFAULT NULL,`Dt. Liberação` varchar(16) DEFAULT NULL,`Tempo Liberação` varchar(3) DEFAULT NULL,`Labotório Executor` varchar(29) DEFAULT NULL,
  `Status Exame` varchar(26) DEFAULT NULL,`Resultado` varchar(22) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserindo os dados na tabela criada no script acima ...
LOAD DATA LOCAL INFILE 'c:/Users/SMS/Desktop/csv/dataDengue.csv'
INTO TABLE `dengue_ial`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS
(`Requisição`,`Paciente`,`CNS`,`Setor`,`Bancada`,`Mun. Residência`,`UF Residência`,`Requisitante`,`Mun. Requisitante`,`Exame`,`Metodo`,`Material`,`Cód. Amostra`,`Amostra`,
`Restrição`,`Labotório Cadastro`,`Dt. Cadastro`,`Dt. Recebimento`,`Dt. Liberação`,`Tempo Liberação`,`Labotório Executor`,`Status Exame`,`Resultado`);

-- Inserindo o campo id na tabela
ALTER TABLE `dengue_ial` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);

-- IAL disponivel em https://gal.saude.sp.gov.br/gal/login/ => Usuário: 4050339.ve Senha: suvisjacana Módulo: Biologia Medica Laboratorio: Sao Paulo
-- menu => consultas => Consultar Exame => Digitar a Data Inicio, Data Fim, Exame e clicar em filtrar para gerar tabela, em seguida clique no botao de excel
CREATE TABLE `zika_ial` (`Requisição` bigint(12) DEFAULT NULL,`Paciente` varchar(43) DEFAULT NULL,`CNS` varchar(15) DEFAULT NULL,`Setor` varchar(7) DEFAULT NULL,
  `Bancada` varchar(9) DEFAULT NULL,`Mun. Residência` varchar(22) DEFAULT NULL,`UF Residência` varchar(2) DEFAULT NULL,`Requisitante` varchar(60) DEFAULT NULL,
  `Mun. Requisitante` varchar(9) DEFAULT NULL,`Exame` varchar(33) DEFAULT NULL,`Metodo` varchar(21) DEFAULT NULL,`Material` varchar(33) DEFAULT NULL,
  `Cód. Amostra` int(6) DEFAULT NULL,`Amostra` int(1) DEFAULT NULL,`Restrição` varchar(10) DEFAULT NULL,`Labotório Cadastro` varchar(32) DEFAULT NULL,`Dt. Cadastro` varchar(16) DEFAULT NULL,
  `Dt. Recebimento` varchar(16) DEFAULT NULL,`Dt. Liberação` varchar(16) DEFAULT NULL,`Tempo Liberação` varchar(3) DEFAULT NULL,`Labotório Executor` varchar(29) DEFAULT NULL,
  `Status Exame` varchar(26) DEFAULT NULL,`Resultado` varchar(22) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOAD DATA LOCAL INFILE 'c:/Users/SMS/Desktop/csv/dataZika.csv'
INTO TABLE `zika_ial`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS
(`Requisição`,`Paciente`,`CNS`,`Setor`,`Bancada`,`Mun. Residência`,`UF Residência`,`Requisitante`,`Mun. Requisitante`,`Exame`,`Metodo`,`Material`,`Cód. Amostra`,`Amostra`,
`Restrição`,`Labotório Cadastro`,`Dt. Cadastro`,`Dt. Recebimento`,`Dt. Liberação`,`Tempo Liberação`,`Labotório Executor`,`Status Exame`,`Resultado`);

-- Inserindo o campo id na tabela
ALTER TABLE `zika_ial` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);