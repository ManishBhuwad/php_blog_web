<?php

    session_start();
    $_SESSION["user_id"] = null;
    $_SESSION = array();

    session_destroy();

    header("Location: ../index.php");
