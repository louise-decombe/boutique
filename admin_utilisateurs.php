<?php $page_selected = 'admin_utilisateurs.php'; ?>
<?php
include("includes/header.php");
require("admin_nav.php")
?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
          <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>

</header>
<main>
<div class="admin">

<div class="button">
  <a href="admin_utilisateurs.php?utilisateurs">Voir les utilisateurs</a><br/>
  <a href="admin_utilisateurs.php?ajouter">ajouter un utilisateur</a><br/>
</div>

<?php

if (isset($_GET['utilisateurs'])) {
    ?>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <?php
    if (!empty($_SESSION['statusMsg'])) {
        echo '<p>'.$_SESSION['statusMsg'].'</p>';
        unset($_SESSION['statusMsg']);
    } ?>
    <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Utilisateurs <a href="admin_utilisateurs" class="glyphicon glyphicon-plus"></a></div>
            <table class="table">
                <tr>
                    <th width="1%">#</th>
                    <th width="10%">Name</th>
                    <th width="10%">Email</th>
                    <th width="10%">Phone</th>
                    <th width="10%">Created</th>
                    <th width="10%"></th>
                </tr>
                <?php

                $users = $db->getRows('utilisateurs', array('order_by'=>'id_utilisateur DESC'));
    if (!empty($users)) {
        $count = 0;
        foreach ($users as $user) {
            $count++; ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $user['nom']; ?></td>
                    <td><?php echo $user['prenom']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['is_admin']; ?></td>

                    <td>
                        <a href="admin_utilisateurs.php?id=<?php echo $user['id_utilisateur']; ?>" class="glyphicon glyphicon-edit"></a>
                        <a href="action_utilisateurs.php?action_type=delete&id_utilisateur=<?php echo $user['id_utilisateur']; ?> " onclick="return confirm('Are you sure?');">X</a>
                    </td>
                </tr>
                <?php
        }
    } else { ?>
                <tr><td colspan="4">Aucun utilisateur trouvé......</td>
                <?php } ?>
            </table>
        </div>
    </div>

<?php
} ?>


<?php


if (isset($_GET['ajouter'])) {
    ?>
    <div class="row">
        <div class="panel panel-default user-add-edit">
            <div class="panel-heading">Ajouter un utilisateur <a href="index.php" class="glyphicon glyphicon-arrow-left"></a></div>
            <div class="panel-body">
                <form method="post" action="action_utilisateurs.php" class="form" id="userForm">
                    <div class="form-group">
                        <label>nom</label>
                        <input type="text" class="form-control" name="nom"/>
                    </div>
                    <div class="form-group">
                        <label>prenom</label>
                        <input type="text" class="form-control" name="prenom"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email"/>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone"/>
                    </div>
                    <input type="hidden" name="action_type" value="add"/>
                    <input type="submit" class="form-control btn-default" name="submit" value="Ajouter l'utilisateur"/>
                </form>
            </div>
        </div>
    </div>

<?php
} ?>

<?php if (isset($_GET['id'])) {
        $userData = $db->getRows('utilisateurs', array('where'=>array('id_utilisateur'=>$_GET['id']),'return_type'=>'single'));
        if (!empty($userData)) {
            ?>
<div class="row">
    <div class="panel panel-default user-add-edit">
        <div class="panel-heading">Modifier <a href="admin_utilisateurs.php" class="glyphicon glyphicon-arrow-left"></a></div>
        <div class="panel-body">
            <form method="post" action="action_utilisateurs.php" class="form" id="userForm">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="nom" value="<?php echo $userData['nom']; ?>"/>
                </div>
                <div class="form-group">
                    <label>prenom</label>
                    <input type="text" class="form-control" name="prenom" value="<?php echo $userData['prenom']; ?>"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $userData['email']; ?>"/>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $userData['phone']; ?>"/>
                </div>
                <div class="form-group">
                    <label>gender</label>
                    <input type="text" class="form-control" name="gender" value="<?php echo $userData['gender']; ?>"/>
                </div>
                <div class="form-group">
                    <label>admin</label>
                    <input type="int" class="form-control" name="is_admin" value="<?php echo $userData['is_admin']; ?>"/>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="password" value="<?php echo $userData['password']; ?>"/>
                </div>
                <input type="hidden" name="id_utilisateur" value="<?php echo $userData['id_utilisateur']; ?>"/>
                <input type="hidden" name="action_type" value="edit"/>
                <input type="submit" class="form-control btn-default" name="submit" value="Update User"/>

            </form>
        </div>
    </div>
</div>
<?php
        }
    } ?>












</main>
</body>
</html>
