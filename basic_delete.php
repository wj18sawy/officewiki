<?
session_start();
require_once('site_core.php');
require_once('site_forms.php');
require_once('site_db.php');

// Set the title of the page
$title = "Delete Page";

echo_head($title);

echo '
	<div class="container">
		<h2>'.$title.'</h2>';
		

$id = $_GET['id'];
$action = $_GET['action'];

if ($id == '') {
		
    $result = run_query("SELECT pageid, title FROM wj18sawy_pages");

    $pages=array();
    while ($row = $result->fetch_assoc())
    {
        $pages[ $row['pageid']] = $row['title'];
    }
    

    echo
	   '<form method="get" action="basic_delete.php">'.
		  return_option_select('id', $pages, 'Select a page').'
		  <input type="submit">
	   </form>';

}
else if ($action=='delete') {
	$sql = "DELETE FROM wj18sawy_pages WHERE pageid='$id'";
	run_query($sql);

	//$sql = "DELETE FROM asides WHERE asideid='$id'";
	// $sql = "DELETE FROM has_aside WHERE asideid='$aid' AND pageid='$pid'";
	
	echo '<p><b>'.$id.'</b> was deleted from pages</p>';
        echo     '<a class="btn btn-info pull-right" href="control_panel.php?table=wj18sawy_pages'.$value.'">Control Panel</a>';

}
else {		
	echo '
		<p>Are you sure you want to delete <b>'.$id.'</b> from pages?</p>
		<p>
			<a href="basic_delete.php?action=delete&id='.$id.'" class="btn btn-danger">Yes</a>
		</p>';
}

echo '</div>';

echo_foot();

?>