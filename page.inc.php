<?php
// Layout zusammensetzen: Kopf, Inhalt, Fuß. Erwartet $homepage_content von der aufrufenden Seite.
include_once 'site.inc.php';
include 'header.inc.php';

if ($homepage_layout === 'start') {
    echo $homepage_content;
} elseif ($homepage_layout === 'breit') {
    echo '<article class="seite seite-breit">' . $homepage_content . '</article>';
} else {
    echo '<article class="seite">' . $homepage_content . '</article>';
}

include 'footer.inc.php';
