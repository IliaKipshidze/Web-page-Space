<?php include('restartCookie.php') ?>

<?php
    $javascriptIndex = 0;

    $db = mysqli_connect('localhost', 'root', '', 'spaceweb');

    if(!$db){
        die("Connection failed". mysqli_connect_error());
    }
    if(isset($_POST['addCommentSubmit']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass'])){
        $message = $_POST['addCommentText'];
        $usremail = $_COOKIE['user_email'];
        $usrname = $_COOKIE['user_fname']." ".$_COOKIE['user_lname'];
        $message = trim($message);
        $message = stripcslashes($message);
        $message = mysqli_real_escape_string($db, $message);
        if($message != ""){
            $sql = "INSERT INTO usercomments (name, sender, comment)
            VALUES ('$usrname','$usremail', '$message')";
            mysqli_query($db, $sql);
        }
    }
    if(isset($_POST['update']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass'])){
        $javascriptIndex = intval($_POST['javascriptIndex']);

        $updatedMessage = $_POST['commenttxt'];
        $updatedMessage = trim($updatedMessage);
        $updatedMessage = stripcslashes($updatedMessage);
        $updatedMessage = mysqli_real_escape_string($db, $updatedMessage);

        $comId = $_POST['comId'];

        $sql = "UPDATE usercomments SET comment='".$updatedMessage."' WHERE id='".$comId."'";
        mysqli_query($db, $sql);
    }
    else if (isset($_POST['update']) && !(isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass']))){
        header("location: login.php");
    }
    if(isset($_POST['delete']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass'])){
        $javascriptIndex = intval($_POST['javascriptIndex']);

        $comId = $_POST['comId'];
        $sql = "DELETE FROM usercomments WHERE id=$comId";
        mysqli_query($db, $sql);
    }
    else if(isset($_POST['delete']) && !(isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass']))){
        header("location: login.php");
    }

    if(isset($_POST['WriteAllInFile']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass'])){
        $query = "SELECT * FROM usercomments";
        $result = mysqli_query($db, $query);
        $feedback = fopen("feedbacks.txt", "w");
        while($row = mysqli_fetch_assoc($result)){
            fwrite($feedback, "სახელი:\n".$row['name']."\n");
            fwrite($feedback, "მეილი:\n".$row['sender']."\n");
            fwrite($feedback, "კომენტარი:\n".$row['comment']."\n\n\n");
        }
        fwrite($feedback, "ბოლო განახლების თარიღი: ".date("d-m-Y"));
        fclose($feedback);
        header("location: commentsWritten.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Ilia Kipshidze" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/alk-life.min.css">
    <title>კონტაქტი</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        var windowsize = $(window).width();
        $(".open_menu").click(function(){
            $(".menu_list").toggle("slow");
        });
        if(windowsize > 840){
            $('.menu_list').css('display', 'block');
        }
        else{
            $('menu_list').css('display', 'none');
        }
    });
    $(window).resize(function(){
        var windowsize = $(window).width();
        if(windowsize > 840){
            $('.menu_list').css('display', 'block');
        }
        else{
            $('menu_list').css('display', 'none');
        }
    });
    </script>

</head>
<body id="contact" onload="setActiveMenuListColor()">
    <video autoplay muted loop id="myVideo">
        <source src="images/vid.mp4" type="video/mp4">
    </video>
    <div class="main_page">
        <header>
            <img class="open_menu" src="images/icons8_menu_96px_1.png" alt="">
            <div class="logo">
                <h1><a href="index.php">space</a></h1>
            </div>
            <div class="menu">
                <ul class="menu_list">
                    <li><a id="mtavari" href="index.php">მთავარი</a></li>
                    <li><a id="planetebi" href="planets.php">პლანეტები</a></li>
                    <li><a id="chvenShesaxeb" href="about.php">ჩვენ შესახებ</a></li>
                    <li><a id="contact" href="contact.php">კონტაქტი</a></li>
                </ul>
            </div>
        </header>
        <div class="user_profile">
            <?php include('profile.php') ?>
        </div>
        <main class="contact_main">
            <?php if(isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass'])){ ?>

            <h2>გაგზავნე შეტყობინება ადმინისტრაციასთან</h2>
            <form method = "post" action = "contact.php" class="addComment">
                <textarea rows="8" cols="60" placeholder="კომენტარი აქ" id="addCommentText" name="addCommentText" ></textarea><br>
                <input type="submit" id="addCommentSubmit" name="addCommentSubmit" value="გაგზავნა">
            </form>
                
            <?php 
            }
            else{
            ?>
                <p class="avtorizationForComments">ადმინისტრაციასთან შეტყობინების გასაგზავნად გთხოვთ გაიაროთ <a href="login.php">ავტორიზაცია</a></p>
            <?php 
                }
            ?>
            <?php include('comments.php') ?>
        </main>
    </div>
    <script src="index.js"></script>
</body>
</html>
