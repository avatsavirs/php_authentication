<?php require "./includes/header.php"?>
<?php require "./includes/navbar.php"?>
<?php
    if(isset($_SESSION['id'])){
        require "./includes/db.inc.php";
        $id = $_SESSION['id'];
        $query = "SELECT id,fname,sname,emailId,contact FROM userbase WHERE id={$id}";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        // var_dump($user);
    }
?>
    <div class="container p-1">
        <?php if(isset($_SESSION['id'])){
            // echo "Welcome ".$_SESSION['fname']." ".$_SESSION['sname'];
            echo "<h3>Welcome ".$user['fname']." " .$user['sname']."</h3><br>";
            echo "Contact: $user[contact]<br>";
            echo "email: $user[emailId]<br>";
        }else{
            echo "<h3>Login to Continue</h3>";
        } ?>
    </div>
<?php require "./includes/footer.php"?>