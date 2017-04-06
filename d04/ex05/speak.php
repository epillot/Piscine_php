<?php

session_start();
$user = $_SESSION['loggued_on_user'];
if ($user == "")
	return ;
if (!file_exists("../htdocs/private/"))
	mkdir("../htdocs/private", 0777, true);
if (file_exists("../htdocs/private/chat"))
	$chat = unserialize(file_get_contents("../htdocs/private/chat"));
else
	$chat = array();
$chat[] = array('login' => $user, 'time' => time(), 'msg' => $_POST['msg']);
$fd = fopen("../htdocs/private/chat", "c+");
flock($fd, LOCK_SH | LOCK_EX);
file_put_contents("../htdocs/private/chat", serialize($chat));
flock($fd, LOCK_UN);
fclose($fd);

?>
<html>
<body>
    <form action="speak.php" method="post">
        <input type="text" name="msg" />
        <input type="submit" name="submit" value="Poster" />
    </form>
</body>
</html>
