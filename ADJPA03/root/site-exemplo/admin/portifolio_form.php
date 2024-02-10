<?php
    $tituloPagina = "Dashboard";
    include_once("inc/topo.php");

    include_once(__DIR__ . "/dao/portifolios.dao.php");

    $id = "";
    $titulo = "";
    $subTitulo = "Inclusão";

    //Se receber o ID via GET, busca o registro para Alteração
    //Caso contrário, será Inclusão
    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $id = $_GET["id"];
        $subTitulo = "Alteração";
        $portifoliosDAO = new PortifoliosDAO();
        $portifolio = $portifoliosDAO->BuscarPorId($id);
        $titulo = $portifolio->Titulo;
        $imagem = $portifolio->Imagem;
        $linkexterno = $portifolio->LinkExterno;
        $descricao = $portifolio->Descricao;
        
    }

?>

<!-- Portifolio - Inicio do código personalizado -->
<h1 class="h2">Cadastro de Portfolio <small><?=$subTitulo?></small></h1>   


<form action="portifolio_acao.php" method="post">
    <input type="hidden" name="id" value="<?$id?>"/>
    
    <h4>Título:</h4>
    <input type="text" id="txtTitulo" name="Titulo" size="135" />
    <h4>Imagem:</h4>
    <input type="file" id="arqImagem" name="Imagem" size="135" />
    <h4>Link:</h4>
    <input type="url" id="LinkExterno" name="LinkExterno" size="135" />
    <h4>Descrição:</h4>
    <textarea id="txtDescricao" name="Descricao" rows="15" cols="135"></textarea>
    <input type="hidden" name="id_categoria" value="<?$id_categoria?>"/>
    <h4>Título Categoria:</h4>l
    <input type="text" id="txtTituloCategoria" name="TituloCategoria" size="135" />
    
        
    <div>
        <button type="submit">Salvar</button>
    </div>
    
</form>


<!-- Portifolio - Final do código personalizado -->

<?php
    include_once("inc/rodape.php");
?>