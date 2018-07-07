<?
	
session_start();

require_once('site_forms.php');
require_once('site_core.php');
require_once('site_db.php');

if (!$_SESSION['authenticated']) 
{
        echo '<a class="btn btn-info float-right" href="/project3/admin_login.php">Login </a>';

    die ("Access denied");

}


// Set the title of the page
$title = "Control Panel";

echo_head($title);



echo '
	<div class="container">
		<h1>'.$title.'</h1>
                <a class="btn btn-info float-right" href="/project3/?">Home Page</a>
                <a class="btn btn-dark float-right" href="/project3/admin_logout.php">Logout</a>
        <h3>Pages</h3>'
;


// Get the column info first
$table = $_GET['table'];
$result = run_query("SHOW COLUMNS FROM $table");

// Output the column titles
echo '<table class="table">';
echo '<tr>';
echo '<th> actions <a class="btn btn-success" href="insert_page.php">New Page</a>
</th>';

while ($row = $result->fetch_row()) {
	echo '<th>'.$row[0]."</th>";
}
echo '</tr>';

$result->close();

// Get all the rows of data
$result = run_query("SELECT * FROM $table");

// Fetch each row one at a time
while ($row = $result->fetch_row()) {
	echo '<tr>';
    
    
    echo '<td>
        
            <a class="btn btn-primary float-left" href="basic_update.php?id='.$row[0].'">Update</a>
            <a class="btn btn-danger float-left" href="basic_delete.php?id='.$row[0].'">Delete</a></td>';
	
	// Loops for each column in a row
    $a = 0;
	foreach ($row as $value) {
        //echo '<a class="btn btn-primary float-left" href="basic_update.php?id='.$value.'">Update Page</a>';
        
            echo '<td>'.$value.'</td>';
        
	}
	echo '</tr>';
}
echo '</table>';

$result->close();

echo '</div>';

//-----------------------------------------------------------Asides----------------------------------------------------------------

echo '<div class="container">
<h3>Asides</h3>';
// Get the column info first
$result = run_query("SHOW COLUMNS FROM wj18sawy_asides");

// Output the column titles
echo '<table class="table">';
echo '<tr>';
echo '<th> actions <a class="btn btn-success" href="insert_aside.php">New Aside</a>
</th>';


while ($row = $result->fetch_row()) {
	echo '<th>'.$row[0]."</th>";
}
echo '</tr>';

$result->close();

// Get all the rows of data
$result = run_query("SELECT * FROM wj18sawy_asides");

// Fetch each row one at a time
while ($row = $result->fetch_row()) {
	echo '<tr>';
    
    
    echo '<td>
        
            <a class="btn btn-primary float-left" href="aside_update.php?id='.$row[0].'">Update</a>
            <a class="btn btn-danger float-left" href="aside_delete.php?id='.$row[0].'">Delete</a></td>';
	
	// Loops for each column in a row
    $a = 0;
	foreach ($row as $value) {
        //echo '<a class="btn btn-primary float-left" href="basic_update.php?id='.$value.'">Update Page</a>';
        
            echo '<td>'.$value.'</td>';
        
	}
	echo '</tr>';
}
echo '</table>';

$result->close();

echo '</div>';

//-----------------------------------------------------------Has Asides----------------------------------------------------------------

echo '<div class="container">
<h3>Has Asides</h3>';
// Get the column info first
$result = run_query("SHOW COLUMNS FROM wj18sawy_has_aside");

// Output the column titles
echo '<table class="table">';
echo '<tr>';
echo '<th> actions <a class="btn btn-success" href="insert_has_aside.php">New Has Aside</a>
</th>';


while ($row = $result->fetch_row()) {
	echo '<th>'.$row[0]."</th>";
}
echo '</tr>';

$result->close();

// Get all the rows of data
$result = run_query("SELECT * FROM wj18sawy_has_aside");

// Fetch each row one at a time
while ($row = $result->fetch_row()) {
	echo '<tr>';
    
    
    echo '<td>
        
            <a class="btn btn-primary float-left" href="has_aside_update.php?aid='.$row[1].'&pid='.$row[0].'">Update</a>
            <a class="btn btn-danger float-left" href="has_aside_delete.php?aid='.$row[1].'&pid='.$row[0].'">Delete</a></td>';
	
	// Loops for each column in a row
    $a = 0;
	foreach ($row as $value) {
        //echo '<a class="btn btn-primary float-left" href="basic_update.php?id='.$value.'">Update Page</a>';
        
            echo '<td>'.$value.'</td>';
        
	}
	echo '</tr>';
}
echo '</table>';

$result->close();

echo '</div>';

//-----------------------------------------------------------Users----------------------------------------------------------------

echo '<div class="container">
<h3>Users</h3>';
// Get the column info first
$result = run_query("SHOW COLUMNS FROM wj18sawy_users");

// Output the column titles
echo '<table class="table">';
echo '<tr>';
echo '<th> actions <a class="btn btn-success" href="insert_user.php">New user</a>
</th>';


while ($row = $result->fetch_row()) {
	echo '<th>'.$row[0]."</th>";
}
echo '</tr>';

$result->close();

// Get all the rows of data
$result = run_query("SELECT * FROM wj18sawy_users");

// Fetch each row one at a time
while ($row = $result->fetch_row()) {
	echo '<tr>';
    
    
    echo '<td>
        
            <a class="btn btn-primary float-left" href="user_update.php?id='.$row[0].'">Update</a>
            <a class="btn btn-danger float-left" href="delete_user.php?id='.$row[0].'">Delete</a></td>';
	
	// Loops for each column in a row
    $a = 0;
	foreach ($row as $value) {
        //echo '<a class="btn btn-primary float-left" href="basic_update.php?id='.$value.'">Update Page</a>';
        
            echo '<td>'.$value.'</td>';
        
	}
	echo '</tr>';
}
echo '</table>';

$result->close();

echo '</div>';

echo_foot();

?>