<?php
    if(!isset($_POST['id'])) {
        header('Location: ../form_list.php');
    }

    require "config.php";
    require "database.php";

    DBDelete('mails2sent', "id = " . (int)$_POST['id']);
    
    $update =  DBRead('mails2sent');
    $idx = 1;

    foreach($update as $value) {
        DBUpDate("mails2sent", ['id' => $idx], "id = " . (int)$value['id']);
        $idx++;
    }

    header('Location: ../form_list.php');
?>