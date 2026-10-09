<?php
// Seitenkopf mit Marke, Navigation und den Knöpfen zur Accountverwaltung.
// Die Navigation wird zweimal ausgegeben: inline für den Desktop und im Aufklappmenü fürs Handy.
$aktuelle_seite = basename($_SERVER['SCRIPT_NAME']);

$navigation = array(
    array('index.php', 'Startseite'),
    array('c_screenshots.php', 'Screenshots'),
    array('c_downloads.php', 'Banner'),
    array('c_agb.php', 'Regeln'),
    array($links['hilfe'], 'Hilfe'),
);

$nav_liste = '';
foreach ($navigation as $eintrag) {
    $extern = strpos($eintrag[0], 'http') === 0;
    $aktiv = !$extern && $eintrag[0] === $aktuelle_seite;
    $nav_liste .= '<li><a href="' . h($eintrag[0]) . '"'
        . ($aktiv ? ' aria-current="page"' : '')
        . ($extern ? ' target="_blank" rel="noopener"' : '')
        . '>' . h($eintrag[1]) . '</a></li>';
}
$nav_mobil = $nav_liste . '<li><a href="' . h($links['login']) . '" target="_blank" rel="noopener">Login</a></li>';
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo h($homepage_title); ?></title>
<?php echo $homepage_meta; ?>

<meta name="theme-color" content="#05070c">
<link rel="icon" href="favicon.ico">
<link rel="stylesheet" href="default.css?<?php echo filemtime('default.css'); ?>">
</head>
<body>
<a class="sprung" href="#inhalt">Zum Inhalt springen</a>
<header class="kopf">
    <div class="kopf-innen">
        <a class="marke" href="index.php"><span class="marke-zeichen" aria-hidden="true">&infin;</span><span class="marke-spiel">Die Ewigen</span></a>
        <nav class="hauptnav" aria-label="Hauptnavigation"><ul><?php echo $nav_liste; ?></ul></nav>
        <div class="kopf-aktionen">
            <a class="knopf knopf-leise" href="<?php echo h($links['login']); ?>" target="_blank" rel="noopener">Login</a>
            <a class="knopf knopf-primaer" href="<?php echo h($links['registrieren']); ?>" target="_blank" rel="noopener">Registrieren</a>
        </div>
        <details class="nav-mobil">
            <summary>Men&uuml;</summary>
            <nav aria-label="Hauptnavigation"><ul><?php echo $nav_mobil; ?></ul></nav>
        </details>
    </div>
</header>
<main class="rahmen" id="inhalt">
