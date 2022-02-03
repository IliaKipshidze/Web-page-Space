<?php if(count($errors)>0): ?>
    <div class = "errorsForProfilePage" id="errorsForProfilePage">
        <?php foreach ($errors as $err): ?>
            <p class="errorsForProfilePage_p"> <?php echo $err; ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>