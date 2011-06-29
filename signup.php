<?php
    include_once "common/base.php";
    include_once "common/header.php";
 
    if(!empty($_POST['username'])):
        include_once "inc/class.users.inc.php";
        $users = new SundayCoffeeUsers($db);
        echo $users->createAccount();
    else:
?>
        <h2>Sign up</h2>
        <form method="post" action="signup.php" id="registerform">
            <div>
                <label for="username">Email:</label>
                <input type="text" name="username" id="username" /><br />
                <input type="submit" name="register" id="register" value="Sign up" />
            </div>
        </form>
<a href="logout.php">Log-out</a>
 
<?php
    endif;
?>
</html>