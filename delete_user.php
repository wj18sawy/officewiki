<?
session_start();
require_once('site_core.php');
require_once('site_forms.php');
require_once('site_db.php');

// Set the title of the user
$title = "Delete User";

echo_head($title);

echo '
	<div class="container">
		<h2>'.$title.'</h2>';
		

$id = $_GET['id'];
$action = $_GET['action'];

if ($id == '') {
		
    $result = run_query("SELECT userid FROM wj18sawy_users");

    $users=array();
    while ($row = $result->fetch_assoc())
    {
        $users[ $row['userid']] = $row['userid'];
    }
    

    echo
	   '<form method="get" action="delete_user.php">'.
		  return_option_select('id', $users, 'Select a user').'
		  <input type="submit">
	   </form>';

}
else if ($action=='delete') {
	$sql = "DELETE FROM wj18sawy_users WHERE userid='$id'";
	run_query($sql);
	
	echo '<p><b>'.$id.'</b> was deleted from users</p>';
        echo     '<a class="btn btn-info pull-right" href="control_panel.php?table=wj18sawy_pages">Control Panel</a>';

}
else {		
	echo '
		<p>Are you sure you want to delete <b>'.$id.'</b> from users?</p>
		<p>
			<a href="delete_user.php?action=delete&id='.$id.'" class="btn btn-danger">Yes</a>
		</p>';
}

echo '</div>';

echo_foot();

?>