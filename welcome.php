<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php $pageTitle = "Default"; ?>

<title><?php echo $pageTitle; ?></title>

<link rel="stylesheet" href="common/welcomestyle.css" type="text/css" />

<?php

    $pageTitle = "Welcome!";

    if(!empty($_POST['username'])):
        include_once "inc/class.users.inc.php";
        $users = new SundayCoffeeUsers($db);
        echo $users->createAccount();
    else:
?>
 	<h1>Welcome!</h1>

	<img src="images/coffeecup.gif"/>


        <form method="post" action="signup.php" id="registerform">
            <div class="left">
      		 <h2>Sign up</h2>
                <label for="username">Email:</label>
                <input type="text" name="username" id="username" /><br />
                <input type="submit" name="register" id="register" value="Sign up" />
            </div>
        </form>
 
<?php
    endif;
?>

<?
    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])):
?>
 
        <p>You are currently <strong>logged in.</strong></p>
        <p><a href="/logout.php">Log out</a></p>
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
            <div class ="right">
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
           
        <form method="post" action="main.php" name="loginform" id="loginform">
            <div class="right">
       		<h2>Log-in</h2>
                <label for="username">Email</label>
                <input type="text" name="username" id="username" />
                <br /><br />
                <label for="password">Password</label>
                <input type="password" name="password" id="password" />
                <br/><br/>
                <input type="submit" name="login" id="login" value="Login" class="button" />
            </div>
        </form><br /><br />
<?php
    endif;
?>