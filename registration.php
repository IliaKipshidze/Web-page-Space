<?php
$fname = "";
$lname = "";
$email = "";
$pass = "";
$errors = array();
    $db = mysqli_connect('localhost', 'root', '', 'spaceweb');

    if(!$db){
        die("Connection failed". mysqli_connect_error());
    }
    if(isset($_POST['sbm_register'])){
        $fname = stripcslashes($_POST["user_name"]);
        $fname = mysqli_real_escape_string($db, $fname);

        $lname = stripcslashes($_POST["user_surname"]);
        $lname = mysqli_real_escape_string($db, $lname);

        $email = stripcslashes($_POST["user_email_reg"]);
        $email = mysqli_real_escape_string($db, $email);

        $pass = stripcslashes($_POST["user_password_reg"]);
        $pass = mysqli_real_escape_string($db, $pass);
        
        if(empty($fname)){
            array_push($errors, "სახელის მითითება აუცილებელია");
        }
        if(empty($lname)){
            array_push($errors, "გვარის მითითება აუცილებელია");
        }
        if(empty($email)){
            array_push($errors, "მეილის მითითება აუცილებელია");
        }
        if(empty($pass)){
            array_push($errors, "პაროლის მითითება აუცილებელია");
        }
        else if (strlen($pass)<8){
            array_push($errors, "პაროლი უნდა შეიცავდეს მინიმუმ 8 სიმბოლოს");
        }
        $query = "SELECT * FROM userregistration WHERE email = '$email'";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result)==1){
            array_push($errors, "მითითებული email უკვე გამოყენებულია");
        }
        if(count($errors) == 0){
            $imgloc="";
                $explodedEmail = explode(".", $email);
                $implodedEmail = implode("@", $explodedEmail);
                $implodedEmail = md5($implodedEmail);
	            $image=$_FILES['profilePic'];
                $ext = explode(".", $image['name']);
                $realExt = strtolower(end($ext));
                if(count($ext)==1){
                    $imgloc = "userIcon.png";
                }
                else{
                    move_uploaded_file($image['tmp_name'],"profile pictures/".$implodedEmail.".".$realExt);
                    $imgloc = $implodedEmail.".".$realExt;
                }

            $pass1 = md5($pass);
            $sql = "INSERT INTO userregistration (fname, lname, email, password, imgloc)
            VALUES ('$fname', '$lname', '$email', '$pass1', '$imgloc')";
            mysqli_query($db, $sql);
            header("location: success.php");
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
    <title>რეგისტრაცია</title>
</head>
<body>
    <div class="signUpDiv" id="signUpDiv">
        <form method = "post" action = "registration.php" class="signUpForm" enctype="multipart/form-data">
            <label for="user_name">სახელი:</label><br>
            <input type="text" placeholder="მომხმარებლის სახელი" id="user_name" name="user_name" value = "<?php echo $fname; ?>"><br>
            <label for="user_surname">გვარი:</label><br>
            <input type="text" placeholder="მომხმარებლის გვარი" id="user_surname" name="user_surname" value = "<?php echo $lname; ?>"><br>
            <label for="user_email_reg">Email:</label><br>
            <input type="email" placeholder="შეიყვანეთ Email" id="user_email_reg" name="user_email_reg" value = "<?php echo $email; ?>"><br>
            <label for="user_password_reg">პაროლი:</label><br>
            <input oninput="passCheck()" type="password" placeholder="შეიყვანეთ პაროლი" id="user_password_reg" name="user_password_reg"> <br>
            <input type="checkbox" id="showPassword" onclick="f2()" />
            <label for="showPassword" id="showPassLabel">მაჩვენე პაროლი</label><br>
            <ul>
                <li><div id="passSymbols"></div> <p>მინიმუმ 8 სიმბოლო</p></li>
            </ul>
            <label class="profilePicLabel" for="profilePic">პროფილის ფოტოს ატვირთვა</label><br>
            <input type="file" id="profilePic" name="profilePic">
            <input type="submit" id="submit_reg" name = "sbm_register" value="რეგისტრაცია"><br>
            <?php include('errors.php') ?>
        </form>
        <p>უკვე გაქვთ ანგარიში? <a href="login.php">ავტორიზაცია</a></p>
    </div>

    <script src="index.js"></script>
</body>
</html>