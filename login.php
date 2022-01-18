<?php
    $email = "";
    $pass = "";
    $notfound = false;
    $db = mysqli_connect('localhost', 'root', '', 'spaceweb');

    if(!$db){
        die("Connection failed". mysqli_connect_error());
    }
    $errors = array();
    if(isset($_POST['sbm_signIn'])){

        $email = stripcslashes($_POST["user_email"]);
        $email = mysqli_real_escape_string($db, $email);

        $pass = stripcslashes($_POST["user_password"]);
        $pass = mysqli_real_escape_string($db, $pass);
        
        $pass = md5($pass);
        $query = "SELECT * FROM userregistration WHERE email = '$email' AND password = '$pass'";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);
            setcookie('user_email', $email, time()+15*60);
            setcookie('user_pass', $pass, time()+15*60);
            setcookie('user_fname', $row["fname"], time()+15*60);
            setcookie('user_lname', $row["lname"], time()+15*60);
            setcookie('prof_pic', $row["imgloc"], time()+15*60);
            $statusData = file("status.txt");
            $statusFound = false;
            for($i = 0;$i<count($statusData);$i++){
                if(trim($statusData[$i])==$email)$statusFound=true;
            }
            if($statusFound) setcookie('status', "admin", time()+15*60);
            else setcookie('status', "user", time()+15*60);
            header("location: index.php");
        }else{
            $notfound = true;
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
    <title>ავტორიზაცია</title>
</head>
<body>
    <div class="signInDiv" id="signInDiv">
        <form method = "post" action = "login.php" class="signInForm">
            <label for="user_email">მომხმარებელი:</label><br>
            <input type="email" placeholder="შეიყვანეთ Email" id="user_email" name="user_email"  value = "<?php echo $email; ?>"><br>
            <label for="user_password">პაროლი:</label><br>
            <input type="password" placeholder="შეიყვანეთ პაროლი" id="user_password" name="user_password"> <br>
            <input type="checkbox" id="showPassword1"  onclick="f1()"/>
            <label for="showPassword1" id="showPassLabel1">მაჩვენე პაროლი</label><br>
            <?php include('tmp.php') ?>
            <input type="submit" id="submit" value="შესვლა" name = "sbm_signIn"><br>
            <a href="">დაგავიწყდათ პაროლი?</a>
        </form>
        <p>არ გაქვთ ანგარიში? <a href="registration.php" >რეგისტრაცია</a></p>
    </div>
    <script src="index.js"></script>
</body>
</html>