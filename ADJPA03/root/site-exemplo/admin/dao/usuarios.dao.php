<?php 

    require_once(__DIR__ . "/../inc/conexao.php");
    require_once(__DIR__ . "/../model/usuario.model.php");


    class UsuariosDao extends Conexao {
        public $Mensagem;
        
        //Método para Autenticaçâo no Sistema
        public function Autenticar($usuario, $senha){
            $sql = "SELECT id FROM usuario WHERE email = ? AND senha = ?";
            $parametro = array($usuario, $senha);
            
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute($parametro);
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                
                return (count($registros) > 0);
            }
            catch (PDOException $ex) {
                $this->Mensagem = "Erro ao Listar: " . $ex->getMessage();
                return false;
            }
            
        }
        
        
         //Método para Autenticaçâo no Sistema
         public function BuscarObjPorUsuarioSenha($usuario, $senha){
            $sql = "SELECT id, nome, email, senha FROM usuario WHERE email = ? AND senha = ?";
            $parametro = array($usuario, $senha);
            $objusuario = null;
             
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute($parametro);
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
              
                foreach($registros as &$reg){
                    $objusuario = new Usuario();
                    
                    $objusuario->Id = $reg["id"];
                    $objusuario->Nome = $reg["nome"];
                    $objusuario->Email = $reg["email"];
                    $objusuario->Senha = $reg["senha"];
                    
                    
                    return $objusuario;
                    
                    
                }
            }
            catch (PDOException $ex) {
                $this->Mensagem = "Erro ao Listar: " . $ex->getMessage();
                return $objusuario;
            }
            
        }
        
        
        //Método para inserir registro
        public function Inserir($usuario) {
            
            $sql = "INSERT INTO usuario (nome, email, senha)
                VALUES (?,?,?)";
            
            $parametros = array($usuario->Nome, $usuario->Email, $usuario->Senha);
            
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
        public function Alterar($usuario){
            $sql = "UPDATE usuario 
                        SET nome = ?, email = ?, senha = ?
                        WHERE id = ?";
            
            $parametros = array($usuario->Nome, $usuario->Email, $usuario->Senha, $usuario->Id);
            
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
            $sql = "SELECT * FROM usuario";
            $retorno = array();
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute();
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                foreach($registros as &$reg){
                    $item = new Usuario();
                    $item->Id = $reg["id"];
                    $item->Nome = $reg["nome"];
                    $item->Email = $reg["email"];
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
            $sql = "SELECT * FROM usuario where id = ?";
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
                    $retorno = new Usuario();
                    $retorno->Id = $reg["id"];
                    $retorno->Nome = $reg["nome"];
                    $retorno->Email = $reg["email"];
                                        
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