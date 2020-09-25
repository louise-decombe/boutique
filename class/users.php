<?php

require 'messages.php';

class Users
{
    private $id_user;
    public $firstname;
    public $lastname;
    public $gender;
    public $email;
    public $password;
    public $date_registration;
    public $is_admin;
    public $phone;
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
                
                $ids = array_keys($_SESSION['panier']);
                if (isset($_SESSION['panier']) && empty($ids)){
                    header('location:index1.php');
                }else{
                    header('location:order.php');
                }
                
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
        //var_dump($connexion);

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
                "INSERT INTO utilisateurs (prenom, nom, gender, phone, email, password, is_admin, date_registration) VALUES (:prenom,:nom,:gender,:phone,:email,:password,:is_admin,NOW())"
            );
            var_dump($q2);
            $q2->bindParam(':prenom', $firstname, PDO::PARAM_STR);
            $q2->bindParam(':nom', $lastname, PDO::PARAM_STR);
            $q2->bindParam(':gender', $gender, PDO::PARAM_STR);
            $q2->bindParam(':phone', $phone, PDO::PARAM_STR);
            $q2->bindParam(':email', $email, PDO::PARAM_STR);
            $q2->bindParam(':password', $password_modified, PDO::PARAM_STR);
            $q2->bindValue(':is_admin', 0, PDO::PARAM_INT);
            $q2->execute();
            header('location:connexion.php');
        }else {
            $message = new messages($errors);
            echo $message->renderMessage();
        }
    }

    public function newsletter($email)
    {
        $connexion = $this->db->connectDb();
        $this->newsletter = ($_POST['newsletter']);
        //var_dump($this->newsletter);
            $q3 = $connexion->prepare(
                "INSERT INTO newsletter(email_utilisateur) VALUES (:email_utilisateur)"
            );
            $q3->bindParam(':email_utilisateur', $email, PDO::PARAM_STR);
            $q3->execute();
            header('location:connexion.php');
    }

    public function newsletter_footer($email)
    {
        $connexion = $this->db->connectDb();
        $this->newsletter = ($_POST['newsletter']);
        //var_dump($this->newsletter);
        $email_required = preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/", $email);
        if (!$email_required) {
            $errors[] = "L'email n'est pas conforme.";
        }
        $q = $connexion->prepare("SELECT email_utilisateur FROM newsletter WHERE email_utilisateur = :email_utilisateur");
        $q->bindParam(':email_utilisateur', $email, PDO::PARAM_STR);
        $q->execute();
        $email_check = $q->fetch();
        if (!empty($email_check)) {
            $errors[] = "Cette adresse mail est déjà utilisée.";
        }
        if (empty($errors)) {
            $q1 = $connexion->prepare("INSERT INTO newsletter(email_utilisateur) VALUES (:email_utilisateur)");
            $q1->bindParam(':email_utilisateur', $email, PDO::PARAM_STR);
            $q1->execute();
            $errors[] = "Vous êtes inscrit(e).";
        }
        else {
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
        $this->gender = "";
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

    public function refresh($id_user)
    {
        $connexion = $this->db->connectDb();
        $refresh = $connexion->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = $id_user");
        $refresh->execute();
        $result_refresh = ($refresh->fetchAll());
        //var_dump($result_refresh);

            $this->id_user = $result_refresh[0]['id_utilisateur'];
            $this->firstname = $result_refresh[0]['prenom'];
            $this->lastname = $result_refresh[0]['nom'];
            $this->gender = $result_refresh[0]['gender'];
            $this->phone = $result_refresh[0]['phone'];
            $this->email = $result_refresh[0]['email'];
            $this->password = $result_refresh[0]['password'];
            $this->is_admin = $result_refresh[0]['is_admin'];
            $this->date_registration = $result_refresh[0]['date_registration'];
           

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

        return $_SESSION['user'];
    }



    public function profile($id_user)
    {
        $connexion = $this->db->connectDb();
        $q4 = $connexion->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = $id_user");
        $q4->execute();
        $infos_user = $q4->fetchAll();
        var_dump($infos_user);
        
        return $infos_user;
    }


    public function modify_infos($id_user, $new_gender, $new_firstname, $new_lastname, $new_phone)
    {  
        $connexion = $this->db->connectDb();
        //UPDATE GENDER
        if(isset($new_gender))
        {
            $update_g = "UPDATE utilisateurs SET gender=:gender WHERE id_utilisateur = '$id_user' ";
            $update_gender = $connexion -> prepare($update_g);
            $update_gender->bindParam(':gender',$new_gender, PDO::PARAM_STR);
            $update_gender->execute();
        }

        //UPDATE FIRSTNAME
        if(isset($new_firstname))
        {
            $firstname_required = preg_match("/^(?=.*[A-Za-z]$)[A-Za-z][A-Za-z\-]{2,19}$/", $new_firstname);
            if (!$firstname_required) 
            {
                $errors[] = "Le prénom doit :<br>- Comporter entre 3 et 19 caractères.<br>- Commencer et finir par une lettre.<br>- Ne contenir aucun caractère spécial (excepté -).";
            }
            
            if (empty($errors)) 
            {   
            $update_f = "UPDATE utilisateurs SET prenom=:firstname WHERE id_utilisateur = '$id_user' ";
            $update_firstname = $connexion -> prepare($update_f);
            $update_firstname->bindParam(':firstname',$new_firstname, PDO::PARAM_STR);
            $update_firstname->execute();
            }
        }

        //UPDATE LASTNAME
        if(isset($new_lastname))
        {
            $lastname_required = preg_match("/^(?=.*[A-Za-z]$)([A-Za-z]{2,25}[\s]?[A-Za-z]{1,25})$/", $new_lastname);
            if (!$lastname_required) 
            {
                $errors[] = "Le nom doit:<br>- Comporter entre 3 et 50 caractètres.<br>- Commencer et finir par une lettre.<br>- Ne contenir aucun caractère spécial (excepté un espace).";
            }
            
            if (empty($errors)) 
            {
            $update_l = "UPDATE utilisateurs SET nom=:lastname WHERE id_utilisateur = '$id_user' ";
            $update_lastname = $connexion -> prepare($update_l);
            $update_lastname->bindParam(':lastname',$new_lastname, PDO::PARAM_STR);
            $update_lastname->execute();
            }   
        }


        //UPDATE PHONE
        if(isset($new_phone))
        {
            $phone_required = preg_match("/^[0-9]{10}$/", $new_phone);
            if (!$phone_required) 
            {
                $errors[] = "Le numéro de téléphone doit contenir exactement 10 chiffres.";
            }
            if (empty($errors)) 
            {
            $update_p = "UPDATE utilisateurs SET phone=:phone WHERE id_utilisateur = '$id_user' ";
            $update_phone = $connexion -> prepare($update_p);
            $update_phone->bindParam(':phone',$new_phone, PDO::PARAM_STR);
            $update_phone->execute();
            }
        }
          
        if (!empty($errors))
        {
            $message = new messages($errors);
            echo $message->renderMessage();
        }

    }

    public function modify_password ($id_user, $new_password, $check_password)
    {
        $connexion = $this->db->connectDb(); 
        if(isset($new_password) && isset($check_password)){
            $password_required = preg_match("/^(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})(?=.*?[0-9]{1,})(?=.*?[\W]{1,}).{8,20}$/",$new_password);
            if (!$password_required) {
                $errors[] = "Le mot de passe doit contenir:<br>- Entre 8 et 20 caractères<br>- Au moins 1 caractère spécial<br>- Au moins 1 majuscule et 1 minuscule<br>- Au moins un chiffre.";
            }
            if ($new_password != $check_password) {
                $errors[] = "Les mots de passe ne correspondent pas.";
            } else {
    
                $password_modified = password_hash($new_password, PASSWORD_BCRYPT, array('cost' => 10));

                $update_pass = "UPDATE utilisateurs SET password=:pass WHERE id_utilisateur = '$id_user' ";
                $update_password = $connexion -> prepare($update_pass);
                $update_password->bindParam(':pass',$password_modified, PDO::PARAM_STR);
                $update_password->execute();
            }
        }
        if (!empty($errors))
        {
            $message = new messages($errors);
            echo $message->renderMessage();
        }
    }


}
?>


