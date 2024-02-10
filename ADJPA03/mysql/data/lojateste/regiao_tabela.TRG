TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER Tr_regiao_tabela_insert\nAFTER INSERT\nON regiao_tabela FOR EACH ROW\n\nBEGIN\n	CALL AdicionaNovosPrecoItens(\n			NEW.id_tabela_preco,\n			NEW.id_regiao\n			);\nEND'
sql_modes=1073741824
definers='root@localhost'
client_cs_names='utf8'
connection_cl_names='utf8_general_ci'
db_cl_names='latin1_swedish_ci'
