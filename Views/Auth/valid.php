<?php


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "recruitment";

session_start();

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email = '$email' AND password ='$password' ";

    $res = mysqli_query($con, $query);

    if (mysqli_num_rows($res) > 0) {

        while ($row = mysqli_fetch_assoc($res)) {

            if ($row["role"] == "con") {
                $_SESSION["email"] = $row["email"];
                $_SESSION["role"] = $row["role"];
                header("location: index.php");
                echo "alert('Logged in successfully')";

            } else if ($row["role"] == "rh") {
                $_SESSION["email"] = $row["email"];
                $_SESSION["role"] = $row["role"];
                header("location: index.php");
                echo "alert('Logged in successfully')";


            }
            else if ($row["role"] == "admin") {
                $_SESSION["email"] = $row["email"];
                $_SESSION["role"] = $row["role"];
                $id = $row["id"];
                header("location: ../Admin/home.php?iduser=$id");
                echo "alert('Logged in successfully')";


            }else {
                echo "('Woops! Email or Password incorrect')";
                echo "<script>location.replace('/Views/Auth/login.php')</script>";

            }

        }
    }


}

