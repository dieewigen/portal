<?php
$homepage_page=11;

$homepage_title='Die Ewigen | Das Browsergame | Impressum | www.die-ewigen.com';

$homepage_meta='
<META Name="keywords" Content="Die Ewigen, www.die-ewigen.com, MMORPG, MMORS, Online, Game, Universum, Erhabener, Handel, Krieg, Strategie, Diplomatie, browsergame, browsergames, onlinespiel, onlinespiele, online spiel, online spiele, onlinegame, onlinegames, krieg, kriege, epische schlachten, handel, kostenlos, kostenfrei, Impressum, Abuse">
<meta name="description" content="Du willst wissen wer für welchen Bereich bei Die Ewigen zuständig ist oder möchtest dich bei den Machern von Die Ewigen melden? Hier findest du alle Angaben, die daf�r notwendig sind.">
';

$homepage_content='
<P align=center><STRONG>Impressum</STRONG></P>
<TABLE class="" cellSpacing=0 cellPadding=0>
<TBODY>
<TR><TD><P>&nbsp;<b>Tino Tauchmann</b></P></TD></TR>
<TR><TD><P>&nbsp;Das Impressum gilt auch f&uuml;r die <a href="http://www.facebook.com/die.ewigen" target="_blank">Facebook-Seite</a></P></TD></TR>
<TR><TD><P>&nbsp;<b><a href="c_agb.php">zu den Allgemeinen Gesch&auml;ftsbedingungen (AGB) / Spielregeln</a></b></P></TD></TR>
<TR><TD><P>&nbsp;</P></TD></TR>
<TR><TD><P>&nbsp;Tino Tauchmann</P></TD></TR>
<TR><TD><P>&nbsp;Eckstrasse 32</P></TD></TR>
<TR><TD><P>&nbsp;66440 Blieskastel</P></TD></TR>
<TR><TD><P>&nbsp;Deutschland</P></TD></TR>
<TR><TD><P>&nbsp;E-Mail: <span class="email-protection">
    <span data-user="damossi" data-domain="negiwe-eid" data-tld="moc"></span>
</span></P>
</TD></TR>
<TR><TD><P>&nbsp;Telefon: 03212 - 1046989 (kein Support)</P></TD></TR>
<TR><TD><P>&nbsp;Gerichtsstand: Amtsgericht Homburg</P></TD></TR>
<TR><TD><P>&nbsp;</P></TD></TR>
</TBODY></TABLE>

<style>
.email-protection [data-user]:before {
    content: attr(data-user);
    unicode-bidi: bidi-override;
    direction: rtl;
}
.email-protection [data-user]:after {
    content: "@";
}
.email-protection [data-domain]:before {
    content: attr(data-domain);
    unicode-bidi: bidi-override;
    direction: rtl;
}
.email-protection [data-domain]:after {
    content: ".";
}
.email-protection [data-tld]:before {
    content: attr(data-tld);
    unicode-bidi: bidi-override;
    direction: rtl;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const emailElements = document.querySelectorAll(".email-protection span[data-user]");
    emailElements.forEach(function(element) {
        const user = element.getAttribute("data-user").split("").reverse().join("");
        const domain = element.getAttribute("data-domain").split("").reverse().join("");
        const tld = element.getAttribute("data-tld").split("").reverse().join("");
        const email = user + "@" + domain + "." + tld;
        const link = document.createElement("a");
        link.href = "mailto:" + email;
        link.textContent = email;
        element.parentNode.replaceChild(link, element);
    });
});
</script>';

include "page.inc.php";
?>
