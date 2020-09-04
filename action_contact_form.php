<?php
session_start();
include 'class/db.php';
$db = new DB();
$tblName = 'message_utilisateurs';
if (isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])) {
    if ($_REQUEST['action_type'] == 'add') {
        $userData = array(
            'message_utilisateur'=>$_POST['message_utilisateur'],
            'id_utilisateur'=>$_POST['id_utilisateur'],
        );
        $insert = $db->insert($tblName, $userData);
        $statusMsg = $insert?'Les données ont été insérées.':'Des problèmes sont survenus, reassayez.';
        $_SESSION['statusMsg'] = $statusMsg;
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
        header('Location: ' . $referer);
    } elseif ($_REQUEST['action_type'] == 'delete') {
        if (!empty($_GET['id_message_utilisateur'])) {
            $condition = array('id_message_utilisateur' => $_GET['id_message_utilisateur']);
            $delete = $db->delete($tblName, $condition);
            $statusMsg = $delete?'Les données ont été supprimées.':'Des problèmes sont survenus essayez encore.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:admin_messages.php");
            //var_dump($condition);
        }
    }
}
