<div class="account-wall">
	<h3 class="text-center">PHP Data Services - Sign in</h3>
	<?php echo $this -> Html -> image('login-man.png', array('alt' => 'Login', "class" => "profile-img")); ?>
	<?php echo $this -> Form -> create('User', array("class" => "form-signin")); ?>
	<?php echo $this -> Form -> input('username', array("placeholder" => "Username", "label" => false, "class" => "form-control")); ?>
	<?php echo $this -> Form -> input('password', array("placeholder" => "Password", "label" => false, "class" => "form-control")); ?>
	<button type="submit" class="btn btn-lg btn-primary btn-block">
		Sign in
	</button>
	<?php echo $this -> Form -> end(); ?>
</div>
