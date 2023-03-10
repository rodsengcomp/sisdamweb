<?php
echo Realizando backup do MySQL...

mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam adm_sanitaria > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\SisdamWeb\adm_sanitaria\adm_sanitaria_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam materiais_controle > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\SisdamWeb\materiais_controle\materiais_controle_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam memo > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\SisdamWeb\memo\memo_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam sv2 > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\SisdamWeb\sv2\sv2_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam ruas > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\SisdamWeb\ruas\ruas_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tid > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\SisdamWeb\tid\tid_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tbldengue > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\SisdamWeb\tbls\tbldengue_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tblchiku > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\SisdamWeb\tbls\tblchiku_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tblfebrea > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\SisdamWeb\tbls\tblfebrea_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tbllepto > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\SisdamWeb\tbls\tbllepto_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tblsarampo > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\SisdamWeb\tbls\tblsarampo_%date:~0,2%%date:~3,2%%date:~6,4%.sql

mysqldump --single-transaction=TRUE -u d788796 -p230814 suvisjt > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\Site\BackUp_Mysql_Site_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 suvisjt > J:\AMBIENTAL\Backup_Servidor_Mysql_Ambiental\Site\BackUp_Mysql_Site_%date:~0,2%%date:~3,2%%date:~6,4%.sql

mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam adm_sanitaria > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\SisdamWeb\adm_sanitaria\adm_sanitaria_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam materiais_controle > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\SisdamWeb\materiais_controle\materiais_controle_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam memo > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\SisdamWeb\memo\memo_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam sv2 > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\SisdamWeb\sv2\sv2_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam ruas > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\SisdamWeb\ruas\ruas_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tid > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\SisdamWeb\tid\tid_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tbldengue > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\SisdamWeb\tbls\tbldengue_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tblchiku > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\SisdamWeb\tbls\tblchiku_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tblfebrea > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\SisdamWeb\tbls\tblfebrea_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tbllepto > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\SisdamWeb\tbls\tbllepto_%date:~0,2%%date:~3,2%%date:~6,4%.sql
mysqldump --single-transaction=TRUE -u d788796 -p230814 sisdam tblsarampo > H:\EPIDEMIOLOGIA\Informatica\Backup_Servidor_Mysql_Trabalho\SisdamWeb\tbls\tblsarampo_%date:~0,2%%date:~3,2%%date:~6,4%.sql

echo Backup concluído com sucesso.