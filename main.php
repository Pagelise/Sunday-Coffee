<?php
    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])):
  	include_once 'maintenance.php';

else:
	include_once 'login.php';               

endif; ?>