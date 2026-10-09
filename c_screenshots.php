<?php
include_once 'site.inc.php';
include 'c_screenshotdefs.inc.php';

$homepage_layout  = 'breit';
$homepage_title   = 'Screenshots | Die Ewigen';
$homepage_meta    = '<meta name="description" content="Screenshots aus Die Ewigen: Spielansichten, Raumschiffe, Verteidigungsanlagen, Gebäude und Forschungen der vier Rassen.">';
$homepage_scripts = '<script src="js/galerie.js?' . filemtime('js/galerie.js') . '"></script>';

// Ein Bild der Galerie: Vorschaubild (Dateiname_s) als Link auf das große Bild, galerie.js öffnet es im Leuchtkasten.
// Die Titel in c_screenshotdefs.inc.php enthalten bereits HTML-Entities und werden deshalb nicht erneut maskiert.
function galerie_bild($datei, $titel)
{
    global $url;
    $gross = $url . $datei;
    $klein = $url . str_replace('.', '_s.', $datei);
    return '<a class="galerie-bild" href="' . h($gross) . '" data-titel="' . $titel . '">'
         . '<img src="' . h($klein) . '" alt="' . $titel . '" loading="lazy"></a>';
}

// Galerie nach Rassen, Gebäuden, Forschungen und Entwürfen gruppieren (Reihenfolge wie in den Definitionen)
$gruppen = array();
foreach ($galerie as $eintrag) {
    if (!isset($eintrag[2])) {
        $gruppe = 'Entw&uuml;rfe und Sonstiges';
    } elseif ($eintrag[2] == -1) {
        $gruppe = ($eintrag[3] < 40) ? 'Geb&auml;ude' : 'Forschungen';
    } else {
        $gruppe = $rassen[$eintrag[2]];
    }
    $gruppen[$gruppe][] = galerie_bild($eintrag[0], $eintrag[1]);
}

$homepage_content = '
<h1>Screenshots</h1>
<p class="einleitung">Zum Vergr&ouml;&szlig;ern auf ein Bild klicken.</p>

<h2>Spielansichten</h2>
<div class="galerie">';
foreach ($screenshot as $eintrag) {
    $homepage_content .= galerie_bild($eintrag[0], $eintrag[1]);
}
$homepage_content .= '</div>

<h2>Galerie</h2>';
foreach ($gruppen as $name => $bilder) {
    $homepage_content .= '<h3>' . $name . '</h3><div class="galerie">' . implode('', $bilder) . '</div>';
}

// Leuchtkasten, gefüllt von js/galerie.js. Ohne JavaScript öffnen die Links das große Bild direkt.
$homepage_content .= '
<dialog class="leuchtkasten" id="leuchtkasten" aria-label="Bildansicht">
    <button type="button" class="lk-knopf lk-schliessen" data-lk="schliessen" aria-label="Schlie&szlig;en">&times;</button>
    <button type="button" class="lk-knopf lk-zurueck" data-lk="zurueck" aria-label="Vorheriges Bild">&lsaquo;</button>
    <figure><img src="" alt=""><figcaption></figcaption></figure>
    <button type="button" class="lk-knopf lk-weiter" data-lk="weiter" aria-label="N&auml;chstes Bild">&rsaquo;</button>
</dialog>';

include 'page.inc.php';
