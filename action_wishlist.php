<?php
session_start();
include 'class/db.php';
$db = new DB();
$tblName = 'wishlist';
if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])){
    if($_REQUEST['action_type'] == 'add'){
        $userData = array(
            'id_utilisateur' => $_POST['id_utilisateur'],
            'id_article' => $_POST['id_article']
        );
        $insert = $db->insert($tblName,$userData);
        $statusMsg = $insert?'Article ajouté.':'Un problème est survenu réessayez';
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
        header('Location: ' . $referer);
        $_SESSION['statusMsg'] = $statusMsg;
    }elseif($_REQUEST['action_type'] == 'edit'){
        if(!empty($_POST['submit_wish'])){
            $userData = array(
              'id_utilisateur' => $_POST['id_utilisateur'],
              'id_article' => $_POST['id_article']
            );
            $condition = array('id_wishlist' => $_POST['id_wishlist']);
            $update = $db->update($tblName,$userData,$condition);
            $statusMsg = $update?'Données mises à jour.':'Un problème est survenu, reassayez.';
            $_SESSION['statusMsg'] = $statusMsg;
            $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
            header('Location: ' . $referer);
        }
    }elseif($_REQUEST['action_type'] == 'delete'){
        if(!empty($_GET['id_article'])){
            $condition = array('id_article' => $_GET['id_article']);
            $delete = $db->delete($tblName,$condition);
            $statusMsg = $delete?'Suppression réalisée.':'Un problème est survenu reassayez.';
            $_SESSION['statusMsg'] = $statusMsg;
            $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
            header('Location: ' . $referer);
        }
    }
}
