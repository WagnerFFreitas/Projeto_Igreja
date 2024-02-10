<?php
 
 // INFORME O CÓDIGO API DO SEU STREAMING
 $api = "http://184.95.53.54/api/OTEyMitZ"; // codigo api

 

 // NÃO NECESSÁRIO EDITAR O CÓDIGO ABAIXO:
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, "".$api."");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; pt-BR; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3 ( .NET CLR 3.5.30729)');
 curl_setopt($ch, CURLOPT_TIMEOUT, 5);
 $resultado = curl_exec($ch);
 curl_close($ch);
 $xml = @simplexml_load_string(utf8_encode($resultado));
 $porta_atual = $xml->porta;
 $ip_atual = $xml->ip;
 $codigo_atual = $xml->codigo;
 $musica_atual = $xml->musica_atual;
 $titulo = $xml->streamtitle;
 $rtmp_atual = $xml->rtmp;
 $url_atual = $xml->url;
 $ip = "".$ip_atual."";
 $porta = "".$porta_atual."";
 $titulo = "".$titulo."";
 $codigo = "".$codigo_atual."";
 $rtmp = "".$rtmp_atual."";
 $url = "".$url_atual."";
?>