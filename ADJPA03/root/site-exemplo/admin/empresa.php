<?php
    $tituloPagina = "Dashboard";
    include_once("inc/topo.php");

    include_once(__DIR__ . "/dao/empresas.dao.php");

    //Crio a DAO
    $empresasDAO = new EmpresasDAO();
    //Listo tudo, o esperado é termos 1 ou 0 registros
    $empresas = $empresasDAO->ListarTudo();
    
    $id = "";
    $titulo = "";
    $texto = "";

    //Verifico se tenho dados
    if (count($empresas) > 0){
        //Preencho as Variáveis vindo do Banco de Dados
        $id = $empresas[0]->Id;
        $titulo = $empresas[0]->Titulo;
        $texto = $empresas[0]->Texto;
        
    }

?>

<!-- Empresa - Inicio do código personalizado -->
    <h1 class="h2">Empresa</h1>

<form action="empresa_acao.php" method="post">
    <input type="hidden" name="id" value="<?=$id?>" />
    <div class="form-group">
        <label>Titulo</label>
        <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" value="<?=$titulo?>" />
    </div>

    <div class="form-group">
    <textarea class="form-control" rows="13" cols="100" id="txtTexto" name="txtTexto"><?=$texto?></textarea>
    </div>
    
    <div class="form-group text-center">
    <button class="btn btn-primary">
        <span data-fether="save"></span>
        Salvar</button>
    </div>    
</form>


<!-- Empresa - Inicio do código personalizado -->

<?php

    include_once("inc/rodape.php");

?>