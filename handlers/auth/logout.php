<?php

session_start();
session_destroy();
header('Location: ../../public_html/views/auth/pages/login.php');