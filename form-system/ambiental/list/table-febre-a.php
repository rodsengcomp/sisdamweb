<?php



"SELECT famarnet.NU_NOTIFIC, famarnet.DT_NOTIFIC, famarnet.NM_PACIENT, famarnet.ID_DISTRIT, famarnet.ID_BAIRRO, famarnet.NM_BAIRRO, famarnet.ID_LOGRADO, famarnet.NM_LOGRADO, famarnet.NU_NUMERO, famarnet.NM_COMPLEM, famarnet.ID_UNIDADE, tblfebrea.DataEntrada
FROM famarnet LEFT JOIN tblfebrea ON famarnet.NU_NOTIFIC = tblfebrea.nDoc
WHERE (((famarnet.ID_DISTRIT)=\"70\") AND ((tblfebrea.nDoc) Is Null))"




"SELECT tblfebrea.UnidadeNotificadora, tblfebrea.DataEntrada, tblfebrea.nDoc, tblfebrea.Endereco1, tblfebrea.N, tblfebrea.Complemento, 
tblfebrea.Descarte, tblfebrea.DataBloqueio, tblfebrea.DataNeb, tblfebrea.usuarioAlteracao, tblfebrea.DataAlteracao, tblfebrea.DataLer,
tblfebrea.usuarioLer, tblfebrea.Impressao, tblfebrea.ruagoogle, tblfebrea.latitude, tblfebrea.longitude, tblfebrea.idrua,
famarnet.NU_NOTIFIC, famarnet.DT_NOTIFIC, famarnet.SEM_NOT, famarnet.NM_PACIENT, famarnet.CS_SEXO,famarnet.DT_NASC, famarnet.DT_SIN_PRI, famarnet.SEM_PRI,
famarnet.NU_NUMERO, famarnet.NU_DDD_TEL,famarnet.NU_TELEFON, famarnet.NM_COMPLEM,famarnet.ID_AGRAVO,
ruas.da, ruas.setor, ruas.log, ruas.cep, ruas.bairro, ruas.pgguia, ruas.latitude, ruas.longitude, ruas.ruagoogle, ruas.id, ruas.ubs,
febrea_ial.Resultado, febrea_ial.Paciente, febrea_ial.Exame
FROM tblfebrea INNER JOIN famarnet ON tblfebrea.nDoc = famarnet.NU_NOTIFIC 
LEFT JOIN febrea_ial ON tblfebrea.NomeSolicitante = febrea_ial.Paciente
LEFT JOIN ruas ON tblfebrea.idRua = ruas.id
WHERE tblfebrea.Impressao Like \"-1\" OR tblfebrea.Descarte Like \"-1\"
ORDER BY tblfebrea.DataEntrada DESC"

"SELECT tblfebrea.UnidadeNotificadora, tblfebrea.DataEntrada, tblfebrea.nDoc, tblfebrea.Endereco1, tblfebrea.N, tblfebrea.Complemento, 
tblfebrea.Logradouro, tblfebrea.Cep1, tblfebrea.PgGuia1, tblfebrea.Bairro1, tblfebrea.Da, tblfebrea.Setor1, tblfebrea.UBS1, tblfebrea.ResultadoTr, 
tblfebrea.Descarte, tblfebrea.DataBloqueio, tblfebrea.DataNeb, tblfebrea.usuarioAlteracao, tblfebrea.DataAlteracao, tblfebrea.DataLer,
tblfebrea.usuarioLer, tblfebrea.Impressao, tblfebrea.ruagoogle, tblfebrea.latitude, tblfebrea.longitude, tblfebrea.agravo, tblfebrea.NomeSolicitante, 
famarnet.NU_NOTIFIC, famarnet.DT_NOTIFIC, famarnet.SEM_NOT, famarnet.NM_PACIENT, famarnet.CS_SEXO,famarnet.DT_NASC, famarnet.DT_SIN_PRI, famarnet.SEM_PRI,famarnet.DS_OBS,
famarnet.NU_NUMERO, famarnet.NU_DDD_TEL,famarnet.NU_TELEFON,
febrea_ial.Resultado, febrea_ial.Paciente, febrea_ial.Exame, febrea_ial.`Dt. Cadastro`, febrea_ial.`Dt. Liberação`
FROM tblfebrea INNER JOIN famarnet ON tblfebrea.nDoc = famarnet.NU_NOTIFIC 
LEFT JOIN febrea_ial ON tblfebrea.NomeSolicitante = febrea_ial.Paciente
WHERE tblfebrea.nDoc='$nDoc'"

"SELECT tbldengue.UnidadeNotificadora, tbldengue.DataEntrada, tbldengue.nDoc, tbldengue.Endereco1, tbldengue.N, tbldengue.Complemento, 
tbldengue.ResultadoTr, tbldengue.Descarte, tbldengue.DataBloqueio, tbldengue.DataNeb, tbldengue.usuarioAlteracao, tbldengue.DataAlteracao, tbldengue.DataLer,
tbldengue.usuarioLer, tbldengue.Impressao, tbldengue.ruagoogle, tbldengue.latitude, tbldengue.longitude, tbldengue.idrua,
dengnet.NU_NOTIFIC, dengnet.DT_NOTIFIC, dengnet.SEM_NOT, dengnet.NM_PACIENT, dengnet.CS_SEXO,dengnet.DT_NASC, dengnet.DT_SIN_PRI, dengnet.SEM_PRI,dengnet.DS_OBS,
dengnet.NU_NUMERO, dengnet.NU_DDD_TEL,dengnet.NU_TELEFON,
ruas.da, ruas.setor, ruas.log, ruas.cep, ruas.bairro, ruas.pgguia, ruas.latitude, ruas.longitude, ruas.ruagoogle, ruas.id, ruas.ubs,
resultado_ccz.Resultado_IgM_Focus, resultado_ccz.Resultado_NS1,resultado_ccz.LIBERACAO_EM
FROM tbldengue INNER JOIN dengnet ON tbldengue.nDoc = dengnet.NU_NOTIFIC 
LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN
LEFT JOIN ruas ON tbldengue.idRua = ruas.id
WHERE tbldengue.Impressao Like \"0\" AND tbldengue.Descarte Like \"0\"
ORDER BY tbldengue.DataEntrada DESC"

?>
