<?php
    include_once "common/base.php";
    $pageTitle = "Home";
    include_once "common/header.php";

    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])):
?>
 
        <p>You are currently <strong>logged in.</strong></p>
	<?php echo $_SESSION['Username'];
		echo $_SESSION['LoggedIn']; ?>
        <p><a href="logout.php">Log out</a></p>
<?php
    elseif(!empty($_POST['username']) && !empty($_POST['password'])):
        include_once 'inc/class.users.inc.php';
        $users = new SundayCoffeeUsers($db);
        if($users->accountLogin()===TRUE):
            echo "<meta http-equiv='refresh' content='0;/'>";
            exit;
        else:
?>
                 
        <h2>Login Failed&mdash;Try Again?</h2>
        <form method="post" action="main.php" name="loginform" id="loginform">
            <div>
                <input type="text" name="username" id="username" />
                <label for="username">Email</label>
                <br /><br />
                <input type="password" name="password" id="password" />
                <label for="password">Password</label>
                <br /><br />
                <input type="submit" name="login" id="login" value="Login" class="button" />
            </div>
        </form>
<?php
        endif;
    else:
?>
  
        <h2>Log-in</h2>
        <form method="post" action="main.php" name="loginform" id="loginform">
            <div>
                <input type="text" name="username" id="username" />
                <label for="username">Email</label>
                <br /><br />
                <input type="password" name="password" id="password" />
                <label for="password">Password</label>
                <br /><br />
                <input type="submit" name="login" id="login" value="Login" class="button" />
            </div>
        </form><br /><br />
<?php
    endif;
?>
 
        <div style="clear: both;"></div>