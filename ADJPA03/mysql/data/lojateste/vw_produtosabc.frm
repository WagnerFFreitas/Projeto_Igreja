TYPE=VIEW
query=select `p`.`id` AS `id`,`p`.`nome` AS `nome`,`p`.`id_categoria` AS `id_categoria`,`c`.`descricao` AS `descricao` from (`lojateste`.`produto` `p` join `lojateste`.`categoria` `c` on((`p`.`id_categoria` = `c`.`id`))) where ((`p`.`status` = \'Ativo\') and (`c`.`nota` > 6))
md5=f8011cb4dd72179dd53dadf4417a0fe8
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2019-07-18 22:39:36
create-version=1
source=SELECT p.id, p.nome, p.id_categoria, c.descricao\n    FROM produto p\n	INNER JOIN categoria c ON p.id_categoria = c.id\n    WHERE\n	p.status = \'Ativo\' and\n	c.nota > 6
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `p`.`id` AS `id`,`p`.`nome` AS `nome`,`p`.`id_categoria` AS `id_categoria`,`c`.`descricao` AS `descricao` from (`lojateste`.`produto` `p` join `lojateste`.`categoria` `c` on((`p`.`id_categoria` = `c`.`id`))) where ((`p`.`status` = \'Ativo\') and (`c`.`nota` > 6))
