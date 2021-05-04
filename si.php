<?php
include 'c_screenshotdefs.inc.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<link rel="stylesheet" href="img/style.css" />
<title>Bild</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body bgcolor="#001d2e" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0">
<?php
echo '<div align="center"';
//bild anzeigen nach dateiname
if(isset($_REQUEST["filename"]))
{
  //schauen ob es für die datei eine beschreibung gibt
  $desc='';
  for($i=0; $i<count($screenshot); $i++)
  {
  	if($screenshot[$i][0]==$_REQUEST["filename"])$desc=$screenshot[$i][1];
  }
  for($i=0; $i<count($galerie); $i++)
  {
  	if($galerie[$i][0]==$_REQUEST["filename"])$desc=$galerie[$i][1];
  }
  	
  echo '<br><br><img src="'.htmlspecialchars($url).htmlspecialchars($_REQUEST["filename"]).'" border="0"><br>';
  echo '<font color="#2095ff">'.$desc.'</font>';
}

//bild anzeigen nach rasse und tech-id
if(isset($_REQUEST["r"]) AND isset($_REQUEST["t"]))
{
  //schauen ob es für die datei eine beschreibung gibt
  $desc='';$filename='';
  for($i=0; $i<count($galerie); $i++)
  {
  	if(($galerie[$i][2]==$_REQUEST["r"] OR $galerie[$i][2]=='-1') AND $galerie[$i][3]==$_REQUEST["t"])
  	{
  	  $desc=$galerie[$i][1];
  	  $filename=$galerie[$i][0];
  	  break;
  	}
  }
  if($filename!='')	
  echo '<br><br><img src="'.htmlspecialchars($url).$filename.'" border="0"><br>';
  echo '<font color="#2095ff">'.$desc.'</font>';
}


echo '</div>';
?>

</body>
</html>
