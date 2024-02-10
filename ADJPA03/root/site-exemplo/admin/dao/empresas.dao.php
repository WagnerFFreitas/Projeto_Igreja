<?php 

     require_once(__DIR__ . "/../inc/conexao.php");
     require_once(__DIR__ . "/../model/empresa.model.php");

     class EmpresasDao extends Conexao {
        public $Mensagem;
        //Método para inserir registro
        public function Inserir($empresa){
            
            $sql = "INSERT INTO empresa (titulo, texto)
                VALUES (?,?)";
            
            $parametros = array($empresa->Titulo, $empresa->Texto);
            
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
        public function Alterar($empresa){
            $sql = "UPDATE empresa 
                        SET titulo = ?,
                            texto = ?                            
                        WHERE id = ?";
            
            $parametros = array($empresa->Titulo, $empresa->Texto, $empresa->Id);
            
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
            $sql = "SELECT * FROM empresa";
            $retorno = array();
            
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute();
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                foreach($registros as &$reg){
                    $item = new Empresa();
                    $item->Id = $reg["id"];
                    $item->Titulo = $reg["titulo"];
                    $item->Texto = $reg["texto"];
                    $retorno[]=$item;
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