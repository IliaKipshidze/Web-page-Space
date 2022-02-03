<?php if(isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass'])): ?>
    <div class="prof_div">
        <img class="prof_pic" src="<?php echo "profile pictures/".$_COOKIE['prof_pic'] ?>" alt="">
        <h2>გამარჯობა, <?php 
        if ($_COOKIE['status'] == "admin") echo $_COOKIE['user_fname']." ".$_COOKIE['user_lname']." (Admin)";
        else echo $_COOKIE['user_fname']." ".$_COOKIE['user_lname']; ?></h2>
    </div>
    <a href="logout.php">log out</a>
    <?php else: ?>
        <h2>გამარჯობა</h2>
        <a href="login.php">log in</a>
<?php endif ?>