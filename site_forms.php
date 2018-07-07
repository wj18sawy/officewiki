<?
function return_text_area($name, $label, $value='', $required=false) {
	if ($required) $req = 'required';
	else $req = '';
	return '
		  <div class="form-group">
                <label for="'.$name.'">'.$label.'</label>
                <textarea class="form-control" name="'.$name.'" id="'.$name.'" rows="10" '.$req.'>'.$value.'</textarea>
            </div>
        ';
}
/* -----------------------------------------------------------------------------
Echos return_input_text
----------------------------------------------------------------------------- */
function echo_text_area($name, $label, $value) {
	echo return_text_area($name, $label, $value);
}
	
/* -----------------------------------------------------------------------------
Returns the HTML of a labeled input text element with Bootstrap class names

Input: 
  Name of element (string)
  Text label of element (string)
  Value of element (string)
  Is the element required (boolean)
  

Output: HTML text (string)	
----------------------------------------------------------------------------- */
	
function return_input_text($name, $label, $value='', $required=false) {
	if ($required) $req = 'required';
	else $req = '';
	return '
		<div class="form-group">
			<label for="'.$name.'">'.$label.'</label>
			<input type="text" class="form-control" name="'.$name.'" id="'.$name.'" value="'.$value.'" '.$req.'>
		</div>';
}
/* -----------------------------------------------------------------------------
Echos return_input_text
----------------------------------------------------------------------------- */
function echo_input_text($name, $label, $value) {
	echo return_input_text($name, $label, $value);
}

/* -----------------------------------------------------------------------------*/


/* -----------------------------------------------------------------------------
Returns the HTML of a form for inserting rows into the pages table

Input:  Previously submitted values (associative array)
Output: HTML text (string)	
----------------------------------------------------------------------------- */
function return_page_form($values) {
   
	return '
		<form action="?action=insert" method="post">'.
			return_input_text('pageid','Page ID',$values['pageid'],true).
			return_input_text('title','Page Title',$values['title'],true).
			return_text_area('content','Page Content',$values['content']). 	
			return_input_text('parent','Parent Page',$values['parent']).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_page_form
----------------------------------------------------------------------------- */
function echo_page_form($values) {
	echo return_page_form($values);
}

/* -----------------------------------------------------------------------------
Inserts a new row into the pages table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_page($values) {
	$pageid = $values['pageid'];
	$title = $values['title'];
	$content = $values['content'];
	$parent = $values['parent'];
	$sql = "INSERT INTO wj18sawy_pages (pageid, title, content, parent) VALUES ('$pageid','$title','$content','$parent')";
	run_query($sql);
}
//-----------------------------USER FORM--------------------------

function return_user_form($values) {
   
	return '
		<form action="?action=insert" method="post">'.
			return_input_text('userid','User ID',$values['userid'],true).
            return_input_text('passwd','Password',$values['passwd'],true).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_user_form
----------------------------------------------------------------------------- */
function echo_user_form($values) {
	echo return_user_form($values);
}

/* -----------------------------------------------------------------------------
Inserts a new row into the pages table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_user($values) {
	$userid = $values['userid'];
    $passwd = $values['passwd'];
    $hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);
    $sql = "INSERT INTO wj18sawy_users (userid, passwd, type) VALUES ('$userid','$hashed_passwd','$type')";
	run_query($sql);
}

function return_aside_form($values) {
   
	return '
		<form action="?action=insert" method="post">'.
			return_input_text('asideid','Aside ID',$values['asideid'],true).
			return_input_text('title','Aside Title',$values['title'],true).
			return_text_area('content','Aside Content',$values['content']). 	
			return_input_text('color','Aside Color',$values['color']).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_page_form
----------------------------------------------------------------------------- */
function echo_aside_form($values) {
	echo return_aside_form($values);
}

/* -----------------------------------------------------------------------------
Inserts a new row into the pages table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_aside($values) {
	$asideid = $values['asideid'];
	$title = $values['title'];
	$content = $values['content'];
	$color = $values['color'];
	$sql = "INSERT INTO wj18sawy_asides (asideid, title, content, color) VALUES ('$asideid','$title','$content','$color')";
	run_query($sql);
}

function return_has_aside_form($values) {
   
	return '
		<form action="?action=insert" method="post">'.
			return_input_text('asideid','Aside ID',$values['asideid'],true).
			return_input_text('pageid','Page ID',$values['pageid'],true). 	
			return_input_text('ord','Page ord',$values['ord']).'
			<input type="submit" class="btn btn-primary" value="Submit">
			<a href="?" class="btn btn-warning">Clear</a>
		</form>';
}
/* -----------------------------------------------------------------------------
Echos return_page_form
----------------------------------------------------------------------------- */
function echo_has_aside_form($values) {
	echo return_has_aside_form($values);
}

/* -----------------------------------------------------------------------------
Inserts a new row into the pages table.

Input:  Posted values (associative array)
Output: None	
----------------------------------------------------------------------------- */
function insert_has_aside($values) {
	$asideid = $values['asideid'];
	$pageid = $values['pageid'];
	$ord = $values['ord'];
	$sql = "INSERT INTO wj18sawy_has_aside (asideid, pageid, ord) VALUES ('$asideid','$pageid','$ord')";
	run_query($sql);
}

function return_option_select($name, $list, $label='', $v='') {
	$ouput = '
	<div class="form-group">';
	
	if ($label != '')
	$ouput .= '
		<label for="'.$name.'">'.$label.'</label>';
		
	$ouput .= '		
		<select class="form-control" id="'.$name.'" name="'.$name.'">';

	foreach ($list as $id => $title) {
		$selected = '';
		if ($id == $v) $selected = 'selected';
		$ouput .= '
			<option value="'.$id.'" '.$selected.'>'.$title.'</option>';
	}
	$ouput .=  '
		</select>
	</div>';
	return $ouput;
}

	

		
?>