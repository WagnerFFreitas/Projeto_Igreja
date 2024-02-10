<?php

    require_once(__DIR__ . "/../inc/conexao.php");
    require_once(__DIR__ . "/../model/categoria.model.php");

    class CategoriasDao extends Conexao{
        public $Mensagem;
        //Método para inserir registro
        public function Inserir($categoria){
            
            $sql = "INSERT INTO categoria (titulo)
                VALUES (?)";
            
            $parametros = array($categoria->Titulo);
            
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
        public function Alterar($categoria){
            $sql = "UPDATE categoria 
                        SET titulo = ?
                        WHERE id = ?";
            
            $parametros = array($categoria->Titulo,$categoria->Id);
            
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
            $sql = "SELECT * FROM categoria";
            $retorno = array();
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute();
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                foreach($registros as &$reg){
                    $item = new Categoria();
                    $item->Id = $reg["id"];
                    $item->Titulo = $reg["titulo"];
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
            $sql = "SELECT * FROM categoria where id = ?";
            $parametro = array($id);
            $retorno = null;
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute($parametro);
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                
                if(count($registros) > 0) {
                    //Aloco primeiro registro para preencher a Model
                    $reg = $registros[0];
                    //Instancio e preencho a Model
                    $retorno = new Categoria();
                    $retorno->Id = $reg["id"];
                    $retorno->Titulo = $reg["titulo"];
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