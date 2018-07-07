<?
session_start();
require_once('site_core.php');
require_once('site_forms.php');
require_once('site_db.php');

// Set the title of the page
$title = "Update Has Aside";

// Echo the HTML head with title
echo_head($title);

// Echo Bootstrap container 
echo '
	<div class="container">
		<h2>'.$title.'</h2>';
		

// Get the page id and action
$aid = $_GET['aid'];
$pid = $_GET['pid'];
$action = $_GET['action'];

// If the id is null/blank
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
// If action is update
else if ($action=='update') {
    
	// Get the posted form data
	$ord = $_POST['ord'];
	
	
	// Form the query
	$sql = "UPDATE wj18sawy_has_aside SET ord = '$ord' WHERE pageid='$pid' AND  asideid='$aid'";

	// Run the query
	run_query($sql);
	
	// Echo feedback
	echo '<p><b>'.$pid.'</b> - <b>'.$aid.'</b> was updated from wj18sawy_has_asides</p>';
        echo     '<a class="btn btn-info pull-right" href="control_panel.php?table=wj18sawy_pages'.$value.'">Control Panel</a>';

}

// If the id is given but action is not update
else {
    
	
	
	// Get the data for the selected page
	$result = run_query("SELECT * FROM wj18sawy_has_aside WHERE asideid='$aid' AND pageid='$pid'");
	$values = $result->fetch_assoc();
	
	
	// Ouput the edit form
	echo '
		<form action="has_aside_update.php?action=update&aid='.$aid.'&pid='.$pid.'" method="post">
			<label>Aside ID: </label> <b>'.$aid.'</b><br>'.
			return_input_text('ord','Order',$values['ord'],true).'
			<input type="submit" class="btn btn-primary" value="Update">
		</form>';	
}

echo '</div>';

echo_foot();

?>