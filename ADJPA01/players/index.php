<?php
 require_once("config.php");
?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script language="javascript" src="jquery-1.9.1.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refresh").everyTime(10000,function(i){
			j.ajax({
			  url: "infor.php",
			  cache: false,
			  success: function(html){
				j(".refresh").html(html);
			  }
			})
		})
	});
   j(".refresh").css({color:"white"});
});
</script>


<?php
//PLAYER FLASH.
 if($_GET['skin'] ==  'html5') { ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Player topo para porta  <?php echo "$porta";?> </title>
<link href="Player.css" rel="stylesheet" type="text/css">
<link href="index.css" rel="stylesheet" type="text/css">
<style type="text/css">
div#container
{
   width: 970px;
   position: relative;
   margin: 0 auto 0 auto;
   text-align: left;
}
body
{
   background-color: #<?=$_GET['cor'];?>;     
   background-image: url(none);
   color: #000000;
   font-family: Arial;
   font-size: 13px;
   margin: 0;
   text-align: center;
}
</style>
<style type="text/css">
a
{
   color: #0000FF;
   text-decoration: underline;
}
a:visited
{
   color: #800080;
}
a:active
{
   color: #0000FF;
}
a:hover
{
   color: #0000FF;
   text-decoration: underline;
}
</style>
<style type="text/css">
#wb_Text1 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text1 div
{
   text-align: left;
}
#wb_Text3 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: right;
}
#wb_Text3 div
{
   text-align: right;
}
#Image5
{
   border: 0px #000000 solid;
}
#Image6
{
   border: 0px #000000 solid;
}
#Image7
{
   border: 0px #000000 solid;
}
#Image8
{
   border: 0px #000000 solid;
}
#Image9
{
   border: 0px #000000 solid;
}
#wb_Text2 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text2 div
{
   text-align: left;
}
#wb_Text4 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text4 div
{
   text-align: left;
}
</style>

</head>
<body>
<div id="container">
<div id="wb_Text1" style="position:absolute;left:103px;top:0px;width:222px;height:16px;z-index:0;text-align:left;">
<span style="color:#000000;font-family:'Times New Roman';font-size:12px;">&nbsp;&nbsp; </span></div>
<div id="wb_Text3" style="position:absolute;left:792px;top:0px;width:113px;height:16px;text-align:right;z-index:1;">
<span style="color:#FFFFFF;font-family:Geneva;font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp; </span></div>
<div id="wb_Image5" style="position:absolute;left:811px;top:10px;width:26px;height:16px;z-index:2;">
<a href="<?php echo "$url";?>/player/<?php echo "$porta";?>/winamp.pls"><img src="imagem/img-icone-player-winamp.png" id="Image5" alt="" style="width:16px;height:16px;"></a></div>
<div id="wb_Image6" style="position:absolute;left:830px;top:10px;width:26px;height:16px;z-index:3;">
<a href="<?php echo "$url";?>/player/<?php echo "$porta";?>/mediaplayer.asx"><img src="imagem/img-icone-player-mediaplayer.png" id="Image6" alt="" style="width:16px;height:16px;"></a></div>
<div id="wb_Image7" style="position:absolute;left:849px;top:10px;width:26px;height:16px;z-index:4;">
<a href="<?php echo "$url";?>/player/<?php echo "$porta";?>/realplayer.rm"><img src="imagem/img-icone-player-realplayer.png" id="Image7" alt="" style="width:16px;height:16px;"></a></div>
<div id="wb_Image8" style="position:absolute;left:868px;top:10px;width:26px;height:16px;z-index:5;">
<a href="rtsp://aa.stm-ip.com:1935/shoutcast/<?php echo "$porta";?>.stream"target="_blank"><img src="imagem/img-icone-player-android.png" id="Image8" alt="" style="width:16px;height:16px;"></a></div>
<div id="wb_Image9" style="position:absolute;left:887px;top:10px;width:26px;height:16px;z-index:6;">
<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo "$url";?>/get-facebook/<?php echo "$codigo";?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"><img src="<?php echo "$url";?>/admin/img/img-icone-player-facebook.png" style="width:16px;height:16px;"></a></div>
<div id="Html1" style="position:absolute;left:57px;top:1px;width:252px;height:10px;z-index:7">
<div id="player">
<div id="player-controle">
<embed src="flash/tocar.swf" width="90" height="35" wmode="transparent" allowscriptaccess="always" allowfullscreen="true" flashvars="servidor=http://<?php echo "$ip";?>:<?php echo "$porta";?>/&amp;rtmp=rtmp://aa.stm-ip.com:1935/shoutcast&amp;autostart=true" type="application/x-shockwave-flash" style="padding-top:5px;">
<img src="imagem/img-player-vu-meter.gif" width="100" height="30" align="top" />
</div>
</div>
<div id="wb_Text2" style="position:absolute;left:300px;top:10px;width:136px;height:18px;z-index:8;text-align:left;">
<span style="color:#00B7B7;font-family:Geneva;font-size:15px;"><strong>Tocando agora:</strong></span></div>
<div id="wb_Text4" style="position:absolute;left:432px;top:11px;width:278px;height:16px;z-index:9;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><div class="refresh"><span style="color:#F0FFFF;font-family:Tahoma;font-size:8px;">Carregando</span></div></div>
</div>
</body>
</html>
<?php } else { ?>
<?php } ?>

<?php
//PLAYER SEM RTMP.
 if($_GET['skin'] ==  'sem_rtmp') { ?>

<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="https://hosted.muses.org/mrp.js"></script>
<head>
<style>
body {	background: #000000;	margin: 0px auto;	overflow: auto;}
.texto_padrao {	color: #e8e8e8;	font-family: Calibri, Arial, Helvetica, sans-serif;	font-size:13;	font-weight:normal;}
.players{margin: 0 auto;  width: 300px;   padding: 0px;   height: 44px;}
</style>
</head>
<body oncontextmenu="return false" onkeydown="return false" topmargin="0" marginwidth="0">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=681321385218129";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#<?=$_GET['cor'];?>"><tr><td>
<table align="center" width="990px" border="0" cellspacing="0" cellpadding="0" bgcolor="#<?=$_GET['cor'];?>">
  <tr>
	<td width="8%" height="44" align="center" class="texto_padrao"><a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo "$url";?>/get-facebook/<?php echo "$codigo";?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"><img class="share" title="Compartilhar player no facebook !" alt="Compartilhar player no facebook !" src="imagem/facebook.png" width="28" height="28" border="0" align="absmiddle" style="cursor:pointer;" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript: void(0);" onclick="window.open('http://twitter.com/home?status=Estou%20ouvindo%20agora%20 <?php echo "$titulo";?> <?php echo "$url";?>/player-html5/<?php echo "$codigo";?>=?skin=sem_rtmp','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"><img src="imagem/twitter.png" width="28" height="28" border="0" title="Compartilhar no Twitter !" align="absmiddle" /></a>
	</td>
    <td width="19%" height="44" align="left">

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="300" height="44" bgcolor="#<?=$_GET['cor'];?>">
<param name="movie" value="flash/muses.swf" />
<param name="wmode" value="window" />
<param name="allowscriptaccess" value="always" />
<param name="scale" value="noscale" />
<param name="bgcolor" value="#<?=$_GET['cor'];?>" />
<param name="flashvars" value="url=http://<?php echo "$ip";?>:<?php echo "$porta";?>/stream&lang=auto&codec=aac&volume=100&introurl=&autoplay=true&jsevents=false&skin=/play/xml.xml&title=" />
<embed src="flash/muses.swf" flashvars="url=http://<?php echo "$ip";?>:<?php echo "$porta";?>/stream&lang=auto&codec=aac&volume=100&introurl=&autoplay=true&jsevents=false&skin=xml.xml&title=" width="300" scale="noscale" height="44" wmode="window" bgcolor="#<?=$_GET['cor'];?>" allowscriptaccess="always" type="application/x-shockwave-flash" />
</object>

	</td>
	<td width="22%" height="50" align="center" class="texto_padrao">
			
				Ouvindo <?php echo "$titulo";?>:<div class="refresh">Carregando...</div>	</td>
	<td width="45%" height="44" align="right" class="texto_padrao">
		<a href="http://<?php echo "$ip";?>:<?php echo "$porta";?>/listen.m3u?sid=1">
		<img src="imagem/mobile.png" width="28" height="28" border="0" align="absmiddle" /></a>&nbsp;	
	<a href="#" onclick="window.open('http://<?php echo "$ip";?>:<?php echo "$porta";?>/listen.asx?sid=xx', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=560, HEIGHT=160');"><img src="imagem/windows.png" width="28" height="28" border="0" align="absmiddle" /></a>
	<a href="rtsp://aa.stm-ip.com:1935/shoutcast/<?php echo "$porta";?>.stream" target="_blank"><img src="imagem/android_app.png" width="28" height="28" border="0" align="absmiddle" /></a>
		
	</td>
	<td width="45%" height="44" align="right" class="texto_padrao">
	&nbsp;
	</td>
  </tr>
</table>
</td></tr></table>
<script language='javascript' src='http://code.jquery.com/jquery-2.1.4.min.js'></script>
<script language='javascript' src='https://sparqlpush.googlecode.com/svn-history/r2/trunk/client/jquery.timers-1.2.js'></script>


</body>
</html>
</body>
</html>

<?php } else { ?>
<?php } ?>

<?php
//PLAYER EM FLASH.
 if($_GET['skin'] ==  'flash') { ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo "$titulo";?>  <?php echo "$porta";?> </title>


<link href="Player.css" rel="stylesheet" type="text/css">
<link href="index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://<?php echo $_SERVER["HTTP_HOST"]; ?>/admin/inc/ajax-streaming.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script language="javascript" src="jquery-1.9.1.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>

</head>
<body>
<div id="container">
<div id="wb_Flash1" style="position:absolute;left:0px;top:0px;width:1567px;height:36px;z-index:0;">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="1567" height="36" id="Flash1">
<param name="movie" value="flash/player-topo.swf?stream=http://<?php echo "$ip";?>:<?php echo "$porta";?>&rtmp=<?php echo "$rtmp";?>">
<param name="quality" value="High">
<param name="scale" value="ExactFit">
<param name="wmode" value="Transparent">
<param name="play" value="true">
<param name="loop" value="false">
<param name="menu" value="false">
<param name="allowfullscreen" value="false">
<param name="allowscriptaccess" value="sameDomain">
<param name="sAlign" value="tl">
<embed src="flash/player-topo.swf?stream=http://<?php echo "$ip";?>:<?php echo "$porta";?>&rtmp=<?php echo "$rtmp";?>" width="1567" height="36" quality="High" wmode="Transparent" loop="false" play="true" menu="false" allowfullscreen="false" allowscriptaccess="sameDomain" scale="ExactFit" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflash">
</embed>
</object>
</div>
<div id="wb_Image5" style="position:absolute;left:640px;top:4px;width:32px;height:32px;z-index:5;">
<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo "$url";?>/get-facebook/<?php echo "$codigo";?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"><img src="<?php echo "$url";?>/admin/img/img-icone-player-facebook.png" border=0 width=28 height=28 /></div></a>
<div id="wb_Image1" style="position:absolute;left:678px;top:4px;width:34px;height:30px;z-index:1;">
<a href="<?php echo "$url";?>/player/<?php echo "$porta";?>/winamp.pls" target="_blank"><img src="imagem/img-icone-player-winamp.png" id="Image1" alt="" style="width:34px;height:30px;"></a></div>
<div id="wb_Image2" style="position:absolute;left:716px;top:4px;width:30px;height:28px;z-index:2;">
<a href="<?php echo "$url";?>/player/<?php echo "$porta";?>/mediaplayer.asx" target="_blank"><img src="imagem/img-icone-player-mediaplayer.png" id="Image2" alt="" style="width:30px;height:28px;"></a></div>
<div id="wb_Image3" style="position:absolute;left:758px;top:5px;width:30px;height:27px;z-index:3;">
<a href="http://<?php echo "$ip";?>:<?php echo "$porta";?>/listen.m3u?sid=1" target="_blank"><img src="imagem/img-icone-player-iphone.png" id="Image3" alt="" style="width:30px;height:27px;"></a></div>
<div id="wb_Image4" style="position:absolute;left:796px;top:2px;width:32px;height:32px;z-index:4;">
<a href="rtsp://173.208.235.232:1935/shoutcast/<?php echo "$porta";?>.stream" target="_blank"><img src="imagem/img-icone-player-android.png" id="Image4" alt="" style="width:32px;height:32px;"></a></div>

<div id="Html1" style="position:absolute;left:311px;top:13px;width:320px;height:21px;z-index:5">
</b><div class="refresh"><span style="color:#F0FFFF;font-family:Tahoma;font-size:8px;">Carregando...</span></div></div>
<div id="wb_Text1" style="position:absolute;left:308px;top:0px;width:150px;height:16px;z-index:0;text-align:left;">

<span style="color:#FF0000;font-family:Tahoma;font-size:13px;">TOCANDO AGORA</span></div>
</div>


<?php } else { ?>

<?php } ?>

