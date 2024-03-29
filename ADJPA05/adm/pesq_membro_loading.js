//Java script Source
/*
* Desenvolvido por Eric Rodrigo de Freitas
* 29/05/08
* ---------------
* Requisi��o de fotos via ajax
* ---------------
******************************************/
var pagina=0;
var diretorio;
var total_fotos;
var objeto;


//Mostra Carregando
function mostraCarregando(){
    document.getElementById('foto').innerHTML = '';
    document.getElementById('foto').innerHTML = '<img src="html/imagens/carregando/21-0.gif" /> Carregando...';

}
//Esconde Carregando
function escondeCarregando(){
    document.getElementById('foto').innerHTML = '';
}

//--------------------------
//Fun��o que inicia o ajax
function iniciaAjax(){
    if(window.ActiveXObject) var ajax = new ActiveXObject('Microsoft.XMLHTTP');
    else var ajax = new XMLHttpRequest();
    return ajax;
}

//muda foto
function mudaFoto(pg,idObj,dir){
    mostraCarregando();
    
    pagina = pg;
    diretorio = dir;
    objeto = idObj;
    
    
    total_paginas();
    ajax = iniciaAjax();
    ajax.onreadystatechange = foto;
    ajax.open('GET', 'html/fotos.php?acao=foto&pg='+pagina+'&item='+objeto);
    ajax.send(null);
    
}

function foto(){
    
    if(ajax.readyState == 4){
        escondeCarregando();
        if(ajax.status == 200){
            
            
            var resposta = ajax.responseText;
            document.getElementById('foto').innerHTML+= '<img src="'+diretorio+'/'+resposta+'" />';
        }
    }else alert('Houve um problema!\n Por favor contate o Suporte. \n'+ajax.statusText);
}
function total_paginas(){
    ajax = iniciaAjax();
    ajax.onreadystatechange = total;
    ajax.open('GET', 'html/fotos.php?acao=total_fotos&pg='+pagina+'&item='+objeto);
    ajax.send(null);
}
function total(){
    
    if(ajax.readyState == 4){
        if(ajax.status == 200){
            var resposta = ajax.responseText;
            total_fotos = resposta;
            
            if(pagina==0) document.getElementById('anterior').style.display = 'none';
            else document.getElementById('anterior').style.display = 'block';
            
            
            if(pagina==(total_fotos-1)) document.getElementById('proximo').style.display = 'none';
            else document.getElementById('proximo').style.display = 'block';
            
            
            document.getElementById('fechar').style.display = 'block';
            
        }
    }else alert('Houve um problema!\n Por favor contate o Suporte. \n'+ajax.statusText);
}

function fotoProximo(){
    pagina = pagina + 1;
    mudaFoto(pagina,objeto,diretorio);
}
function fotoAnterior(){
    pagina = pagina - 1;
    mudaFoto(pagina,objeto,diretorio);    
}