<?php  
	
	include('../includes/connectionfactory.php');
	include('../mpdf60/mpdf.php');

	class MembroDAO{

		public function cadastrarMembro($membro){

			$PDO = connection();

			$sql = "INSERT INTO user_membro(nome,rg,cpf,nome_pai,nome_mae,naturalidade,endereco,numero,bairro,estado,cidade,telefone,celular,data_nascimento,estado_civil,profissao,data_conversao,data_batismo,nome_igreja_anterior,telefone_igreja_anterior,observacoes,url_foto)VALUES(:nome,:rg,:cpf,:nome_pai,:nome_mae,:naturalidade,:endereco,:numero,:bairro,:estado,:cidade,:telefone,:celular,:data_nascimento,:estado_civil,:profissao,:data_conversao,:data_batismo,:nome_igreja_anterior,:telefone_igreja_anterior,:observacoes,:url_foto)";

			$statement = $PDO->prepare($sql);

			$statement->bindValue(":nome", $membro->getNome());
			$statement->bindValue(":rg", $membro->getRg());
			$statement->bindValue(":cpf", $membro->getCpf());
			$statement->bindValue(":nome_pai", $membro->getNomePai());
			$statement->bindValue(":nome_mae", $membro->getNomeMae());
			$statement->bindValue(":naturalidade", $membro->getNaturalidade());
			$statement->bindValue(":endereco", $membro->getEndereco());
			$statement->bindValue(":numero", $membro->getNumero());
			$statement->bindValue(":bairro", $membro->getBairro());
			$statement->bindValue(":estado", $membro->getEstado());
			$statement->bindValue(":cidade", $membro->getCidade());
			$statement->bindValue(":telefone", $membro->getTelefone());
			$statement->bindValue(":celular", $membro->getCelular());
			$statement->bindValue(":data_nascimento", $membro->getDataNascimento());
			$statement->bindValue(":estado_civil", $membro->getEstadoCivil());
			$statement->bindValue(":profissao", $membro->getProfissao());
			$statement->bindValue(":data_conversao", $membro->getDataConversao());
			$statement->bindValue(":data_batismo", $membro->getDataBastismo());
			$statement->bindValue(":nome_igreja_anterior", $membro->getNomeIgrejaAnterior());
			$statement->bindValue(":telefone_igreja_anterior", $membro->getTelefoneIgrejaAnterior());
			$statement->bindValue(":observacoes", $membro->getObservacoes());
			$statement->bindValue(":url_foto", $membro->getUrlFoto());

			if($statement->execute()){
				// efetua o upload da imagem enviada pelo usuario para o servidor
				move_uploaded_file($_FILES["imagem_upload"]["tmp_name"],"../uploaders/".$membro->getUrlFoto());
				return true;
			}else{
				return false;
			}
		}//Fim function cadastrarMembro($membro)

		public function alterarMembro($membro){

			$PDO = connection();

			$sql = "UPDATE user_membro SET nome = :nome, rg = :rg, nome_pai = :nome_pai, nome_mae = :nome_mae, naturalidade = :naturalidade, endereco = :endereco, numero = :numero, bairro = :bairro, estado = :estado, cidade = :cidade, telefone = :telefone, celular = :celular, data_nascimento = :data_nascimento, estado_civil = :estado_civil, profissao = :profissao, data_conversao = :data_conversao, data_batismo = :data_batismo, nome_igreja_anterior = :nome_igreja_anterior, telefone_igreja_anterior = :telefone_igreja_anterior, observacoes = :observacoes, url_foto = :url_foto WHERE id = :id";

			$statement = $PDO->prepare($sql);

			$statement->bindValue(":nome", $membro->getNome());
			$statement->bindValue(":rg", $membro->getRg());
			$statement->bindValue(":nome_pai", $membro->getNomePai());
			$statement->bindValue(":nome_mae", $membro->getNomeMae());
			$statement->bindValue(":naturalidade", $membro->getNaturalidade());
			$statement->bindValue(":endereco", $membro->getEndereco());
			$statement->bindValue(":numero", $membro->getNumero());
			$statement->bindValue(":bairro", $membro->getBairro());
			$statement->bindValue(":estado", $membro->getEstado());
			$statement->bindValue(":cidade", $membro->getCidade());
			$statement->bindValue(":telefone", $membro->getTelefone());
			$statement->bindValue(":celular", $membro->getCelular());
			$statement->bindValue(":data_nascimento", $membro->getDataNascimento());
			$statement->bindValue(":estado_civil", $membro->getEstadoCivil());
			$statement->bindValue(":profissao", $membro->getProfissao());
			$statement->bindValue(":data_conversao", $membro->getDataConversao());
			$statement->bindValue(":data_batismo", $membro->getDataBastismo());
			$statement->bindValue(":nome_igreja_anterior", $membro->getNomeIgrejaAnterior());
			$statement->bindValue(":telefone_igreja_anterior", $membro->getTelefoneIgrejaAnterior());
			$statement->bindValue(":observacoes", $membro->getObservacoes());
			$statement->bindValue(":url_foto", $membro->getUrlFoto());
			$statement->bindValue(":id",$membro->getId());

			if($statement->execute()){
				return true;
			}else{
				return false;
			}
			
		}//Fim function alterarMembro($membro)

		public function excluirMembro($membro){
			$PDO = connection();

			$sql = "DELETE FROM user_membro WHERE id = :id";

			$statement = $PDO->prepare($sql);
			$statement->bindValue(":id",$membro->getId());

			if($statement->execute()){
				if($statement->rowCount() > 0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;	
			}
		}

		public function excluirFotoMembro($membro){

			$PDO = connection();
			$sql = "SELECT *FROM user_membro WHERE id = :id";
			$statement = $PDO->prepare($sql);
			$statement->bindValue(":id",$membro->getId());

			if($statement->execute()){
				if($statement->rowCount() > 0){
					$membro = $statement->fetch(pdo::FETCH_ASSOC);
					unlink("../uploaders/".$membro['url_foto']);
				}
			}

		}

		public function imprimirPDF($membro){
			$PDO = connection();
			$sql = "SELECT *FROM user_membro WHERE id = :id";
			$statement = $PDO->prepare($sql);
			$statement->bindValue(":id",$membro->getId());

			if($statement->execute()){
				if($statement->rowCount() > 0){
					$membro = $statement->fetch(pdo::FETCH_ASSOC);

					//$data = implode("/",array_reverse(explode("-",$data)));
      
			      	$membro['data_nascimento'] = implode("/", array_reverse(explode("-", $membro['data_nascimento'])));
			      	$membro['data_batismo'] = implode("/", array_reverse(explode("-", $membro['data_batismo'])));
			      	$membro['data_conversao'] = implode("/", array_reverse(explode("-", $membro['data_conversao'])));

					$html = "<!DOCTYPE html>
					<html>
					<head>
						<meta charset='utf-8'>
						<meta http-equiv='X-UA-Compatible' content='IE=edge'>
						<title>Ficha Cadastro de Membro</title>
					</head>
					<body>
						<h1>Ficha de Cadastro de Membro</h1>
						<img src='../uploaders/{$membro['url_foto']}' alt='' width='100' height='100'>
						<br><br>

						<label for='nome'>Nome: </label>
						<input type='text' name='nome' value='{$membro['nome']}' class='input_nome'>
						<label name='cpf'>Cpf: </label>
						<input type='text' name='cpf' value='{$membro['cpf']}' class='input_cpf'>
						<label name='rg'>Rg: </label>
						<input type='text' name='rg' value='{$membro['rg']}' class='input_rg'>
						<br><br>

						<label name='nome_pai'>Pai: </label>
						<input type='text' name='nome_pai' value='{$membro['nome_pai']}' class='input_nome_pai'>
						<label name='nome_mae'>Mãe: </label>
						<input type='text' name='nome_mae' value='{$membro['nome_mae']}' class='input_nome_mae'>
						<br><br>

						<label name='naturalidade'>Naturalidade: </label>
						<input type='text' name='naturalidade' value='{$membro['naturalidade']}' class='input_naturalidade'>
						<label name='endereco'>Endereço: </label>
						<input type='text' name='endereco' value='{$membro['endereco']}' class='input_endereco'>
						<label name='numero'>Numero: </label>
						<input type='text' name='numero' value='{$membro['numero']}' class='input_numero'>
						<label name='bairro'>Bairro: </label>
						<input type='text' name='bairro' value='{$membro['bairro']}' class='input_bairro'>
						<br></br>

						<label name='estado'>Estado: </lable>
						<input type='text' name='estado' value='{$membro['estado']}' class='input_estado'>
						<label name='cidade'>Cidade: </label>
						<input type='text' name='cidade' value='{$membro['cidade']}' class='input_cidade'>
						<label name='telefone'>Telefone: </label>
						<input type='text' name='telefone' value='{$membro['telefone']}' class='input_telefone'>
						<label name='celular'>Celular: </label>
						<input type='celular' name='celular' value='{$membro['celular']}' class='input_celular'>
						<br><br>

						<label name='data_nascimento'>Data Nascimento: </label>
						<input type='text' name='data_nascimento' value='{$membro['data_nascimento']}' class='input_data_nascimento'>
						<label name='estado_civil'>Estado Civil</label>
						<input type='text' name='estado_civil' value='{$membro['estado_civil']}' class='input_estado_civil'>
						<label>Profissao</label>
						<input type='text' name='profissao' value='{$membro['profissao']}' class='input_profissao'>	
						<br><br>
						
						<label name='data_conversao'>Data Conversão: </label>
						<input type='text' name='data_conversao' value='{$membro['data_conversao']}' class='input_data_conversao'>
						<label name='data_batismo'>Data Batismo: </label>
						<input type='text' name='data_batismo' value='{$membro['data_batismo']}' class='input_data_batismo'>
						<br><br>
						
						<label name='nome_igreja_anterior'>Igreja Anterior: </label>
						<input type='text' name='nome_igreja_anterior' value='{$membro['nome_igreja_anterior']}' class='input_nome_igreja_anterior'>
						<label name='telefone_igreja_anterior'>Telefone :</label>
						<input type='text' name='telefone_igreja_anterior' value='{$membro['telefone_igreja_anterior']}' class='input_telefone_igreja_anterior'>
						<br><br>
						<label name='observacoes'>Obs: </label>
						<textarea name='observacoes' class='text_area_observacoes'>{$membro['observacoes']}</textarea>
						</body>
					</html>
					";

					
					$footer = "Igreja Evangelica Pentecostal Rua Santa Izabel, n°255, Centro, Ouro Verde de Minas<br> Ev: Paulo Henrique Ribeiro (33)988792993 iep.ouroverdemg@gmail.com iepouroverdemg.com.br<br> SICAM 1.0 Desenvolvido por Augusto Ramos walteraugusto10@hotmail.com";

					//$html = utf8_encode($html);

					$mpdf=new mPDF();

					$mpdf->allow_charset_conversion = true;
					$mpdf->charset_in = 'UTF-8';

					$mpdf->SetDisplayMode('fullpage');
					$css = file_get_contents("../css/style-ficha.css");
					$mpdf->WriteHTML($css,1);
					$mpdf->WriteHTML($html);
					$mpdf->SetFooter($footer);
					$mpdf->Output();
				}
			}
		}

		

	}
?>



