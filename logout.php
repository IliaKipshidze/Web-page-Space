<?php
    if(isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass'])){
        setcookie('user_email',null, time() - 1);
        setcookie('user_pass', null, time() - 1);
        setcookie('user_fname', null,  time() - 1);
        setcookie('user_lname', null, time() - 1);
        setcookie('prof_pic', null, time() - 1);
        setcookie('status', null, time() - 1);
        header("location: login.php");
    }
?>