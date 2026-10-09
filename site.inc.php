<?php
// Gemeinsamer Einstieg aller Seiten: Session, Werber-ID, zentrale Links und Standardwerte.
// Jede Seite bindet diese Datei als Erstes ein, setzt ihren Inhalt und ruft dann page.inc.php auf.

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Werber-ID (?a=123) und Kooperationskennung merken, wie bisher
if (isset($_REQUEST['a'])) {
    $_SESSION['a'] = intval($_REQUEST['a']);
}
if (isset($_REQUEST['cooperation'])) {
    $_SESSION['cooperation'] = intval($_REQUEST['cooperation']);
}

// HTML-Ausgabe absichern
function h($text)
{
    return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8');
}

// Zentrale Links. Die Werber-ID wird an die Registrierung der Accountverwaltung weitergereicht,
// dort landet sie als werber_id in der Session.
$links = array(
    'login'        => 'https://login.die-ewigen.com',
    'registrieren' => 'https://login.die-ewigen.com/index.php?command=register'
                      . (!empty($_SESSION['a']) ? '&a=' . intval($_SESSION['a']) : ''),
    'hilfe'        => 'https://hilfe.die-ewigen.com',
    'discord'      => 'https://discord.gg/qBpCPx4',
    'facebook'     => 'https://www.facebook.com/pages/Die-Ewigen/163135960411292',
);

// Standardwerte, die Seiten bei Bedarf überschreiben
if (!isset($homepage_title)) {
    $homepage_title = 'Die Ewigen - Das Browsergame';
}
if (!isset($homepage_meta)) {
    $homepage_meta = '';
}
if (!isset($homepage_layout)) {
    // 'seite' = Inhalt in einem Panel, 'breit' = Panel in voller Breite, 'start' = freie Abschnitte
    $homepage_layout = 'seite';
}
if (!isset($homepage_scripts)) {
    // zusätzliche Skripte am Seitenende
    $homepage_scripts = '';
}
