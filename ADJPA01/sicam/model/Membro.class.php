<?php

	class Membro{
		private $id, $nome, $rg, $cpf, $nomePai, $nomeMae, $naturalidade, $endereco, $numero, $bairro, $estado, $cidade, $telefone, $celular, $dataNascimento, $estadoCivil, $profissao, $dataConversao, $dataBatismo, $nomeIgrejaAnterior, $telefoneIgrejaAnterior, $observacoes, $urlFoto;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getRg(){
			return $this->rg;
		}

		public function setRg($rg){
			$this->rg = $rg;
		}

		public function getCpf(){
			return $this->cpf;
		}

		public function setCpf($cpf){
			$this->cpf = $cpf;
		}

		public function getNomePai(){
			return $this->nomePai;
		}

		public function setNomePai($nomePai){
			$this->nomePai = $nomePai;
		}

		public function getNomeMae(){
			return $this->nomeMae;
		}

		public function setNomeMae($nomeMae){
			$this->nomeMae = $nomeMae;
		}

		public function getNaturalidade(){
			return $this->naturalidade;
		}

		public function setNaturalidade($naturalidade){
			$this->naturalidade = $naturalidade;
		}

		public function getEndereco(){
			return $this->endereco;
		}

		public function setEndereco($endereco){
			$this->endereco = $endereco;
		}

		public function getNumero(){
			return $this->numero;
		}

		public function setNumero($numero){
			$this->numero = $numero;
		}

		public function getBairro(){
			return $this->bairro;
		}

		public function setBairro($bairro){
			$this->bairro = $bairro;
		}

		public function getEstado(){
			return $this->estado;
		}

		public function setEstado($estado){
			$this->estado = $estado;
		}

		public function getCidade(){
			return $this->cidade;
		}

		public function setCidade($cidade){
			$this->cidade = $cidade;
		}

		public function getTelefone(){
			return $this->telefone;
		}

		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}

		public function getCelular(){
			return $this->celular;
		}

		public function setCelular($celular){
			$this->celular = $celular;
		}

		public function getDataNascimento(){
			return $this->dataNascimento;
		}

		public function setDataNascimento($dataNascimento){
			$this->dataNascimento = $dataNascimento;
		}
		
		public function getEstadoCivil(){
			return $this->estadoCivil;
		}

		public function setEstadoCivil($estadoCivil){
			$this->estadoCivil = $estadoCivil;
		}

		public function getProfissao(){
			return $this->profissao;
		}

		public function setProfissao($profissao){
			$this->profissao = $profissao;
		}

		public function getDataConversao(){
			return $this->dataConversao;
		}

		public function setDataConversao($dataConversao){
			$this->dataConversao = $dataConversao;
		}

		public function getDataBastismo(){
			return $this->dataBatismo;
		}

		public function setDataBatismo($dataBatismo){
			$this->dataBatismo = $dataBatismo;
		} 

		public function getNomeIgrejaAnterior(){
			return $this->nomeIgrejaAnterior;
		}

		public function setNomeIgrejaAnterior($nomeIgrejaAnterior){
			$this->nomeIgrejaAnterior = $nomeIgrejaAnterior;
		}

		public function getTelefoneIgrejaAnterior(){
			return $this->telefoneIgrejaAnterior;
		}

		public function setTelefoneIgrejaAnterior($telefoneIgrejaAnterior){
			$this->telefoneIgrejaAnterior = $telefoneIgrejaAnterior;
		}

		public function getObservacoes(){
			return $this->observacoes;
		}

		public function setObservacoes($observacoes){
			$this->observacoes = $observacoes;
		}

		public function getUrlFoto(){
			return $this->urlFoto;
		}

		public function setUrlFoto($urlFoto){
			$this->urlFoto = $urlFoto;
		}

	}
	

	
?>