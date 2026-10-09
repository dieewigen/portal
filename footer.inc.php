</main>
<footer class="fuss">
    <div class="fuss-innen">
        <p>&copy; 2001-<?php echo date('Y'); ?> DIE EWIGEN</p>
        <ul class="fuss-links">
            <li><a href="c_impressum.php">Impressum</a></li>
            <li><a href="c_datenschutz.php">Datenschutz</a></li>
            <li><a href="c_agb.php">Regeln</a></li>
            <li><a href="<?php echo h($links['hilfe']); ?>" target="_blank" rel="noopener">Hilfe</a></li>
            <li><a href="<?php echo h($links['discord']); ?>" target="_blank" rel="noopener">Discord</a></li>
            <li><a href="<?php echo h($links['facebook']); ?>" target="_blank" rel="noopener">Facebook</a></li>
        </ul>
    </div>
</footer>
<?php echo $homepage_scripts; ?>
</body>
</html>
