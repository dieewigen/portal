<?php
include_once 'site.inc.php';
include 'c_screenshotdefs.inc.php';

$homepage_layout = 'start';
$homepage_title  = 'Die Ewigen - Das Browsergame';
$homepage_meta   = '
<meta name="description" content="Die Ewigen ist ein browserbasiertes Strategiespiel im Weltraum. Wähle eine von vier Rassen, baue Flotten, schließe Allianzen und kämpfe um den Titel des Erhabenen. Kostenlos, am Rechner und am Handy.">
<meta name="keywords" content="Die Ewigen, Browsergame, MMORPG, Strategiespiel, Online Game, kostenlos">
<meta name="robots" content="index, follow">
<meta property="og:title" content="Die Ewigen - Das Browsergame">
<meta property="og:description" content="Entscheide dich für eine Rasse, schließe Bündnisse und stürze das Universum in eine Zeit des Krieges oder sorge für Frieden.">
<meta property="og:image" content="https://www.die-ewigen.com/images/screenshots/g026.jpg">
<meta property="og:url" content="https://www.die-ewigen.com/">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<link rel="canonical" href="https://www.die-ewigen.com/">
<meta name="verify-v1" content="McZJAqvLbJgBtx1R51S1SN+zwWz6GxJclu/jXmQbVQg=">';

// Das erwartet dich: Symbol, Titel, Text. Die Symbole sind einfarbige Schriftzeichen in der Akzentfarbe, wie im Spielmenü.
$merkmale = array(
    array('&#x232C;',         '4 spielbare Rassen',       'Mit unterschiedlichen Stärken, vom Händler bis zum Kämpfer.'),
    array('&#x2699;&#xFE0E;', 'KI-gesteuerte Rasse',      'Zusätzliche Herausforderungen durch intelligente NPCs.'),
    array('&#x2604;&#xFE0E;', 'Vielfältige Raumschiffe',  'Verschiedene Schiffstypen und Abwehrsysteme für jede Rasse.'),
    array('&#x2692;&#xFE0E;', 'Umfangreiche Entwicklung', 'Viele Gebäude und Forschungen erwarten dich.'),
    array('&#x2691;&#xFE0E;', 'Allianzsystem',            'Schließe strategische Bündnisse und erobere gemeinsam Sektoren.'),
    array('&#x2696;&#xFE0E;', 'Handelssystem',            'Betätige dich als Händler oder Kopfgeldjäger.'),
    array('&#x2727;',         'Spannende Missionen',      'Entdecke die Vergangenheit der Galaxie.'),
    array('&#x25A3;',         'Standard oder Classic',    'Vollbild-Karte mit Konsolenleiste oder die klassische Dreispalten-Ansicht, dazu eine Version fürs Handy.'),
);

$merkmale_html = '';
foreach ($merkmale as $merkmal) {
    $merkmale_html .= '<div class="merkmal"><span class="zeichen" aria-hidden="true">' . $merkmal[0] . '</span><h3>' . $merkmal[1] . '</h3><p>' . $merkmal[2] . '</p></div>';
}

// Bilder für "Einblicke ins Spiel" stehen in c_screenshotdefs.inc.php ($startseite_bilder)
$einblicke_html = '';
foreach ($startseite_bilder as $bild) {
    $einblicke_html .= '<a class="einblick" href="c_screenshots.php"><img src="' . $url . $bild[0] . '" alt="' . $bild[1] . '" loading="lazy"><span>' . $bild[1] . '</span></a>';
}

$homepage_content = '
<section class="held">
    <p class="held-kicker">Das Browsergame seit 2001</p>
    <h1><span class="zeichen" aria-hidden="true">&infin;</span> Die Ewigen</h1>
    <p class="einleitung">Das browserbasierte Strategiespiel im Weltraum. Wähle deine Rasse, baue Flotten, schließe Allianzen und kämpfe um den Titel des Erhabenen.</p>
    <div class="knopfreihe">
        <a class="knopf knopf-primaer knopf-gross" href="' . h($links['registrieren']) . '" target="_blank" rel="noopener">Jetzt kostenlos registrieren</a>
        <a class="knopf knopf-gross" href="' . h($links['login']) . '" target="_blank" rel="noopener">Zum Login</a>
    </div>
    <ul class="fakten">
        <li>Kostenlos im Browser</li>
        <li>4 Rassen und eine KI-Rasse</li>
        <li>Mehrere Server mit eigenen Tickzeiten</li>
        <li>Desktop und Handy</li>
    </ul>
</section>

<section class="abschnitt">
    <h2>Das erwartet dich</h2>
    <div class="merkmale">' . $merkmale_html . '</div>
</section>

<section class="abschnitt">
    <h2>Einblicke ins Spiel</h2>
    <div class="einblicke">' . $einblicke_html . '</div>
    <p class="abschnitt-fuss"><a href="c_screenshots.php">Alle Screenshots ansehen</a></p>
</section>

<section class="aufruf">
    <h2>Der Kampf um den Titel des Erhabenen hat begonnen!</h2>
    <p>Entscheide dich für eine Rasse mit einzigartigen Attributen und Schiffen. Schließe Bündnisse und stürze das Universum in eine Zeit des Krieges oder sorge für eine Ära des Friedens. Treibe Handel und Diplomatie, es liegt alles in deiner Hand.</p>
    <p>Die Ewigen wird seit 2001 gespielt und ständig weiterentwickelt. Fragen beantwortet die <a href="' . h($links['hilfe']) . '" target="_blank" rel="noopener">Hilfe</a>, die Community trifft sich auf <a href="' . h($links['discord']) . '" target="_blank" rel="noopener">Discord</a>.</p>
    <div class="knopfreihe">
        <a class="knopf knopf-primaer knopf-gross" href="' . h($links['registrieren']) . '" target="_blank" rel="noopener">Jetzt kostenlos registrieren</a>
        <a class="knopf knopf-gross" href="' . h($links['discord']) . '" target="_blank" rel="noopener">Zur Community</a>
    </div>
</section>';

include 'page.inc.php';
