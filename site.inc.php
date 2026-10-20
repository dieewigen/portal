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

// Kampagnenkennung (?von=discord) für die Besucherzählung merken, sie wird an die Registrierung weitergereicht
if (isset($_REQUEST['von'])) {
    $_SESSION['von'] = preg_match('/^[a-z0-9_-]{1,30}$/', (string)$_REQUEST['von']) ? (string)$_REQUEST['von'] : '';
}

// HTML-Ausgabe absichern
function h($text)
{
    return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8');
}

// Zählpixel für die Besucherzählung: meldet Seite, Host der verweisenden Seite und Kampagnenkennung an
// besuch.php der Accountverwaltung, ohne Cookies und ohne gespeicherte IP. Die Auswertung steht dort im
// Admintool unter „Besucher“. Ausgegeben wird es in footer.inc.php.
function zaehlpixel()
{
    global $links;
    $seite = basename($_SERVER['SCRIPT_NAME'], '.php');
    $seite = $seite === 'index' ? 'start' : ($seite === 'si' ? 'bild' : preg_replace('/^c_/', '', $seite));
    $quelle = strtolower((string)parse_url($_SERVER['HTTP_REFERER'] ?? '', PHP_URL_HOST));
    if (substr($quelle, -14) === 'die-ewigen.com') {
        $quelle = '';
    }
    $url = $links['zaehlen'] . '?s=' . rawurlencode($seite) . '&r=' . rawurlencode($quelle) . '&v=' . rawurlencode($_SESSION['von'] ?? '');
    return '<img src="' . h($url) . '" alt="" width="1" height="1" style="position:absolute;opacity:0">';
}

// Zentrale Links. Werber-ID und Kampagnenkennung werden an die Registrierung der Accountverwaltung
// weitergereicht, dort landen sie als werber_id und von in der Session.
$links = array(
    'login'        => 'https://login.die-ewigen.com',
    'registrieren' => 'https://login.die-ewigen.com/index.php?command=register'
                      . (!empty($_SESSION['a']) ? '&a=' . intval($_SESSION['a']) : '')
                      . (!empty($_SESSION['von']) ? '&von=' . $_SESSION['von'] : ''),
    'zaehlen'      => 'https://login.die-ewigen.com/besuch.php',
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
