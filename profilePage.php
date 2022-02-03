<?php
    if(isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass'])){
        setcookie('user_email', $_COOKIE['user_email'], time()+15*60);
        setcookie('user_pass', $_COOKIE['user_pass'], time()+15*60);
        setcookie('user_fname', $_COOKIE['user_fname'], time()+15*60);
        setcookie('user_lname', $_COOKIE['user_lname'], time()+15*60);
        setcookie('prof_pic', $_COOKIE['prof_pic'], time()+15*60);
        setcookie('status', $_COOKIE['status'], time()+15*60);
    }
    else{
        header("location: login.php");
    }

    $errors = array();
    $errorAt = 0;
    $db = mysqli_connect('localhost', 'root', '', 'spaceweb');

    if(!$db){
        die("Connection failed". mysqli_connect_error());
    }

    $nm = $_COOKIE['user_fname'];
    $srnm = $_COOKIE['user_lname'];
    $gml = $_COOKIE['user_email'];

    if(isset($_POST['submitNameOnProfilePage'])){
        if($_POST['nameOnProfilePage'] == "") {
            array_push($errors, "სახელის ველი ცარიელია");
            $errorAt = 1;
        }
        else{
            $name = stripcslashes($_POST["nameOnProfilePage"]);
            $name = mysqli_real_escape_string($db, $name);
            $sql = "UPDATE userregistration SET fname='".$name."' WHERE email='".$_COOKIE['user_email']."'";
            mysqli_query($db, $sql);

            setcookie('user_email', $_COOKIE['user_email'], time()+15*60);
            setcookie('user_pass', $_COOKIE['user_pass'], time()+15*60);
            setcookie('user_fname', $name, time()+15*60);
            setcookie('user_lname', $_COOKIE['user_lname'], time()+15*60);
            setcookie('prof_pic', $_COOKIE['prof_pic'], time()+15*60);
            setcookie('status', $_COOKIE['status'], time()+15*60);

            $nm = $name;
        }
    }
    if(isset($_POST['submitSurnameOnProfilePage'])){
        if($_POST['surnameOnProfilePage'] == ""){
            array_push($errors, "გვარის ველი ცარიელია");
            $errorAt = 2;
        }
        else{
            $userName = stripcslashes($_POST["surnameOnProfilePage"]);
            $userName = mysqli_real_escape_string($db, $userName);
            $sql = "UPDATE userregistration SET lname='".$userName."' WHERE email='".$_COOKIE['user_email']."'";
            mysqli_query($db, $sql);

            setcookie('user_email', $_COOKIE['user_email'], time()+15*60);
            setcookie('user_pass', $_COOKIE['user_pass'], time()+15*60);
            setcookie('user_fname', $_COOKIE['user_fname'], time()+15*60);
            setcookie('user_lname', $userName, time()+15*60);
            setcookie('prof_pic', $_COOKIE['prof_pic'], time()+15*60);
            setcookie('status', $_COOKIE['status'], time()+15*60);

            $srnm = $userName;
        }
    }
    if(isset($_POST['submitGmailOnProfilePage'])){
        if($_POST['gmailOnProfilePage'] == ""){
            array_push($errors, "ემაილის ველი ცარიელია");
            $errorAt = 3;
        }
        else{
            $email = stripcslashes($_POST["gmailOnProfilePage"]);
            $email = mysqli_real_escape_string($db, $email);

            $sql = "SELECT * FROM userregistration WHERE email = '$email'";
            $result = mysqli_query($db, $sql);
            if(mysqli_num_rows($result)>0){
                array_push($errors, "ასეთი ემაილი უკვე გამოყენებულია");
                $errorAt = 3;
            }
            else{
                $sql = "UPDATE userregistration SET email='".$email."' WHERE email='".$_COOKIE['user_email']."'";
                mysqli_query($db, $sql);

                setcookie('user_email', $email, time()+15*60);
                setcookie('user_pass', $_COOKIE['user_pass'], time()+15*60);
                setcookie('user_fname', $_COOKIE['user_fname'], time()+15*60);
                setcookie('user_lname', $_COOKIE['user_lname'], time()+15*60);
                setcookie('prof_pic', $_COOKIE['prof_pic'], time()+15*60);
                setcookie('status', $_COOKIE['status'], time()+15*60);

                $gml = $email;
            }
        }
    }
    if(isset($_POST['submitPasswordOnProfilePage'])){
        if($_POST['passwordOnProfilePage'] == "" || $_POST['oldPasswordOnProfilePage']==""){
            array_push($errors, "პაროლის ველი ცარიელია");
            $errorAt = 4;
        }
        else{
            if(md5($_POST['oldPasswordOnProfilePage']) != $_COOKIE['user_pass']){
                array_push($errors, "მიმდინარე პაროლი არასწორია");
                $errorAt = 4;
            }
            else if(strlen($_POST['passwordOnProfilePage'])<8){
                array_push($errors, "პაროლი მინიმუმ 8 სიმბოლოს უნდა შეიცავდეს");
                $errorAt = 4;
            }
            else{
                $pass = stripcslashes($_POST["passwordOnProfilePage"]);
                $pass = mysqli_real_escape_string($db, $pass);
                $pass = md5($pass);

                $sql = "UPDATE userregistration SET password='".$pass."' WHERE email='".$_COOKIE['user_email']."'";
                mysqli_query($db, $sql);

                setcookie('user_email', $_COOKIE['user_email'], time()+15*60);
                setcookie('user_pass', $pass, time()+15*60);
                setcookie('user_fname', $_COOKIE['user_fname'], time()+15*60);
                setcookie('user_lname', $_COOKIE['user_lname'], time()+15*60);
                setcookie('prof_pic', $_COOKIE['prof_pic'], time()+15*60);
                setcookie('status', $_COOKIE['status'], time()+15*60);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/alk-life.min.css">
    <title>პროფილი</title>
</head>
<body id="profilePageBody">
    <div>
        <a class="backToMainPageFromProfilePage" href="index.php">მთავარ გვერდზე დაბრუნება</a>
    </div>
    <div class = "userProfilePage">
        <div class="profilePictureOnProfilePage" id ="profilePictureOnProfilePage">
            <img src="<?php echo "profile pictures/".$_COOKIE['prof_pic'] ?>" alt=""><br>
            <form id="profilePictureOnProfilePageForm" method = "post" action="profilePage.php" enctype="multipart/form-data">
                <label class="changeProfilePictureOnProfilePage" id="changeProfilePictureOnProfilePage">ფოტოს შეცვლა</label>
                <input type="submit" id = "submitProfilePictureOnProfilePage" name="submitProfilePictureOnProfilePage" value="შენახვა"><br>
            </form>
        </div>
    
        <div class="bioOnProfilePage">
            <form action="profilePage.php" method="post" id="bioOnProfilePageForm">

                <label for="nameOnProfilePage">სახელი:</label><br>
                <input type="text" id="nameOnProfilePage" name="nameOnProfilePage" value = "<?php echo $nm; ?>" disabled> <br>
                <?php 
                    if($errorAt == 1)
                        include('errorsForProfilePage.php')
                ?>
                <label for = "nameOnProfilePage" class="updaterLabel" id = "changeNameOnProfilePage">შეცვლა</label>
                <input type="submit" id = "submitNameOnProfilePage" name="submitNameOnProfilePage" value="შენახვა"><br>

                <label for="surnameOnProfilePage">გვარი:</label><br>
                <input type="text" id="surnameOnProfilePage" name="surnameOnProfilePage" value = "<?php echo $srnm; ?>" disabled> <br>
                <?php 
                    if($errorAt == 2)
                        include('errorsForProfilePage.php')
                ?>
                <label for = "surnameOnProfilePage" class="updaterLabel" id = "changeSurnameOnProfilePage">შეცვლა</label>
                <input type="submit" id = "submitSurnameOnProfilePage" name="submitSurnameOnProfilePage" value="შენახვა"><br>

                <label for="gmailOnProfilePage">Gmail:</label><br>
                <input type="text" id="gmailOnProfilePage" name="gmailOnProfilePage" value = "<?php echo $gml; ?>" disabled> <br>
                <?php 
                    if($errorAt == 3)
                        include('errorsForProfilePage.php')
                ?>
                <label for = "gmailOnProfilePage" class="updaterLabel" id = "changeGmailOnProfilePage">შეცვლა</label>
                <input type="submit" id = "submitGmailOnProfilePage" name="submitGmailOnProfilePage" value="შენახვა"><br>

                <label for="passwordOnProfilePage" id="passwordOnProfilePageLabel">პაროლი:</label><br>
                <input type="password" id="passwordOnProfilePage" name="passwordOnProfilePage" value = "" disabled> <br>
                <?php 
                    if($errorAt == 4)
                        include('errorsForProfilePage.php')
                ?>
                <label for = "oldPasswordOnProfilePage" class="updaterLabel" id = "changePasswordOnProfilePage">შეცვლა</label>
                <input type="submit" id = "submitPasswordOnProfilePage" name="submitPasswordOnProfilePage" value="შენახვა"><br>

            </form>
        </div>
    </div>
    <script src="profilePage.js"></script>
</body>
</html>