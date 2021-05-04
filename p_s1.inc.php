<div id="left">
	<div id="mainmenu">
		<ul>
		<li><div id="mainmenu1"><a href="index.php" accesskey="1" title="Startseite"><b>Startseite</b></a></div></li>
		<li><div id="mainmenu2"><a href="http://login.bgam.es/index.php?command=register&a=<?php echo $_SESSION['a'];?>" accesskey="2" title="Registrieren" target="_blank"><b>Registrieren</b></a></div></li>
		<li><div id="mainmenu3"><a href="http://login.bgam.es" accesskey="3" title="Login" target="_blank"><b>Login</b></a></div></li>
		<li><div id="mainmenu4"><a href="http://forum.bgam.es" accesskey="4" target="_blank"><b>Forum</b></a></div></li>
		<li><div id="mainmenu5"><a href="c_help.php" accesskey="5"><b>Informationen</b></a></div></li>
		<li><div id="mainmenu6"><a href="c_screenshots.php" accesskey="6"><b>Screenshots</b></a></div></li>
		<li><div id="mainmenu7"><a href="c_downloads.php" accesskey="7"><b>Banner</b></a></div></li>
		<div id="mainmenu8"><a href="http://bgam.es/impressum.php" accesskey="8" target="_blank"><b>Impressum</b></a></div></li>
		<?php
		//if($_SESSION["cooperation"]==0)echo '<li><div id="mainmenu8"><a href="c_cooperation.php" accesskey="8" title="Partnerseiten"><b>Partnerseiten</b></a></div></li>';
		?>
		<li><div id="mainmenu9">
			<a href="http://bgam.es/agb.php" accesskey="9" target="_blank"><b>Nutzungsbedingungen</b></a>
			<br>
			<a href="http://bgam.es/datenschutz.php" accesskey="10" target="_blank"><b>Datenschutzerkl&auml;rung</b></a>
		</div></li>
		</ul>

		<br>
		<?php
		//<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FDie-Ewigen%2F163135960411292&amp;send=false&amp;layout=button_count&amp;width=250&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:21px;" allowTransparency="true"></iframe>
		?>
		<a href="http://www.facebook.com/pages/Die-Ewigen/163135960411292" target="_blank">DE auf Facebook</a>
		<br>
		<a href="https://discord.gg/qBpCPx4" target="_blank"><img src="/images/discord.svg"></a>
	</div>
</div>