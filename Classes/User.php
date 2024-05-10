<?php

class User
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=recruitment', "root", "");
    }

    function Signup($p)
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
            $options = ['cost' => 12];
            $hash = password_hash($password, PASSWORD_DEFAULT, $options);
            $res1 = $this->db->exec("INSERT INTO user (email,password,nom,prenom,role,tel,addresse,DateNais) values ('$email','$hash','$nom','$prenom','$role','$phone','$address','$datenais')");

            if ($res1 == TRUE) {
                echo "<script>alert('Added Succesufly')</script>";
            } else {
                echo "<script>alert('Please check your data that you entred')</script>";
            }


        }
    }
}