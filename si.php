<?php
include_once 'site.inc.php';
include 'c_screenshotdefs.inc.php';

// Bildanzeige für Links aus dem Spiel ($sv_link[0] in inc/links.inc.php von de2):
//   si.php?filename=g026.jpg   zeigt ein Bild der Galerie
//   si.php?r=RASSE&t=TECHID    zeigt das Bild zur Technologie einer Rasse (Rasse -1 gilt für alle)
$datei = '';
$titel = '';

if (isset($_REQUEST['filename'])) {
    foreach (array_merge($screenshot, $galerie) as $eintrag) {
        if ($eintrag[0] === (string)$_REQUEST['filename']) {
            $datei = $eintrag[0];
            $titel = $eintrag[1];
            break;
        }
    }
}

if ($datei === '' && isset($_REQUEST['r'], $_REQUEST['t'])) {
    $rasse = intval($_REQUEST['r']);
    $tech  = intval($_REQUEST['t']);
    foreach ($galerie as $eintrag) {
        if (isset($eintrag[3]) && ($eintrag[2] == $rasse || $eintrag[2] == -1) && $eintrag[3] == $tech) {
            $datei = $eintrag[0];
            $titel = $eintrag[1];
            break;
        }
    }
}

$homepage_layout = 'breit';

if ($datei !== '') {
    $homepage_title   = html_entity_decode(strip_tags($titel), ENT_QUOTES, 'UTF-8') . ' | Die Ewigen';
    $homepage_meta    = '<meta name="robots" content="noindex">';
    $homepage_content = '
<figure class="einzelbild">
    <img src="' . h($url . $datei) . '" alt="' . $titel . '">
    <figcaption>' . $titel . '</figcaption>
</figure>
<p class="einzelbild-fuss"><a href="c_screenshots.php">Alle Screenshots ansehen</a></p>';
} else {
    $homepage_title   = 'Bild nicht gefunden | Die Ewigen';
    $homepage_meta    = '<meta name="robots" content="noindex">';
    $homepage_content = '
<h1>Bild nicht gefunden</h1>
<p>Zu dieser Anfrage gibt es kein Bild. <a href="c_screenshots.php">Zur Galerie</a></p>';
}

include 'page.inc.php';
