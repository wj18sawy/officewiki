<?
session_start();

require_once('site_core.php');
require_once('site_forms.php');
require_once('site_db.php');

// Set the title of the page
$title = "Update Aside";

// Echo the HTML head with title
echo_head($title);

// Echo Bootstrap container 
echo '
	<div class="container">
		<h2>'.$title.'</h2>';
		

// Get the page id and action
$id = $_GET['id'];
$action = $_GET['action'];

// If the id is null/blank
if ($id == '') {
	
	// Get the pageid and title of all pages
	$result = run_query("SELECT asideid, title FROM wj18sawy_asides");
	
	// Transform it into an associative array
	$asides = array();
	while ($row = $result->fetch_assoc()) {
		$asides[ $row['asideid'] ] = $row['title'];
	}
	
	// Generate a dropdown menu of all the pages
	echo '
		<form method="get" action="aside_update.php">'.
			return_option_select('id',$asides,'Select an aside').'
			<input type="submit">
		</form>';
}
// If action is update
else if ($action=='update') {
    
	// Get the posted form data
	$title = $_POST['title'];
	$content = addslashes($_POST['content']);
	$color = $_POST['color'];
	
	// Form the query
	$sql = "UPDATE wj18sawy_asides SET title = '$title', content = '$content', color = '$color' WHERE asideid='$id'";

	// Run the query
	run_query($sql);
	
	// Echo feedback
	echo '
		<p><a href="index.php?asideid='.$id.'">'.$id.'</a> was updated from wj18sawy_asides</p>';
        echo     '<a class="btn btn-info pull-right" href="control_panel.php?table=wj18sawy_pages'.$value.'">Control Panel</a>';

}

// If the id is given but action is not update
else {
    
	
	
	
	// Get the data for the selected page
	$result = run_query("SELECT * FROM wj18sawy_asides WHERE asideid='$id'");
	$values = $result->fetch_assoc();
	
	
	// Ouput the edit form
	echo '
		<form action="aside_update.php?action=update&id='.$id.'" method="post">
			<label>Aside ID: </label> <b>'.$id.'</b><br>'.
			return_input_text('title','Aside Title',$values['title'],true).
			return_text_area('content','Aside Content',$values['content']). 	
			return_input_text('color','Aside color',$values['color']).'
			<input type="submit" class="btn btn-primary" value="Update">
		</form>';	
}

echo '</div>';

echo_foot();

?>