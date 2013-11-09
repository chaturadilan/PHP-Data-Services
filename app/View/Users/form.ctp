<div class="raw top-bar">
	<div class="col-md-12">
		
		<h4><?php echo $id ? "Edit" : "Add"; ?> Source Type</h4>
	</div>
</div>


<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>

  <?php echo $this->Form->hidden('id'); ?>
  <?php echo $this -> Form -> hidden('role', array('value' => 'admin')); ?>
  
  <div class="form-group">
    <label class="col-sm-2 control-label">Username:</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('username', array('class' => 'form-control form-input', 'label' => false)); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-10">
      <?php echo $this->Form->password('password', array('class' => 'form-control form-input', 'label' => false)); ?>
    </div>
  </div>
  
  
 <hr>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>
  
<?php echo $this->Form->end(); ?>

