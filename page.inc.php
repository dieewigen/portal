<?php
session_start();
if(isset($_REQUEST["a"]))
{
  $_SESSION['a'] = intval($_REQUEST["a"]);
}

if(isset($_REQUEST["cooperation"]))
{
  $_SESSION['cooperation'] = intval($_REQUEST["cooperation"]);
}

include "header.inc.php";
include "p_s1.inc.php";
include "p_s2.inc.php";
include "footer.inc.php";
?>