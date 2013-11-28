<!DOCTYPE html>
<html>
	<head>
		<title>PHP Data Services</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<?php echo $this->Html->css('bst/css/bootstrap.min.css', array('media' => 'screen')); ?>
		<?php echo $this->Html->css('bst/css/bootstrap-theme.css', array('media' => 'screen')); ?>
		<?php echo $this->Html->css('fnta/css/font-awesome.min.css', array('media' => 'screen')); ?>
		<?php echo $this->Html->css('dlist/bootstrap-duallistbox.css', array('media' => 'screen')); ?>
		
		<?php echo $this->Html->css('styles.css', array('media' => 'screen')); ?>
				
	</head>
	<body>

		<header>

			<nav class="navbar navbar-default navbar-inverse" role="navigation">				
				<div class="navbar-header">					
					<a class="navbar-brand" href="#">PHP Data Services</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					
					<?php if($this->Session->read('Auth.User.role')) : ?>
					<ul class="nav navbar-nav">
												
						<li class="<?php echo $this->params['controller'] == "data_apps"? "active" : "" ?>">						
							<?php echo $this->Html->link('Data Apps',  array( 'controller' => 'data_apps',  'action' => 'index'),  array('escape' => false)); ?>
						</li>
						<li class="<?php echo $this->params['controller'] == "data_providers"? "active" : "" ?>">
							<?php echo $this->Html->link('Data Providers',  array( 'controller' => 'data_providers',  'action' => 'index'),  array('escape' => false)); ?>
						</li>		
						<li class="<?php echo $this->params['controller'] == "users"? "active" : "" ?>">						
							<?php echo $this->Html->link('Users',  array( 'controller' => 'users',  'action' => 'index'),  array('escape' => false)); ?>
						</li>
						<li class="<?php echo $this->params['controller'] == "source_types"? "active" : "" ?>">						
							<?php //echo $this->Html->link('Source Types',  array( 'controller' => 'source_types',  'action' => 'index'),  array('escape' => false)); ?>
						</li>
									
					</ul>	
					
					
					<ul class="nav navbar-nav navbar-right">
					      <li><?php echo $this->Html->link('Logout',  array( 'controller' => 'users',  'action' => 'logout'),  array('escape' => false)); ?></li>					     
					 </ul>
					<?php endif; ?>
									
			</nav>

		</header>
		<div class="container">
			<?php echo $this->fetch('content'); ?>
		</div>
		
		<footer>
			<div class="raw text-center">
				Copyright &copy; 2013-<?php echo date("Y"); ?> <a href="https://github.com/chaturadilan">chaturadilan</a>
			</div>
		</footer>
		
		<?php echo $this->Html->script('jqe/jquery.min.js'); ?>
		<?php echo $this->Html->script('bst/js/bootstrap.min.js'); ?>
		<?php echo $this->Html->script('datat/jquery.dataTables.min.js'); ?>
		<?php echo $this->Html->script('datat/bt.datatables.js'); ?>
		<?php echo $this->Html->script('dlist/jquery.bootstrap-duallistbox.js'); ?>
		
		<?php echo $this->Html->script('noty/jquery.noty.js'); ?>
		<?php echo $this->Html->script('noty/layouts/center.js'); ?>
		<?php echo $this->Html->script('noty/themes/default.js'); ?>
		
		
		
	
		<?php echo $this->Html->script('common.js'); ?>
		<?php echo $this->fetch('script'); ?>
		
	</body>
</html>