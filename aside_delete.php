<?

session_start();

require_once('site_core.php');
require_once('site_forms.php');
require_once('site_db.php');

if (!$_SESSION['authenticated'] || !$_SESSION['admin']) die ('Admin only, access denied');
// Set the title of the page
$title = "Delete Aside";

echo_head($title);

echo '
	<div class="container">
		<h2>'.$title.'</h2>';
		

$id = $_GET['id'];
$action = $_GET['action'];

if ($id == '') {
		
    $result = run_query("SELECT asideid, title FROM wj18sawy_asides");

    $asides=array();
    while ($row = $result->fetch_assoc())
    {
        $asides[ $row['asideid']] = $row['title'];
    }
    
    
    echo
	   '<form method="get" action="aside_delete.php">'.
		  return_option_select('id', $asides, 'Select an aside').'
		  <input type="submit">
	   </form>';

}
else if ($action=='delete') {

	$sql = "DELETE FROM wj18sawy_asides WHERE asideid='$id'";
    run_query($sql);

	// $sql = "DELETE FROM has_aside WHERE asideid='$aid' AND pageid='$pid'";
	
	echo '<p><b>'.$id.'</b> was deleted from asides</p>';
    echo     '<a class="btn btn-info pull-right" href="control_panel.php?table=wj18sawy_pages'.$value.'">Control Panel</a>';

}
else {		
	echo '
		<p>Are you sure you want to delete <b>'.$id.'</b> from asides?</p>
		<p>
			<a href="aside_delete.php?action=delete&id='.$id.'" class="btn btn-danger">Yes</a>
		</p>';
}

echo '</div>';

echo_foot();

?>