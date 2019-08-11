<?php require "./includes/header.php"?>
<?php require "./includes/navbar.php"?>
    <div class="container p-1">
        <?php if(isset($_SESSION['emailId'])){
            echo "Welcome ".$_SESSION['fname']." ".$_SESSION['sname'];
        }else{
            echo "<h3>Login to Continue</h3>";
        } ?>
    </div>
<?php require "./includes/footer.php"?>