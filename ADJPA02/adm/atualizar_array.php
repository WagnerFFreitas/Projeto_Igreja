<?PHP
controle("atualizar");

	//Se cada vari�vel tem um valor
	if ($_SESSION["rol"]){
	  $atualiza = new DBRecord ("{$_POST["tabela"]}",$_SESSION['rol'],"rol"); //Aqui ser� selecionado a informa��o do campo rol

	  foreach ($_POST as $key => $value) {
		if ($key!=="Submit" && $key!=="tabela" && $key!=="escolha") {
		echo "<p>Campo: ".$key." <-> value: ".$value."</p>";
		print $atualiza->$key()." ++++ ";
		 
		$atualiza->$key = ltrim($value); //Aqui � atribuido a esta vari�vel um valor para UpDate
		$atualiza->Update();	  //Atualizar dados
		}
	  }
	
	}else{
	  echo  "N�o h� membro selecinado!";
	}
	

 ?> 