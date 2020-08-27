<?php
session_start();
include 'class/db.php';
$db = new DB();
$tblName = 'utilisateurs';
if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])){
    if($_REQUEST['action_type'] == 'add'){
        $userData = array(
            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'gender' => $_POST['gender'],
            'password' => $_POST['password'],
            'is_admin' => $_POST['is_admin']
        );
        $insert = $db->insert($tblName,$userData);
        $statusMsg = $insert?'User data has been inserted successfully.':'Some problem occurred, please try again.';
        $_SESSION['statusMsg'] = $statusMsg;
        header("Location:admin_utilisateurs.php");
    }elseif($_REQUEST['action_type'] == 'edit'){
        if(!empty($_POST['id_utilisateur'])){
            $userData = array(
              'prenom' => $_POST['prenom'],
              'nom' => $_POST['nom'],
              'phone' => $_POST['phone'],
              'email' => $_POST['email'],
              'gender' => $_POST['gender'],
              'password' => $_POST['password'],
              'is_admin' => $_POST['is_admin']
            );
            $condition = array('id_utilisateur' => $_POST['id_utilisateur']);
            $update = $db->update($tblName,$userData,$condition);
            $statusMsg = $update?'User data has been updated successfully.':'Some problem occurred, please try again.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:admin_utilisateurs.php");
        }
    }elseif($_REQUEST['action_type'] == 'delete'){
        if(!empty($_GET['id_utilisateur'])){
            $condition = array('id_utilisateur' => $_GET['id_utilisateur']);
            $delete = $db->delete($tblName,$condition);
            $statusMsg = $delete?'User data has been deleted successfully.':'Some problem occurred, please try again.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:admin_utilisateurs.php");
        }
    }
}
