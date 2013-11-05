<div class="raw top-bar">
	<div class="col-md-12">
		
		<h4><?php echo $id ? "Edit" : "Add"; ?> Source Type</h4>
	</div>
</div>


<?php echo $this->Form->create('SourceType', array('class' => 'form-horizontal')); ?>

  <?php echo $this->Form->hidden('id'); ?>
  
  <div class="form-group">
    <label class="col-sm-2 control-label">Name:</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('name', array('class' => 'form-control form-input', 'label' => false)); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Description:</label>
    <div class="col-sm-10">
     <?php echo $this->Form->textarea('description', array('class' => 'form-control form-input', 'label' => false)); ?>
    </div>
  </div>
  
   <div class="form-group">
    <label class="col-sm-2 control-label">Init Params:</label>
    <div class="col-sm-10">
     <?php echo $this->Form->textarea('init_params', array('class' => 'form-control form-input', 'label' => false, 'rows' => '10')); ?>
    </div>
  </div>
  
  
  
  
 <hr>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>
  
<?php echo $this->Form->end(); ?>

