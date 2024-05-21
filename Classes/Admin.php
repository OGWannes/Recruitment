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
            $password = $p['password'];
            $role = $p['role'];
            $hash = md5($password);
            $res1 = $this->db->exec("INSERT INTO user (email,password,nom,prenom,role) values ('$email','$hash','$nom','$prenom','$role')");
            if ($res1 == TRUE) {
                echo "<script>alert('Added Succesufly')</script>";
                $this->db->exec("INSERT INTO profile (email) values ('$email')");
                $this->db->exec("INSERT INTO experience (email) values ('$email')");
            } else {
                echo "<script>alert('Please check your data that you entred')</script>";
            }


        }
    }

    function AjoutJob($p)
    {
        if (isset($p['ajoutjob'])) {
            $job_name = $p['job_name'];
            $Employee_type = $p['Employee_Type'];
            $loc = $p['loc'];
            $experience = $p['Experience'];
            $qual = $p['qualification'];
            $Salary = $p['Salary'];
            $date_end = $p['date_end'];
            $Desc = $p['Desc'];
            $RD= $p['RD'];
            $RESQ = $p['RESQ'];
            $res1 = $this->db->exec("INSERT INTO jobs (job_name,Employee_Type,Loc,Experience,Qualification,Salary,Date_end,description,Responsibilities_Duties,RESQ) values ('$job_name','$Employee_type','$loc','$experience','$qual','$Salary','$date_end','$Desc','$RD','$RESQ')");
            if ($res1 == TRUE) {
                echo "<script>alert('Added Succesufly')</script>";
            } else {
                echo "<script>alert('Please check your data that you entred')</script>";
            }


        }
    }
    function CoutApp($job)
    {
        $result = $this->db->query("SELECT count(*) FROM application WHERE id_job = '$job'");
        $count = $result->fetchColumn();
        return $count;
    }

    function DeleteUser($p,$email)
    {
        $res1 = $this->db->prepare("DELETE FROM user WHERE id = $p");
        $res2 = $this->db->prepare("DELETE FROM profile WHERE email = '$email'");
        $res3 = $this->db->prepare("DELETE FROM experience WHERE email = '$email'");

        if ($res1->execute() && $res2->execute() && $res3->execute()) {
            echo "<script>alert('Deleted Succesufly')</script>";
            header("location: Consult.php");
        } else {
            echo "<script>alert('Something went wrong !')</script>";
        }
    }
    function DeleteContact($p)
    {
        $res1 = $this->db->prepare("DELETE FROM contact WHERE id = $p");

        if ($res1->execute()) {
            echo "<script>alert('Deleted Succesufly')</script>";
            header("location: Contacts.php");
        } else {
            echo "<script>alert('Something went wrong !')</script>";
        }
    }

    function DeleteJob($p)
    {
        $res1 = $this->db->prepare("DELETE FROM jobs WHERE id = $p");

        if ($res1->execute()) {
            echo "<script>alert('Deleted Succesufly')</script>";
            header("location: ConsultJobs.php");
        } else {
            echo "<script>alert('Something went wrong !')</script>";
        }
    }
    function DeleteApp($p)
    {
        $res1 = $this->db->prepare("DELETE FROM application WHERE id = $p");

        if ($res1->execute()) {
            echo "<script>alert('Deleted Succesufly')</script>";
            header("location: ConsultApps.php");
        } else {
            echo "<script>alert('Something went wrong !')</script>";
        }
    }

    function UpdateStatusApp($p,$j)
    {
        $res1 = $this->db->prepare("UPDATE application SET status = 'Complete' WHERE id = $p");
        $res2 = $this->db->prepare("UPDATE jobs SET status = 'Complete' WHERE id = $j");

        if ($res1->execute() && $res2->execute()) {
            echo "<script>alert('Updated Succesufly')</script>";
        } else {
            echo "<script>alert('Something went wrong !')</script>";
        }
    }

    function GetUser($id)
    {
        $user = $this->db->query("SELECT * FROM user WHERE id = '$id'");
        return $user->fetch();
    }
    function GetApps($ida)
    {
        return $this->db->query("SELECT * FROM application WHERE id_job = $ida");
    }
    function GetJob($id)
    {
        $user = $this->db->query("SELECT * FROM jobs WHERE id = '$id'");
        return $user->fetch();
    }
    function GetContact($id)
    {
        $user = $this->db->query("SELECT * FROM contact WHERE id = '$id'");
        return $user->fetch();
    }

    function GetUsers()
    {
        return $this->db->query("SELECT * FROM user");

    }
    function GetContacts()
    {
        return $this->db->query("SELECT * FROM contact");

    }
    function GetJobs()
    {
        return $this->db->query("SELECT * FROM jobs");

    }

    function UpdateUser($p,$id)
    {
        if (isset($p['update'])) {
            $email = $p['email'];
            $prenom = $p['prenom'];
            $nom = $p['nom'];
            $password = $p['password'];
            $role = $p['role'];
//PASSWORD HASH
            $hash = md5($password);
            $this->db->exec("UPDATE user SET email = '$email' , prenom = '$prenom' , nom = '$nom' , password = '$hash' , role = '$role'  WHERE id = $id");
            echo "<script>alert('User Updated successfully')</script>";
            header("Location: ../Admin/Consult.php");

        }else{
            echo "<script>alert('Please check your update error 404 ')</script>";
        }
    }
    function UpdateContact($p,$id)
    {
        if (isset($p['update'])) {
            $status = $p['status'];
            $reponse = $p['message'];
            $this->db->exec("UPDATE contact SET reponse = '$reponse',status = '$status' WHERE id = $id");
            echo "<script>alert('Contact Updated successfully')</script>";
            header("Location: ../Admin/Contacts.php");

        }else{
            echo "<script>alert('Please check your update error 404 ')</script>";
        }
    }

    function UpdateJob($p,$id)
    {
        if (isset($p['update'])) {
            $status = $p['status'];
            $reponse = $p['message'];
            $this->db->exec("UPDATE contact SET reponse = '$reponse',status = '$status' WHERE id = $id");
            echo "<script>alert('Contact Updated successfully')</script>";
            header("Location: ../Admin/Contacts.php");

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