<?php
session_start();
include 'class/db.php';
$db = new DB();
$tblName = 'newsletter';
if (isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])) {
    if ($_REQUEST['action_type'] == 'add') {
        $userData = array(
            'titre_fanzine'=>$_POST['titre_fanzine'],
            'email_utilisateur'=>$_POST['email_utilisateur'],
            'message_vendeur'=>$_POST['message_vendeur'],
            'description_article_vendeur'=>$_POST['description_article_vendeur']
        );
        $insert = $db->insert($tblName, $userData);
        $statusMsg = $insert?'Les données ont été insérées.':'Des problèmes sont survenus, reassayez.';
        $_SESSION['statusMsg'] = $statusMsg;
       //header("Location:admin_newsletter.php");
      //  var_dump($insert);

    }  elseif ($_REQUEST['action_type'] == 'delete') {
        if (!empty($_GET['id_newsletter'])) {
            $condition = array('id_newsletter' => $_GET['id_newsletter']);
            $delete = $db->delete($tblName, $condition);
            $statusMsg = $delete?'Les données ont été supprimées.':'Des problèmes sont survenus essayez encore.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:admin_newsletter.php");
        }
    }
}
