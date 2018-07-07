<?
session_start();
	
require_once('site_core.php');
require_once('site_forms.php');
require_once('site_db.php');

echo_head("User Login");
echo '<div class="container">';
echo '<h1>Login</h1>';





if ($_SESSION['authenticated']) {
  echo '
    <div class="alert alert-info">Already logged in</div>
    <a href="admin_logout.php" class="btn btn-primary">Logout</a>';
}
else {
    
   if ($_POST) {
              
        $userid = $_POST['userid'];
        $result = run_query("SELECT passwd FROM wj18sawy_users WHERE userid = '$userid'"); 
        $row = $result->fetch_assoc();
        $hashed_password = $row['passwd'];

        if (password_verify($_POST[passwd], $hashed_password)) {
            $_SESSION['authenticated'] = true;
            echo '<div>Password is valid!</div>';  
        }
       else {
           echo '
                    <div class="alert alert-danger" role="alert">
                        Username or password invalid. 
                        Please try again.
                    </div>';

        echo '
        <form action="login.php" method="post">
        <label>Username: <input type="text" class="form-control" name="userid"></label>
        <label>Password: <input type="password" class="form-control" name="passwd"></label>
        <input type="submit" class="btn btn-primary">	
        </form>';
        }
               
               
               
        
       
   }
   else {
    echo '
        <form action="login.php" method="post">
        <label>Username: <input type="text" class="form-control" name="userid"></label>
        <label>Password: <input type="password" class="form-control" name="passwd"></label>
        <input type="submit" class="btn btn-primary">	
        </form>';
  }
}	



echo '</div>';
echo_foot();	
?>