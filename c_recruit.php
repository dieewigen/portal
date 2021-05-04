<?php
$homepage_page=13;

$homepage_title='Bewerbung | Portal | Die Ewigen | www.die-ewigen.com';

$homepage_meta='
<META Name="keywords" Content="Die Ewigen, www.die-ewigen.com, MMORPG, MMORS, Online, Game, Universum, Erhabener, Handel, Krieg, Strategie, Diplomatie, browsergame, browsergames, onlinespiel, onlinespiele, online spiel, online spiele, onlinegame, onlinegames, krieg, kriege, epische schlachten, handel, kostenlos, kostenfrei, Bewerbung, Staff, bewerben, ChanOP, Moderator">
<meta name="description" content="Du hast Interesse an einem Platz im Team von Die Ewigen? Du willst nicht nur spielen, sondern auch den Leuten zur Hand gehen und ihnen Die Ewigen n&auml;her bringen? Bewirb dich und mach Karriere im Staff bei Die Ewigen.">
';

$homepage_content='
<p>Seid gegr&uuml;sst,
</p>
<p>Bewerbungen werden als Moderator und ChanOp angenommen, Supporter ist nicht m&ouml;glich da wir uns diese Personen selbst herausschauen und ansprechen. Doch ist es m&ouml;glich sich von unten her hochzuarbeiten.
</p>
<p>Das Formular auszuf&uuml;llen sollte keine grossen Umst&auml;nde machen. Name, Nick, E-Mail Adresse und DE-Erfahrung sind soweit selbsterkl&auml;rend.
</p>
<p>Mit "Zu opfernde Zeit" wird die Zeit gemeint, die du bereit bist dein Engagement zu zeigen.
</p>
<p>Nat&uuml;rlich interessiert uns auch, wann deine Aktivit&auml;t am gr&ouml;ssten ist bzw. wann du prim&auml;r deine Aufgaben verrichten k&ouml;nntest.
</p>
<p>IRC-Kenntnisse w&auml;ren sicherlich nicht von Nachteil, umso schneller w&auml;re die Integration m&ouml;glich.
</p>
<p>Und nat&uuml;rlich w&uuml;rde uns Interessieren wer sich bei uns bewirbt, damit wir uns ein Bild &uuml;ber die Person machen k&ouml;nnen.
</p>
<p>Vielen Dank f&uuml;r die M&uuml;he und dein Engagement.
</p>
<p>Dein DET
</p>
<br><br><br>
<b>Formular zur Bewerbung bei Die Ewigen</b>';

// Empf&auml;nger und maximale Dateigr&ouml;sse bestimmen
$mailto = "issomad@die-ewigen.com";

if (isset($_POST["form_submitted"])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = "Bewerbung im DE-Staff";
	$text = "Mein Name ist: ";
	$text .= $_POST['name'];
	$text .= "\nMein Nick ist: ";
	$text .= $_POST['nick'];
	$text .= "\nIch bin: ";
	$text .= $_POST['alter'];
	$text .= "\nMeine E-Mail-Adresse ist: ";
	$text .= $_POST['email'];
	$text .= "\nIch bewerbe mich als: ";
	$text .= $_POST['job'];
	$text .= "\nAm Tage hab ich etwa: ";
	$text .= $_POST['zeit'];
	$text .= "\nIch bin derzeit: ";
	$text .= $_POST['beruf'];
	$text .= "\nAktiv bin ich meist: ";
	$text .= $_POST['aktiv'];
	$text .= "\nMeine DE-Erfahrung kann ich etwa so beschreiben: ";
	$text .= $_POST['erfahrung'];  
	$text .= "\nIm IRC hab ich Kenntnisse: ";
	$text .= $_POST['irc'];
	$text .= "\n\n";
	$text .= "\nWas ich noch zu meiner Bewerbung sagen wollte: ";
	$text .= $_POST['text']; 

	unset($errors);
	if ($email != "" and !preg_match("/^[^@]+@.+\.\D{2,5}$/", $email)) $errors[] = "die E-Mail-Adresse ist nicht korrekt";
	if ($text == "") $errors[] = "es wurde kein Text eingegeben";

	if (empty($errors)){
		$text = stripslashes($text);
		$subject = stripslashes($subject);
		if ($name != "") $mail_name=$name; 
			else $mail_name="unbekannt";
		if ($subject != "") $mail_subject = $subject; 
			else $mail_subject = "Bewerbung im DE-Staff";
		if ($email != "") $mail_email = $email; 
			else $mail_email = "issomad@die-ewigen.com";
		$ip = $_SERVER["REMOTE_ADDR"];

		  $mail_header = "From: ".$mail_name." <".$mail_email.">\n";
		  $mail_header .= "X-Sender-IP: $ip\n";
		  $mail_header .= "Content-Type: text/plain";
		  if (@mail($mailto, $mail_subject, $text,$mail_header)) $sent = true; 
			else $errors[] = "keine Verbindung zum Mailserver - bitte nochmal versuchen";
	 }
 }

if (empty($sent))
{
  if(isset($errors))
  {
    $homepage_content.='<p class="caution">Fehler:</p><ul>';
	foreach($errors as $f) { $homepage_content.='<li>'.$f.'</li>';} 
	$homepage_content.='</ul><br>';  
  }
  $homepage_content.='<form method="post" action="c_recruit.php" enctype="multipart/form-data"><div>
    
  <p><b>Name:</b><br>
	<input type="text" name="name" value="" size="35"></p>
  
  <p><b>Nick:</b><br>
	<input type="text" name="nick" value="" size="35"></p>
  
  <p><b>Dein Alter:</b><br>
	<input type="text" name="alter" value="" size="35"></p>
  
  <p><b>E-Mail:</b><br>
	<input type="text" name="email" value="" size="35"></p>
		
  <p><b>Als...:</b><br>
	<select name="job">
      <option checked> ChanOp im IRC</option>
      <option> Moderator im Forum</option>
    </select>		
		
  <p><b>Zu opfernde Zeit:</b><br>
	<select name="zeit">
      <option checked> weniger als 3 Stunden t&auml;glich</option>
      <option> mehr als 3 Stunden t&auml;glich</option>
    </select>		
    
  <p><b>Beruf:</b><br>
	<select name="beruf">
      <option checked> Berufst&auml;tig</option>
      <option> Sch&uuml;ler / Student</option>
      <option> Arbeitssuchend</option>
    </select>		    

  <p><b>Aktivit&auml;t:</b><br>
	<select name="aktiv">
      <option checked> morgens</option>
      <option> mittags</option>
      <option> abends</option>
      <option> ganzt&auml;gig</option>
    </select>		
    
  <p><b>DE-Erfahrung:</b><br>
	<input type="text" name="erfahrung" value="" size="35"></p>    
		
  <p><b>IRC-Kenntnisse:</b><br>
	<select name="irc">
      <option checked> Grundkenntnisse</option>
      <option> normale Kenntnisse</option>
      <option> fortgeschrittene Kenntnisse</option>
   </select>				
    
  <p><b>Kurze Vorstellung:</b><br>
	<textarea name="text" cols="55" rows="12"></textarea></p><br>

	<input type="submit" name="form_submitted" value="OK - Absenden" /> 
  </div></form>';
  

}
else
{
  if (empty($email)) 
  { 
    $homepage_content.='<p><b>Danke!</b><br>
	Nachricht erfolgreich versendet. Angabe der Mail-Adresse fehlt jedoch. Eine Antwort ist leider nicht m&ouml;glich.</p>';
  }
  else 
  { 
    $homepage_content.='<p><b>Danke!</b><br>
	Nachricht erfolgreich versendet.</p>';
  }
}

include "page.inc.php";
?>
