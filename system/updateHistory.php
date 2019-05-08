<?php
    if(!isset($_POST['id'])) {
        header('Location: ../form_list.php');
    }

    require "config.php";
    require "database.php";

    DBDelete('historysentmails', "id = " . (int)$_POST['id']);
    
    $update =  DBRead('historysentmails');
    $idx = 1;

    foreach($update as $value) {
        DBUpDate("historysentmails", ['id' => $idx], "id = " . (int)$value['id']);
        $idx++;
    }

    header('Location: ../form_history.php');
?>