// Leuchtkasten für die Screenshot-Galerie (c_screenshots.php).
// Öffnet die Bilder aller a.galerie-bild-Links im <dialog id="leuchtkasten">, mit Blättern per Knopf, Tastatur und Wischen.
// Browser ohne <dialog>-Unterstützung öffnen die Links wie gewohnt als Bild.
(function () {
    'use strict';

    var kasten = document.getElementById('leuchtkasten');
    if (!kasten || typeof kasten.showModal !== 'function') {
        return;
    }

    var links = Array.prototype.slice.call(document.querySelectorAll('a.galerie-bild'));
    if (!links.length) {
        return;
    }

    var bild = kasten.querySelector('img');
    var text = kasten.querySelector('figcaption');
    var aktuell = 0;

    function zeige(index) {
        aktuell = (index + links.length) % links.length;
        var link = links[aktuell];
        var titel = link.getAttribute('data-titel') || '';
        bild.src = link.href;
        bild.alt = titel;
        text.textContent = titel;
        // Nachbarn vorladen, damit das Blättern nicht ruckelt
        new Image().src = links[(aktuell + 1) % links.length].href;
        new Image().src = links[(aktuell - 1 + links.length) % links.length].href;
    }

    links.forEach(function (link, index) {
        link.addEventListener('click', function (ereignis) {
            ereignis.preventDefault();
            zeige(index);
            kasten.showModal();
        });
    });

    kasten.addEventListener('click', function (ereignis) {
        var knopf = ereignis.target.closest('[data-lk]');
        if (knopf) {
            var aktion = knopf.getAttribute('data-lk');
            if (aktion === 'weiter') {
                zeige(aktuell + 1);
            } else if (aktion === 'zurueck') {
                zeige(aktuell - 1);
            } else {
                kasten.close();
            }
        } else if (ereignis.target === kasten) {
            // Klick auf den abgedunkelten Hintergrund
            kasten.close();
        }
    });

    kasten.addEventListener('keydown', function (ereignis) {
        if (ereignis.key === 'ArrowRight') {
            zeige(aktuell + 1);
        } else if (ereignis.key === 'ArrowLeft') {
            zeige(aktuell - 1);
        }
    });

    // Wischen am Handy
    var startX = null;
    kasten.addEventListener('touchstart', function (ereignis) {
        startX = ereignis.changedTouches[0].clientX;
    }, { passive: true });
    kasten.addEventListener('touchend', function (ereignis) {
        if (startX === null) {
            return;
        }
        var abstand = ereignis.changedTouches[0].clientX - startX;
        startX = null;
        if (abstand < -40) {
            zeige(aktuell + 1);
        } else if (abstand > 40) {
            zeige(aktuell - 1);
        }
    }, { passive: true });

    // Bild nach dem Schließen leeren, damit beim nächsten Öffnen nicht kurz das alte Bild erscheint
    kasten.addEventListener('close', function () {
        bild.removeAttribute('src');
    });
})();
