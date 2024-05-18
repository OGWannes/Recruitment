<?php

class Admin
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=recruitment', "root", "");
    }

    function AjoutUser($p)
    {
        if (isset($p['ajout'])) {
            $email = $p['email'];
            $prenom = $p['prenom'];
            $nom = $p['nom'];
            $phone = $p['phone'];
            $address = $p['address'];
            $password = $p['password'];
            $role = $p['role'];
            $datenais = $p['datenais'];
//PASSWORD HASH
            $hash = md5($password);
            $res1 = $this->db->exec("INSERT INTO user (email,password,nom,prenom,role,tel,addresse,DateNais) values ('$email','$hash','$nom','$prenom','$role','$phone','$address','$datenais')");

            if ($res1 == TRUE) {
                echo "<script>alert('Added Succesufly')</script>";
            } else {
                echo "<script>alert('Please check your data that you entred')</script>";
            }


        }
    }

    function DeleteUser($p)
    {
        $res1 = $this->db->prepare("DELETE FROM user WHERE id = $p");

        if ($res1->execute()) {
            echo "<script>alert('Deleted Succesufly')</script>";
            header("location: Consult.php");
        } else {
            echo "<script>alert('Something went wrong !')</script>";
        }
    }

    function GetUser($id)
    {
        $user = $this->db->query("SELECT * FROM user WHERE id = '$id'");
        return $user->fetch();
    }

    function GetUsers()
    {
        return $this->db->query("SELECT * FROM user");

    }

    function UpdateUser($p,$id)
    {
        if (isset($p['update'])) {
            $email = $p['email'];
            $prenom = $p['prenom'];
            $nom = $p['nom'];
            $phone = $p['tel'];
            $address = $p['addresse'];
            $password = $p['password'];
            $role = $p['role'];
            $datenais = $p['DateNais'];
//PASSWORD HASH
            $hash = md5($password);
            $this->db->exec("UPDATE user SET email = '$email' , prenom = '$prenom' , nom = '$nom' , tel = '$phone' , addresse = '$address' , password = '$hash' , role = '$role' , DateNais = $datenais WHERE id = $id");
            echo "<script>alert('User Updated successfully')</script>";
            header("Location: ../Admin/Consult.php");

        }else{
            echo "<script>alert('Please check your update error 404 ')</script>";
        }
    }

    function Logout()
    {
        session_start();

        session_unset();

        session_destroy();

        header("Location: ../Views/Auth/login.php");

    }
}