TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER tr_pedido_item_update\nAFTER UPDATE\nON pedido_item FOR EACH ROW\n\nBEGIN\n	CALL pr_atualiza_pedido_log(\'UPDATE\',\n			OLD.id,\n			OLD.id_pedido,\n			OLD.id_produto,\n			OLD.descricao,\n			OLD.lote,\n			OLD.validade, \n			OLD.qtd,\n			OLD.preco);\nEND' 'CREATE DEFINER=`root`@`localhost` TRIGGER tr_pedido_item_delete\nAFTER delete\nON pedido_item FOR EACH ROW\n\nBEGIN\n	CALL pr_atualiza_pedido_log(\'DELETE\',\n			OLD.id,\n			OLD.id_pedido,\n			OLD.id_produto,\n			OLD.descricao,\n			OLD.lote,\n			OLD.validade, \n			OLD.qtd,\n			OLD.preco);\nEND' 'CREATE DEFINER=`root`@`localhost` TRIGGER tr_pedido_item_insert\nAFTER INSERT\nON pedido_item FOR EACH ROW\n\nBEGIN\n\n	CALL pr_atualiza_pedido_log(\'INSERT\',\n			NEW.id,\n			NEW.id_pedido,\n			NEW.id_produto,\n			NEW.descricao,\n			NEW.lote,\n			NEW.validade, \n			NEW.qtd,\n			NEW.preco);\nEND'
sql_modes=1073741824 1073741824 1073741824
definers='root@localhost' 'root@localhost' 'root@localhost'
client_cs_names='utf8' 'utf8' 'utf8'
connection_cl_names='utf8_general_ci' 'utf8_general_ci' 'utf8_general_ci'
db_cl_names='latin1_swedish_ci' 'latin1_swedish_ci' 'latin1_swedish_ci'
