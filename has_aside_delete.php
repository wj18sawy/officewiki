<?
session_start();
require_once('site_core.php');
require_once('site_forms.php');
require_once('site_db.php');

// Set the title of the page
$title = "Delete Has Aside";

echo_head($title);

echo '
	<div class="container">
		<h2>'.$title.'</h2>';
		

$aid = $_GET['aid'];
$pid = $_GET['pid'];
$action = $_GET['action'];

if ($pid == '' || $aid == '') {
		
    $result = run_query("SELECT asideid FROM wj18sawy_has_aside");
    $asides=array();
    while ($row = $result->fetch_assoc()) {
        $asides[$row['asideid']] = $row['asideid'] ;  
    }
    
    $result = run_query("SELECT pageid FROM wj18sawy_has_aside");
    $pages=array();
    while ($row = $result->fetch_assoc()) {
        $pages[$row['pageid']] = $row['pageid'] ;  
    }
        
    
    echo
	   '<form method="get" action="has_aside_delete.php">'.
		  return_option_select('aid', $asides, 'Select a aside').
		  return_option_select('pid', $pages, 'Select a page').'
		  <input type="submit">
	   </form>';

}
else if ($action=='delete') {
    
	$sql = "DELETE FROM wj18sawy_has_aside WHERE pageid='$pid' AND  asideid='$aid'";
    run_query($sql);

	// $sql = "DELETE FROM has_aside WHERE asideid='$aid' AND pageid='$pid'";
	
	echo '<p><b>'.$pid.'</b> - <b>'.$aid.'</b> was deleted from has_asides</p>';
    echo     '<a class="btn btn-info pull-right" href="control_panel.php?table=wj18sawy_pages">Control Panel</a>';

}
		//<p>Are you sure you want to delete the has aside with page <b>'.$pid.'</b> and <b>'.$aid.'</b>?</p>

else {		
	echo '
       <p>Are you sure you want to delete <b>'.$pid.'</b> - <b>'.$aid.'</b></p>

		<p>
			<a href="has_aside_delete.php?action=delete&pid='.$pid.'&aid='.$aid.'" class="btn btn-danger">Yes</a>
		</p>';
}

echo '</div>';

echo_foot();

?>