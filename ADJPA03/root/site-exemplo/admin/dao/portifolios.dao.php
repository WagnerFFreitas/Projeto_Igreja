<?php

    require_once(__DIR__ . "/../inc/conexao.php");
    require_once(__DIR__ . "/../model/portifolio.model.php");

    class PortifoliosDao extends Conexao {
        public $Mensagem;
        //Método para inserir registro
        public function Inserir($portifolio) {
            
            $sql = "INSERT INTO portifolio (titulo, descricao, imagem, linkexterno, id_categoria, titulo_categoria)
            values (?,?,?,?,?,?)";
            
            $parametros = array($portifolio->Titulo, $portifolio->Descricao, $portifolio->Imagem, $portifolio->LinkExterno,
                                $portifolio->Id_categoria, $portifolio->Titulo_categoria);
            
            try {
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
        public function Alterar($portifolio) {
            $sql = "UPDATE portifolio 
                        SET titulo = ?,
                            descricao = ?,
                            imagem = ?,
                            linkexterno = ?,
                            id_categoria = ?,
                            titulo_categoria = ?
                        WHERE id = ?";
            
            $parametros = array($portifolio->Titulo, $portifolio->descricao, $portifolio->imagem, $portifolio->linkexterno, 
                                $portifolio-> id_categoria, $portifolio->titulo_categoria, $portifolio->Id);
            
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
        public function ListarTudo() {
            $sql = "SELECT p.id, p.titulo, p.descricao, p.imagem, p.linkexterno,
            c.id AS id_categoria, c.titulo AS titulo_categoria
            FROM portifolio AS p
            inner join categoria AS c on p.id_categoria = c.id";
            $retorno = array();
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute();
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                foreach($registros as &$reg) {
                    $item = new Portifolio();
                    $item->Id = $reg["id"];
                    $item->Titulo = $reg["titulo"];
                    $item->Descricao = $reg["descricao"];
                    $item->Imagem = $reg["imagem"];
                    $item->LinkExterno = $reg["linkexterno"];
                    $item->Id_categoria = $reg["id_categoria"];
                    $item->Titulo_categoria = $reg["titulo_categoria"];
                    $retorno[] = $item;
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
            $sql = "SELECT * FROM portifolio where id = ?";
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
                    $retorno = new Portifolio();
                    $retorno->Id = $reg["id"];
                    $retorno->Titulo = $reg["titulo"];
                    $retorno->Descricao = $reg["descricao"];
                    $retorno->Imagem = $reg["imagem"];
                    $retorno->LinkExterno = $reg["linkexterno"];
                    $retorno->Id_categoria = $reg["id_categoria"];
                    //$retorno->Titulo_categoria = $reg["titulocategoria"];
    
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