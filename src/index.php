<?php 
require_once 'core/init.php';
include 'includes/header.php';

if (Session::exists('home')) {
	echo "<p>" . Session::flash('home') . "</p>";
}

$user = new User(); // current
if ($user->isLoggedIn()) {
?>
	<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>
	<ul>
		<li><a href="logout.php">Log out</a></li>
		<li><a href="update.php">Update details</a></li>
		<li><a href="changepassword.php">Change password</a></li>
		<li><a href="newscript.php">Create post</a></li>
	</ul>

<?php 

	if ($user->hasPermission('admin')) {
		echo '<p>You are an administrator!</p>';
	}
} else {
	echo "<p>You need to <a href='login.php'>log in</a> or <a href='register.php'>register</a></p>";
}

$blog = new Script();
if ($blog->find_all()) {
	$scripts = $blog->data()->results();
	foreach ($scripts as $script) {
		// get author
?>
	<div class="script">
		<h3><a href="script.php?id=<?php echo escape($script->id); ?>"><?php echo escape($script->title); ?></a></h3>
		<h5><?php echo escape($script->date); ?></h5>
	</div>

<?php
	}
}

include 'includes/footer.php';