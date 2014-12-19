<?php 
require_once 'core/init.php';

if (Input::exists()) {
	if (Token::check(Input::get('token'))) {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'title' => array(
				'min' => 5,
				'max' => 50
			),
			'content' => array(
				'min' => 15,
				'max' => 20000
			)
		));

		if ($validation->passed()) {
			$script = new Script();

			$author = new User();
			$author_id = $author->data()->id;
			
			try {
				$script->create(array(
					'title' => Input::get('title'),
					'author' => $author_id,
					'content' => Input::get('content'),
					'date' => date('Y-m-d H:i:s')
				));
				Redirect::to('index.php');
			} catch (Exception $e) {
				die($e->getMessage());
			}
		} else {
			foreach ($validation->errors() as $error) {
				echo $error, '<br>';
			}
		}
	}
}

?>

<form action="" method="post">
	<div class="field">
		<label for="title">Title</label>
		<input type="text" name="title" id="title" autocomplete="off">
	</div>
	<div class="field">
		<label for="content">Content</label>
		<textarea name="content" id="content" cols="30" rows="10"></textarea>
	</div>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" value="Create">
</form>