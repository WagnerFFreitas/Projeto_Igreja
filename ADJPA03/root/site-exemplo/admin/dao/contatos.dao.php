<?php

    require_once(__DIR__ . "/../inc/conexao.php");
    require_once(__DIR__ . "/../model/contato.model.php");

    class ContatosDao extends Conexao {
        public $Mensagem;
        //Método para inserir registro
        public function Inserir($contato) {
            
            $sql = "INSERT INTO contatos (nome, email, telefone, mensagem)
                VALUES (?,?,?,?)";
            
            $parametros = array($contato->Nome, $contato->Email, $contato->Telefone, $contato->Mensagem);
            
            try{
                $comando = $this->prepare($sql);
                $comando->execute($parametros);
                return true;
            }
            catch (PDOException $ex)
            {
                $this->Mensagem = "Erro ao inserir o registro" . $ex->getMessage();
                return false;
            }
        }
        
        //Método para alterar registro
        public function Alterar($contato){
                   $sql = "UPDATE contato 
                        SET nome = ?,
                            email = ?,
                            telefone = ?,
                            mensagem = ?
                        WHERE id = ?";
            
            $parametros = array($contato->Nome, $contato->Email, $contato->Telefone, $contato->Mensagem, $contato->Id);
            
            try{
                $comando = $this->prepare($sql);
                $comando->execute($parametros);
                return true;
            }
            catch (PDOException $ex)
            {
                $this->Mensagem = "Erro ao inserir o registro" . $ex->getMessage();
                return false;
            }
            
            
        }
        
        //Método para listar todos os registros
        public function ListarTudo(){
            $sql = "SELECT * FROM contatos";
            $retorno = array();
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute();
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                foreach($registros as &$reg){
                    $item = new Contato();
                    $item->Id = $reg["id"];
                    $item->Nome = $reg["nome"];
                    $item->Telefone = $reg["telefone"];
                    $item->Email = $reg["email"];
                    $item->Mensagem = $reg["mensagem"];
                    $retorno[]=$item;
                }
            }
            catch (PDOException $ex)
            {
                $this->Mensagem = "Erro ao listar: " . $ex->getMessage();
            }
            return $retorno;    
        }
                    
        //Método para pesquisar por um registro específico
        public function BuscarPorId($id){
            $sql = "SELECT * FROM contatos where id = ?";
            $parametro = array($id);
            $retorno = null;
            try{
                $comando = $this->prepare($sql);
                $resultado = $comando->execute($parametro);
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                
                if(count($registros) > 0) {
                    //Aloco primeiro registro para preencher a Model    
                    $reg = $registros[0];
                    //Instancio e preencho a Model
                    $retorno = new Contato();
                    $retorno->Id = $reg["id"];
                    $retorno->Nome = $reg["nome"];
                    $retorno->Telefone = $reg["telefone"];
                    $retorno->Email = $reg["email"];
                    $retorno->Mensagem = $reg["mensagem"];
                    
                }
                
            }
            catch (PDOException $ex)
            {
                $this->Mensagem = "Erro ao listar: " . $ex->getMessage();
            }
            
            return $retorno;
        }
        //Método para excluir um registro específico
        public function Excluir($id){
            
            
        }
    
    }


?>