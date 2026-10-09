<?php
include_once 'site.inc.php';

$homepage_title = 'Impressum | Die Ewigen';
$homepage_meta  = '<meta name="description" content="Impressum von Die Ewigen: Anbieter, Kontakt und Gerichtsstand.">';

// Die E-Mail-Adresse steht rückwärts in den data-Attributen und wird erst im Browser zusammengesetzt (Spamschutz).
$homepage_scripts = '
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".email-protection span[data-user]").forEach(function (element) {
        var user = element.getAttribute("data-user").split("").reverse().join("");
        var domain = element.getAttribute("data-domain").split("").reverse().join("");
        var tld = element.getAttribute("data-tld").split("").reverse().join("");
        var email = user + "@" + domain + "." + tld;
        var link = document.createElement("a");
        link.href = "mailto:" + email;
        link.textContent = email;
        element.parentNode.replaceChild(link, element);
    });
});
</script>';

$homepage_content = '
<h1>Impressum</h1>

<p class="adresse">
    <strong>Tino Tauchmann</strong><br>
    Eckstrasse 32<br>
    66440 Blieskastel<br>
    Deutschland
</p>

<p>
    E-Mail: <span class="email-protection"><span data-user="damossi" data-domain="negiwe-eid" data-tld="moc"></span></span><br>
    Telefon: 03212 - 1046989 (kein Support)<br>
    Gerichtsstand: Amtsgericht Homburg
</p>

<p>Das Impressum gilt auch f&uuml;r die <a href="' . h($links['facebook']) . '" target="_blank" rel="noopener">Facebook-Seite</a>.</p>

<p><a href="c_agb.php">Zu den Nutzungsbedingungen und Spielregeln</a></p>';

include 'page.inc.php';
