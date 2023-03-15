<?php
include 'connect.php';
include 'register.php';

if (!(isset($_POST["login"]))) {
    header("Location: ../register.php");
    return;
}

$email = $_POST["email"];
$pwd = $_POST["password"];

loginUser($email, $pwd);


function loginUser($email, $pwd) {

    $userExists = emailExists($email);

    if ($userExists === false) {
        header("Location: ../signin.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $userExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("Location: ../signin.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $userExists["id"];
        $_SESSION["useremail"] = $userExists["email"];
        $_SESSION["admin"] = $userExists["admin"];
        $_SESSION["authenticated"] = true;
        header("Location: ../index.php");
        exit();
    }
}