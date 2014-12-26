<?php 
require_once 'core/init.php';
include 'includes/header.php';

if (!$script_id = Input::get('id')) {
	Redirect::to('index.php');
} else {
	$script = new Script($script_id);
	if (!$script->exists()) {
		Redirect::to(404);
	} else {
		$script->delete($script_id);
		Redirect::to('index.php');
	}
}

include 'includes/footer.php';