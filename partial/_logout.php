<?php
echo "you are logging out";
session_start();
session_destroy();
header("Location: /forum/index.php");
?>