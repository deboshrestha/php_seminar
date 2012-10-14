<?php
setcookie("user","Isaac Newton",time()+3600);
?>
<html>
<body>
<form method="POST" action="cookie1.php">
Enter text: <input type="text" />
<br/><br/><input type="submit" name="sub" />
</form>
</body>
</html>