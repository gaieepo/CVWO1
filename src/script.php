<?php 
require_once 'core/init.php';

if (!$script_id = Input::get('id')) {
	Redirect::to('index.php');
} else {
	$script = new Script($script_id);
	if (!$script->exists()) {
		Redirect::to(404);
	} else {
		$the_script = $script->data();
?>
		<h1><?php echo escape($the_script->title); ?></h1>
		<h5><?php echo escape($the_script->author); ?></h5>
		<h5><?php echo escape($the_script->date); ?></h5>
		<p><?php echo escape($the_script->content); ?></p>

<?php
		
	// delete post

	}
}

 ?>