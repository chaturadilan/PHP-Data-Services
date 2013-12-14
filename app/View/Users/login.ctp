<?php
/**
 * PHP REST Data Services
 * Copyright (c) Chatura Dilan Perera,(http://www.dilan.me)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Chatura Dilan Perera,(http://www.dilan.me)
 * @link          http://www.dilan.me 
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
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
