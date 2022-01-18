<?php
    if(isset($_COOKIE['user_email']) && isset($_COOKIE['user_pass'])){
        $x = $_COOKIE['user_email'];
        if($_COOKIE['status'] != "admin") $query = "SELECT * FROM usercomments WHERE sender = '$x'";
        else $query = "SELECT * FROM usercomments";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) - 1 < $javascriptIndex) $javascriptIndex = $javascriptIndex -1;
        if(mysqli_num_rows($result)!=0){
?>
        <h2> 
        <?php 
                if($_COOKIE['status'] == "admin") echo "მომხმარებლების გზავნილები";
                else echo "ჩემი გზავნილები"
        ?>
        </h2>
        <div class="userComments">
        <div class="leftArrow"> < </div>
        <input id="numOfRecords" style="display:none;" type="text" value="<?php echo mysqli_num_rows($result) - 1; ?>">
<?php
        if($_COOKIE['status'] != "admin"){
                while($row = mysqli_fetch_assoc($result)){
?>
                <form method = "post" action = "contact.php" id="<?php echo $row['id'].'form'; ?>">
                        <textarea rows="8" cols="60" class="commenttxt" name="commenttxt" ><?php echo $row['comment']; ?></textarea><br>
                        <input type="submit" class="commentbtn" id="<?php echo $row['id'].'update'; ?>" name="update" value="შენახვა">
                        <input type="submit" class="commentbtn" id="<?php echo $row['id'].'delete'; ?>" name="delete" value="წაშლა">
                        <input style="display:none;" type="text" name="comId" value="<?php echo $row['id']; ?>">
                        <input id="javascriptIndex" class="javascriptIndex" name="javascriptIndex" style="display:none;" type="text" value="<?php echo $javascriptIndex; ?>">
                </form>
<?php
                }
        }
        else{
                while($row = mysqli_fetch_assoc($result)){
?>
                <form method = "post" action = "contact.php" id="<?php echo $row['id'].'form'; ?>">
                        <h3 id="senderName"><?php echo $row['name']; ?></h3>
                        <textarea rows="8" cols="60" class="commenttxt" name="commenttxt" <?php if($_COOKIE['user_fname']." ".$_COOKIE['user_lname'] != $row['name']){ ?> disabled <?php } ?> ><?php echo $row['comment']; ?></textarea><br>
                        <?php
                                if($_COOKIE['user_fname']." ".$_COOKIE['user_lname'] == $row['name']){
                        ?>
                                <input type="submit" class="commentbtn" id="<?php echo $row['id'].'update'; ?>" name="update" value="შენახვა">
                                <input type="submit" class="commentbtn" id="<?php echo $row['id'].'delete'; ?>" name="delete" value="წაშლა">
                        <?php
                              }
                        ?>
                        <input style="display:none;" type="text" name="comId" value="<?php echo $row['id']; ?>">
                        <input id="javascriptIndex" class="javascriptIndex" name="javascriptIndex" style="display:none;" type="text" value="<?php echo $javascriptIndex; ?>">                     
                </form>
<?php
                }
        }
?>


        <div class="rightArrow"> > </div>
        </div>
        <?php if($_COOKIE['status'] == "admin"){ ?>
        <form method = "post" action = "contact.php" >
                <input type="submit" class="commentbtn" id="WriteAllInFile" name="WriteAllInFile" value="გზავნილების ფაილში ჩაწერა">
        </form>
        <?php } ?>
<?php
        }
    }
?> 