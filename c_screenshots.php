<?php
include 'c_screenshotdefs.inc.php';

$homepage_page=7;

$homepage_title='Screenshots | Portal | Die Ewigen | www.die-ewigen.com';

$homepage_meta='
<META Name="keywords" Content="Die Ewigen, www.die-ewigen.com, MMORPG, MMORS, Online, Game, Universum, Erhabener, Handel, Krieg, Strategie, Diplomatie, browsergame, browsergames, onlinespiel, onlinespiele, online spiel, online spiele, onlinegame, onlinegames, krieg, kriege, epische schlachten, handel, kostenlos, kostenfrei, Screenshots, Screenshot, Bilder, Bild">
<meta name="description" content="Bevor du dich anmeldest willst du erstmal Screenshots von Die Ewigen betrachten? Schau sie dir an und entscheide dich für Die Ewigen!">
<link href="fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>';

$homepage_content='
<h1>Ingame Screenshots</h1>
	<br>
<p>Zum vergr&ouml;ssern der Bilder bitte auf den gew&uuml;nschten Screenshot klicken.</p>
<div align="left">
<table border="0" cellspacing="0" cellpadding="0">';

//Screenshots

$width=160;
$height=100;

for ($i=0;$i<=count($screenshot);$i=$i+3){
	if($screenshot[$i][0]!='')$s[0]='<a class="fancybox" rel="gal1" href="images/screenshots/'.$screenshot[$i][0].'" title="'.$screenshot[$i][1].'"><img alt="'.$screenshot[$i][1].'" title="'.$screenshot[$i][1].'" src="'.$url.str_replace('.', '_s.',$screenshot[$i][0]).'" border="0" align="top"></a>';
	else $s[0]='&nbsp;';
	if($screenshot[$i+1][0]!='')$s[1]='<a class="fancybox" rel="gal1" href="images/screenshots/'.$screenshot[$i+1][0].'" title="'.$screenshot[$i+1][1].'"><img alt="'.$screenshot[$i+1][1].'" title="'.$screenshot[$i+1][1].'" src="'.$url.str_replace('.', '_s.',$screenshot[$i+1][0]).'" border="0" align="top"></a>';
	else $s[1]='&nbsp;';
	if($screenshot[$i+2][0]!='')$s[2]='<a class="fancybox" rel="gal1" href="images/screenshots/'.$screenshot[$i+2][0].'" title="'.$screenshot[$i+2][1].'"><img alt="'.$screenshot[$i+2][1].'" title="'.$screenshot[$i+2][1].'" src="'.$url.str_replace('.', '_s.',$screenshot[$i+2][0]).'" border="0" align="top"></a>';
	else $s[2]='&nbsp;';

	$homepage_content.= '<tr>
			<td width="'.$width.' height="'.$height.'" valign="top">'.$s[0].'</td>
			<td width="'.$width.' height="'.$height.'" valign="top">'.$s[1].'</td>
			<td width="'.$width.' height="'.$height.'" valign="top">'.$s[2].'</td>
		  </tr>';
	if ($i+3<count($screenshot))$homepage_content.= '<tr><td colspan="3">&nbsp;</td></tr>';
}

$homepage_content.='
</table>
<h1>Galerie</h1>

<table border="0" cellspacing="0" cellpadding="0">';

//Sonstige Bilder

$width=160;
$height=100;

for ($i=0;$i<=count($galerie);$i=$i+3)
{
  if($galerie[$i][0]!='')$s[0]='<a class="fancybox" rel="gal1" href="images/screenshots/'.$galerie[$i][0].'" title="'.$galerie[$i][1].'"><img alt="'.$galerie[$i][1].'" title="'.$galerie[$i][1].'" src="'.$url.str_replace('.', '_s.',$galerie[$i][0]).'" border="0" align="top">';
  else $s[0]='&nbsp;';
  if($galerie[$i+1][0]!='')$s[1]='<a class="fancybox" rel="gal1" href="images/screenshots/'.$galerie[$i+1][0].'" title="'.$galerie[$i+1][1].'"><img alt="'.$galerie[$i+1][1].'" title="'.$galerie[$i+1][1].'" src="'.$url.str_replace('.', '_s.',$galerie[$i+1][0]).'" border="0" align="top"></a>';
  else $s[1]='&nbsp;';
  if($galerie[$i+2][0]!='')$s[2]='<a class="fancybox" rel="gal1" href="images/screenshots/'.$galerie[$i+2][0].'" title="'.$galerie[$i+2][1].'"><img alt="'.$galerie[$i+2][1].'" title="'.$galerie[$i+2][1].'" src="'.$url.str_replace('.', '_s.',$galerie[$i+2][0]).'" border="0" align="top"></a>';
  else $s[2]='&nbsp;';

  $homepage_content.= '<tr>
          <td width="'.$width.' height="'.$height.'" valign="top">'.$s[0].'</td>
          <td width="'.$width.' height="'.$height.'" valign="top">'.$s[1].'</td>
          <td width="'.$width.' height="'.$height.'" valign="top">'.$s[2].'</td>
        </tr>';
  if ($i+3<count($galerie))$homepage_content.= '<tr><td colspan="3">&nbsp;</td></tr>';
}

$homepage_content.='</table>';

$homepage_content.='<script type="text/javascript">
		$(document).ready(function() {

			$(".fancybox").fancybox({
				"overlayShow"	: false,
				"titlePosition"  : "inside",
				"transitionIn"	: "elastic",
				"transitionOut"	: "elastic"
			});

		});
	</script>
';

include "page.inc.php";
?>
