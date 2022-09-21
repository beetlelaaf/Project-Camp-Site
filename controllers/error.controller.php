<?php

session_start();
echo "<h1 style='color: #db0000;'>" . $_SESSION['error'] . "</h1>";
session_unset();
session_destroy();
