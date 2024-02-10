<?php
	
	define( 'MYSQL_HOST','localhost');
	define( 'MYSQL_USER','u956222309_sicam' );
	define( 'MYSQL_PASSWORD','UQREprnk0x');
	define( 'MYSQL_DB_NAME','u956222309_sicam');

	function connection(){
		// conectando no banco de dados usando pdo
		try{
			$PDO = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB_NAME,MYSQL_USER,MYSQL_PASSWORD);
		}catch(pdoexception $e){
			/* Caso ocorra algum erro na conexão com o banco, exibe a mensagem */
   			echo 'Falha ao conectar no banco de dados: '.$e->getMessage();
    		die;
		}
		return $PDO;
	}
?>