<?php
session_start();
include 'class/db.php';
$db = new DB();
$tblName = 'newsletter';
 if ($_REQUEST['action_type'] == 'delete') {
        if (!empty($_GET['id_newsletter'])) {
            $condition = array('id_newsletter' => $_GET['id_newsletter']);
            $delete = $db->delete($tblName, $condition);
            $statusMsg = $delete?'Les données ont été supprimées.':'Des problèmes sont survenus essayez encore.';
            $_SESSION['statusMsg'] = $statusMsg;
            var_dump($delete);
            header("Location:admin_newsletter.php");
        }
    }
