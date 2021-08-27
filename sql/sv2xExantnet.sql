SELECT exantnet.NU_NOTIFIC, exantnet.DT_NOTIFIC, exantnet.DT_SIN_PRI, exantnet.NM_PACIENT, exantnet.DT_NASC,exantnet.NM_LOGRADO,
exantnet.NU_NUMERO, exantnet.NM_COMPLEM, exantnet.NM_CONTATO, exantnet.NM_REFEREN, exantnet.CS_VACINA, exantnet.DT_DOSE_N,
exantnet.CS_VACINAL, exantnet.MENOR_5ANO, exantnet.DE5A14ANOS,exantnet.DE15A39ANO,exantnet.CLASSI_FIN,
exantnet.CS_DESCART,exantnet.CRITERIO, exantnet.EVOLUCAO, exantnet.DT_OBITO, exantnet.DT_ENCERRA FROM exantnet
LEFT JOIN sv2 ON exantnet.NU_NOTIFIC = sv2.sinan WHERE exantnet.ID_DISTRIT='70' AND sv2.sinan Is Null