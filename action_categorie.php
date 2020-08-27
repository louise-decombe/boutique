<?php
session_start();
include 'class/db.php';
$db = new DB();
$tblName = 'categorie';
if (isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])) {
    if ($_REQUEST['action_type'] == 'add') {
        $userData = array(
            'nom_categorie' => $_POST['nom_categorie']

        );
        $insert = $db->insert($tblName, $userData);
        $statusMsg = $insert?'Les données ont été insérées.':'Des problèmes sont survenus, reassayez.';
        $_SESSION['statusMsg'] = $statusMsg;
        header("Location:admin_categories.php");
    } elseif ($_REQUEST['action_type'] == 'edit') {
        if (!empty($_POST['id_categorie'])) {
            $userData = array(
              'nom_categorie' => $_POST['nom_categorie']

            );
            $condition = array('id_categorie' => $_POST['id_categorie']);
            $update = $db->update($tblName, $userData, $condition);
            $statusMsg = $update?'Les données ont été mises à jour.':'un problème est survenu, essayez encore.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:admin_categories.php");
        }
    } elseif ($_REQUEST['action_type'] == 'delete') {
        if (!empty($_GET['id_categorie'])) {
            $condition = array('id_categorie' => $_GET['id_categorie']);
            $delete = $db->delete($tblName, $condition);
            $statusMsg = $delete?'Les données ont été supprimées.':'Des problèmes sont survenus essayez encore.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:admin_categories.php");
        }
    }
}
