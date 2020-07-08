<?php
include("includes/db.php");

    
if(isset($_POST['signup'])){
    
    $email = $_POST['emailSignup'];
    $pass = $_POST['passSignup'];

    $auth = $firebase->getAuth();
    $user = $auth->createUserWithEmailAndPassword($email,$pass);
    header("Location:index.php");
}
else{
    
    $email = $_POST['phoneLogin'];
    $pass = $_POST['passwordLogin'];

    $auth = $firebase->getAuth();
    $user = $auth->getUserWithEmailAndPassword($email,$pass);
    if($user){
        session_start();
        $_SESSION['user'] = true;
        header("Location:home.php");
    }
}

?>