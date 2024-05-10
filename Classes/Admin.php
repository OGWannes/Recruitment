<?php

class Admin
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=recruitment',"root","");
    }

    function AjoutUser($p)
    {
        if(isset($p['ajout'])){
            $email=$p['email'];
            $prenom=$p['prenom'];
            $nom=$p['nom'];
            $phone=$p['phone'];
            $address=$p['address'];
            $password=$p['password'];
            $role=$p['role'];
            $datenais=$p['datenais'];
//PASSWORD HASH
            $options = ['cost' => 12];
            $hash = password_hash($password,PASSWORD_DEFAULT,$options);
            $res1 = $this->db->exec("INSERT INTO user (email,password,nom,prenom,role,tel,addresse,DateNais) values ('$email','$hash','$nom','$prenom','$role','$phone','$address','$datenais')");

            if($res1==TRUE){
                echo "<script>alert('Added Succesufly')</script>";
            }else{
                echo "<script>alert('Please check your data that you entred')</script>";
            }


        }
    }
    function DeleteUser($p)
    {
        $res1 = $this->db->exec("DELETE FROM user WHERE id = $p");

        if($res1==TRUE){
            echo "<script>alert('Deleted Succesufly')</script>";
        }else{
            echo "<script>alert('Something went wrong !')</script>";
        }
    }

    function GetUser($id)
    {
        $user = $this->db->query("SELECT * FROM user WHERE id = '$id'");
        return $user->fetch();
    }
    function UpdateUser()

    {
        $this->db->exec("UPDATE ");
    }

    function Logout()
    {
        session_start();

        session_unset();

        session_destroy();

        header("Location: ../Views/Auth/login.php");

    }

}