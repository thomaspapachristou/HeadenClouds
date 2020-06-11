<?php

        // CREATE NEW DB USER || ADMIN ADMIN
    $pdo = new PDO ('mysql:dbname=headenclouds;host=localhost','admin','admin');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);