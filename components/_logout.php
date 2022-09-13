<?php

session_start();
session_unset();
session_destroy();
header("Location: /phpprojects/components/_login.php",TRUE,301);
exit;

?>