<?php
include_once 'site.inc.php';

$homepage_layout = 'breit';
$homepage_title  = 'Banner | Die Ewigen';
$homepage_meta   = '<meta name="description" content="Banner und Werbegrafiken von Die Ewigen zum Verlinken auf das Browsergame.">';

// Alle Banner aus images/banner, nach Format gruppiert. Größe und Animation stehen im Dateinamen (banner468x60_ani_1.gif).
$formate = array();
foreach (glob('images/banner/*') as $datei) {
    if (!preg_match('/^banner(\d+)x(\d+)(_ani)?.*\.(jpg|png|gif)$/i', basename($datei), $treffer)) {
        continue;
    }
    $animiert = !empty($treffer[3]);
    // Sortierung: breite Formate zuerst, Einzelbilder vor Animationen
    $schluessel = sprintf('%05d-%d', 99999 - (int)$treffer[1], $animiert ? 1 : 0);
    if (!isset($formate[$schluessel])) {
        $formate[$schluessel] = array(
            'name'    => $treffer[1] . ' &times; ' . $treffer[2] . ($animiert ? ', animiert' : ''),
            'breite'  => (int)$treffer[1],
            'hoehe'   => (int)$treffer[2],
            'dateien' => array(),
        );
    }
    $formate[$schluessel]['dateien'][] = $datei;
}
ksort($formate);

$homepage_content = '
<h1>Banner</h1>
<p class="einleitung">Du willst auf Die Ewigen verlinken? Hier findest du Banner in den g&auml;ngigen Formaten. Grafik speichern oder direkt mit der angegebenen Adresse einbinden und auf <a href="https://www.die-ewigen.com/">www.die-ewigen.com</a> verlinken.</p>';

foreach ($formate as $format) {
    natsort($format['dateien']);
    $homepage_content .= '<h2>' . $format['name'] . '</h2><div class="banner-liste">';
    foreach ($format['dateien'] as $datei) {
        $adresse = 'https://www.die-ewigen.com/' . $datei;
        $homepage_content .= '<figure class="banner">'
            . '<img src="' . h($datei) . '" width="' . $format['breite'] . '" height="' . $format['hoehe'] . '" alt="Die Ewigen Banner ' . $format['breite'] . 'x' . $format['hoehe'] . '" loading="lazy">'
            . '<figcaption><code>' . h($adresse) . '</code></figcaption>'
            . '</figure>';
    }
    $homepage_content .= '</div>';
}

include 'page.inc.php';
