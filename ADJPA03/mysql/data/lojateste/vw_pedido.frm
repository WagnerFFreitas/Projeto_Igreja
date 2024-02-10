TYPE=VIEW
query=select `p`.`id` AS `id`,`pe`.`nome` AS `nome`,`s`.`descricao` AS `descricao`,`p`.`valor_total` AS `valor_total` from ((`lojateste`.`pedido` `p` join `lojateste`.`pessoa` `pe` on((`p`.`id_Pessoa` = `pe`.`id`))) join `lojateste`.`segmento` `s` on((`s`.`id` = `pe`.`id_segmento`))) where (`p`.`valor_total` >= 100)
md5=57d06049731d7eb3dc66139babceed4d
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2019-07-18 23:22:22
create-version=1
source=SELECT p.id, pe.nome, s.descricao, p.valor_total\n   FROM pedido p\n 	INNER JOIN pessoa pe ON p.id_Pessoa = pe.id\n   	INNER JOIN segmento s ON s.id = pe.id_segmento\n   WHERE\n	p.valor_total >= 100
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `p`.`id` AS `id`,`pe`.`nome` AS `nome`,`s`.`descricao` AS `descricao`,`p`.`valor_total` AS `valor_total` from ((`lojateste`.`pedido` `p` join `lojateste`.`pessoa` `pe` on((`p`.`id_Pessoa` = `pe`.`id`))) join `lojateste`.`segmento` `s` on((`s`.`id` = `pe`.`id_segmento`))) where (`p`.`valor_total` >= 100)
