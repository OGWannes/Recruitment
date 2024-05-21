<?php

class Job
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=recruitment', "root", "");
    }

    function GetJob($id)
    {
        $user = $this->db->query("SELECT * FROM jobs WHERE id = '$id'");
        return $user->fetch();
    }

    function GetJobs()
    {
        return $this->db->query("SELECT * FROM jobs");

    }
    function AddApp($p,$idj,$idu)
    {
        if (isset($p['send'])){
            $name=$p['name'];
            $emaill=$p['email'];
            $tel=$p['tel'];
            $job_name=$p['job_name'];
            $type_job=$p['type_job'];
            $lettre=$p['lettre'];
            $cv=$p['cv'];
            $res1 = $this->db->exec("INSERT INTO application (name,email,tel,job_name,type_job,lettre_mot,cv,id_job,id_user) VALUES ('$name','$emaill','$tel','$job_name','$type_job','$lettre','$cv',$idj,$idu)");
            if ($res1 == TRUE) {
                echo "<script>alert('Posted !')</script>";
            } else {
                echo "<script>alert('Please check your data that you entred')</script>";
            }
        }

    }

    function GetJobCountByType($emp)
    {
        $result = $this->db->query("SELECT count(*) FROM jobs WHERE Employee_Type = '$emp'");
        $count = $result->fetchColumn();
        return $count;
    }

    function GetApp($idj)
    {
        return $this->db->query("SELECT * FROM application WHERE id_job = $idj");

    }

    function GetProfile($idj) {
        // First query to get the email
        $stmt = $this->db->query("SELECT email FROM application WHERE id_job = $idj");

        // Fetch the email from the result set
        $email = $stmt->fetchColumn();

        // If no email is found, handle the error
        if (!$email) {
            return null; // or handle the error as needed
        }

        // Second query to get the profile using the fetched email
        $stmt = $this->db->prepare("SELECT * FROM profile WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch and return the profile
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function GetUser($idj) {
        // First query to get the email
        $stmt = $this->db->query("SELECT email FROM application WHERE id_job = $idj");

        // Fetch the email from the result set
        $email = $stmt->fetchColumn();

        // If no email is found, handle the error
        if (!$email) {
            return null; // or handle the error as needed
        }

        // Second query to get the user using the fetched email
        $stmt = $this->db->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch and return the user
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    function GetExperience($idj) {
        // First query to get the email
        $stmt = $this->db->query("SELECT email FROM application WHERE id_job = $idj");

        // Fetch the email from the result set
        $email = $stmt->fetchColumn();

        // If no email is found, handle the error
        if (!$email) {
            return null; // or handle the error as needed
        }

        // Second query to get the experience using the fetched email
        $stmt = $this->db->prepare("SELECT * FROM experience WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch and return the experience
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}