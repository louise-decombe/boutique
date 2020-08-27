<?php
session_start();
include 'class/db.php';
$db = new DB();
$tblName = 'message_vendeur';
if (isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])) {
    if ($_REQUEST['action_type'] == 'add') {
        $userData = array(
            'titre_fanzine'=>$_POST['titre_fanzine'],
            'email_utilisateur'=>$_POST['email_utilisateur'],
            'message_vendeur'=>$_POST['message_vendeur'],
            'description_article_fanzine'=>$_POST['description_article_fanzine']
        );
        $insert = $db->insert($tblName, $userData);
        $statusMsg = $insert?'Les données ont été insérées.':'Des problèmes sont survenus, reassayez.';
        $_SESSION['statusMsg'] = $statusMsg;
        header("Location:index.php");
    }  elseif ($_REQUEST['action_type'] == 'delete') {
        if (!empty($_GET['id_message_vendeur'])) {
            $condition = array('id_message_vendeur' => $_GET['id_message_vendeur']);
            $delete = $db->delete($tblName, $condition);
            $statusMsg = $delete?'Les données ont été supprimées.':'Des problèmes sont survenus essayez encore.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:admin_messages.php");
        }
    }
}
