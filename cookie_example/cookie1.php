<?php
echo $_COOKIE["user"];
setcookie("user","",time()-3600);
?>