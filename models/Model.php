<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=MyRestaurant",'root','');
    } catch (EXCEPTION $e) {
        echo $e->getMessage();
    }