<?php
require_once 'core/init.php';

if (!$username = Input::get('user')) {
	Redirect::to('index.php');
} else {
	$user = new User($username);
	if (!$user->exists()) {
		Redirect::to(404);
	} else {
		$data = $user->data();
	}
	?>

	<h3><?php echo escape($data->username); ?></h3>
	<p>Full name: <?php echo escape($data->name); ?></p>

	<?php

	$profile = new Script();
	if ($profile->find($data->id)) {
		$scripts = $profile->data()->results();
		foreach ($scripts as $script) {
?>
		<div class="script">
			<h3><a href="script.php?id=<?php escape($script->id); ?>"><?php echo escape($script->title); ?></a></h3>
			<p><?php echo escape($script->date); ?></p>
			<h5></h5>
		</div>
<?php
		}
	}
}