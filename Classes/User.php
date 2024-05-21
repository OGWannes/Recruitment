<?php

class User
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=recruitment', "root", "");
    }

    function GetUser($id)
    {
        $user = $this->db->query("SELECT * FROM user  WHERE id = '$id'");
        return $user->fetch();
    }
    function GetProfile($email)
    {
        $user = $this->db->query("SELECT * FROM profile  WHERE email = '$email'");
        return $user->fetch();
    }
    function GetExperience($email)
    {
        $user = $this->db->query("SELECT * FROM experience  WHERE email = '$email'");
        return $user->fetch();
    }

    function UpdateUserProfile($p,$email,$id)
    {
        if (isset($p['updateprofile'])) {
            $nom = $p['nom'];
            $prenom = $p['prenom'];
            $occup = $p['occupation'];
            $loc = $p['location'];
            $phone = $p['tel'];
            $datenais = $p['date'];
            $cv = $p['filecv'];
            $city = $p['city'];
            $intro = $p['intro'];
            $this->db->exec("UPDATE user SET nom = '$nom' , prenom = '$prenom' WHERE id = $id");
            $this->db->exec("UPDATE profile SET occup = '$occup' , loc = '$loc' , cv = '$cv' ,intro = '$intro' , tel = '$phone' , city = '$city' , birth ='$datenais' WHERE email = '$email'");
            echo "<script>alert('User Updated successfully')</script>";
            header("Location: candidate-profile.php");

        }else{
            echo "<script>alert('Please check your update error 404 ')</script>";
        }
    }
    function UpdateUser($p,$id,$old)
    {
        if (isset($p['submitdata'])) {
            $email = $p['email'];
            $email2 = $p['email2'];
            $pass1 = $p['pass1'];
            $hash = md5($pass1);
            $pass2 = $p['pass2'];
            $pass3 = $p['pass3'];
            if ($email == $email2 && $hash == $old && $pass1 != $pass2 && $pass2 == $pass3) {
                $passwordhash = md5($pass2);
                $this->db->exec("UPDATE user SET email = '$email' , password = '$passwordhash' WHERE id = $id");
                echo "<script>alert('User Updated successfully')</script>";
            }else{
                echo "<script>alert('Please check your update error 404 $old ,$hash')</script>";
            }
        }else{
            echo "<script>alert('Please check your update error 400')</script>";
        }
    }

    function AjouterMessage($p)
    {
        if (isset($p['send'])) {
            $email = $p['email'];
            $name = $p['name'];
            $subject = $p['subject'];
            $message = $p['message'];
            $res1 = $this->db->exec("INSERT INTO contact (name,email,subject,message) values ('$name','$email','$subject','$message')");
            if ($res1 == TRUE) {
                echo "<script>alert('Added Succesufly')</script>";
            } else {
                echo "<script>alert('Please check your data that you entred')</script>";
            }


        }
    }

    function DeleteUser($p,$email)
    {
        $res1 = $this->db->prepare("DELETE FROM user WHERE id = $p");
        $res2 = $this->db->prepare("DELETE FROM profile WHERE email = '$email'");
        $res3 = $this->db->prepare("DELETE FROM experience WHERE email = '$email'");

        if ($res1->execute() && $res2->execute() && $res3->execute()) {
            echo "<script>alert('Deleted Succesufly')</script>";
            header("location: ../Auth/login.php");
        } else {
            echo "<script>alert('Something went wrong !')</script>";
        }
    }
}