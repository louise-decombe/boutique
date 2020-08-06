<?php

require 'messages.php';

class Users
{
    private $id_user;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $date_registration;
    public $is_admin;
    public $phone;
    public $gender;
    public $newsletter;
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function connect($email, $password)
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = '$email'");
        $q->execute();
        $user = $q->fetch(PDO::FETCH_ASSOC);
        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                $this->id_user = $user['id_utilisateur'];
                $this->firstname = $user['prenom'];
                $this->lastname = $user['nom'];
                $this->gender = $user['gender'];
                $this->phone = $user['phone'];
                $this->email = $user['email'];
                $this->password = $user['password'];
                $this->date_registration = $user['date_registration'];
                $this->is_admin = $user['is_admin'];

                $_SESSION['user'] = [
                    'id_user' =>
                        $this->id_user,
                    'firstname' =>
                        $this->firstname,
                    'lastname' =>
                        $this->lastname,
                    'gender' =>
                        $this->gender,
                    'phone' =>
                        $this->phone,
                    'email' =>
                        $this->email,
                    'password' =>
                        $this->password,
                    'is_admin' =>
                        $this->is_admin,
                    'date_registration' =>
                        $this->date_registration
                ];
                header('location:profil.php');
                return $_SESSION['user'];
            } else {
                $errors[] = "Le mail ou le mot de passe est erroné.";
                $message = new messages($errors);
                echo $message->renderMessage();
            }
        } else {
            $errors[] = "Le mail ou le mot de passe est erroné.";
            $message = new messages($errors);
            echo $message->renderMessage();
        }
    }

    public function register( $firstname, $lastname, $gender, $phone, $email, $password, $password_check)
    {
        $connexion = $this->db->connectDb();
        var_dump($connexion);
         //firstname
         $firstname_required = preg_match("/^(?=.*[A-Za-z]$)[A-Za-z][A-Za-z\-]{2,19}$/", $firstname);
         if (!$firstname_required) {
             $errors[] = "Le prénom doit :<br>- Comporter entre 3 et 19 caractères.<br>- Commencer et finir par une lettre.<br>- Ne contenir aucun caractère spécial (excepté -).";
         }

        //lastname
        $lastname_required = preg_match("/^(?=.*[A-Za-z]$)([A-Za-z]{2,25}[\s]?[A-Za-z]{1,25})$/", $lastname);
        if (!$lastname_required) {
            $errors[] = "Le nom doit:<br>- Comporter entre 3 et 50 caractètres.<br>- Commencer et finir par une lettre.<br>- Ne contenir aucun caractère spécial (excepté un espace).";
        }

        //Phone number
        $phone_required = preg_match("/^[0-9]{10}$/", $phone);
        if (!$phone_required) {
            $errors[] = "Le numéro de téléphone doit contenir exactement 10 chiffres.";
        }
        //email
        $email_required = preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/", $email);
        if (!$email_required) {
            $errors[] = "L'email n'est pas conforme.";
        }
        $q = $connexion->prepare("SELECT email FROM utilisateurs WHERE email = :email");
        $q->bindParam(':email', $email, PDO::PARAM_STR);
        $q->execute();
        $email_check = $q->fetch();
        if (!empty($email_check)) {
            $errors[] = "Cette adresse mail est déjà utilisée.";
        }
        //password
        $password_required = preg_match(
            "/^(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})(?=.*?[0-9]{1,})(?=.*?[\W]{1,}).{8,20}$/",
            $password
        );
        if (!$password_required) {
            $errors[] = "Le mot de passe doit contenir:<br>- Entre 8 et 20 caractères<br>- Au moins 1 caractère spécial<br>- Au moins 1 majuscule et 1 minuscule<br>- Au moins un chiffre.";
        }
        if ($password != $password_check) {
            $errors[] = "Les mots de passe ne correspondent pas.";
        } else {
            $password_modified = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
        }
        //date
        date_default_timezone_set("Europe/Paris");

        if (empty($firstname) or empty($lastname) or empty($email) or empty($password) or empty($password_check) or empty($phone)) {
            $errors[] = "Tous les champs doivent être remplis.";
        }

        if (empty($errors)) {
            $q2 = $connexion->prepare(
                "INSERT INTO utilisateurs (prenom, nom, gender, phone, email, password, is_admin, date_registration) VALUES (:prenom,:nom,:gender,:phone,:email,:password,:is_admin,:date_registration)"
            );
            var_dump($q2);
            $q2->bindParam(':prenom', $firstname, PDO::PARAM_STR);
            $q2->bindParam(':nom', $lastname, PDO::PARAM_STR);
            $q2->bindParam(':gender', $gender, PDO::PARAM_STR);
            $q2->bindParam(':phone', $phone, PDO::PARAM_STR);
            $q2->bindParam(':email', $email, PDO::PARAM_STR);
            $q2->bindParam(':password', $password_modified, PDO::PARAM_STR);
            $q2->bindValue(':is_admin', 0, PDO::PARAM_INT);
            $q2->bindValue(':date_registration', date("Y-m-d H:i:s"), PDO::PARAM_STR);
            $q2->execute();
            header('location:connexion.php');
        }else {
            $message = new messages($errors);
            echo $message->renderMessage();
        }
    }

    public
    function disconnect()
    {
        $this->id_user = "";
        $this->firstname = "";
        $this->lastname = "";
        $this->email = "";
        $this->password = "";
        $this->register_date = "";
        $this->is_admin = "";
        $this->phone = "";
        session_unset();
        session_destroy();
        header('location:index.php');
    }

    public
    function isConnected()
    {
        if (empty($_SESSION['user'])) {
            return false;
        } else {
            return true;
        }
    }

    public function newsletter($email)
    {
        $connexion = $this->db->connectDb();
        $this->newsletter = ($_POST['newsletter']);
        var_dump($this->newsletter);
            $q3 = $connexion->prepare(
                "INSERT INTO newsletter(email) VALUES (:email)"
            );
            $q3->bindParam(':email', $email, PDO::PARAM_STR);
            $q3->execute();
            header('location:connexion.php');

    }

}
?>
