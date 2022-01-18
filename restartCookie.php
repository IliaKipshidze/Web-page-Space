<?php
    if(isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass'])){
        setcookie('user_email', $_COOKIE['user_email'], time()+15*60);
        setcookie('user_pass', $_COOKIE['user_pass'], time()+15*60);
        setcookie('user_fname', $_COOKIE['user_fname'], time()+15*60);
        setcookie('user_lname', $_COOKIE['user_lname'], time()+15*60);
        setcookie('prof_pic', $_COOKIE['prof_pic'], time()+15*60);
        setcookie('status', $_COOKIE['status'], time()+15*60);
    }
?>