<div class="raw top-bar">
	<div class="col-md-12">
		
		<h4><?php echo $id ? "Edit" : "Add"; ?> Data Collection</h4>
	</div>
</div>


<?php echo $this->Form->create('DataCollection', array('class' => 'form-horizontal')); ?>

  <?php echo $this->Form->hidden('id'); ?>
  <?php echo $this->Form->hidden('data_app_id', array('value' => $this->Session->read('DataApp_id'))); ?>
  
  <div class="form-group">
    <label class="col-sm-2 control-label">Name:</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('name', array('class' => 'form-control form-input', 'label' => false)); ?>
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-2 control-label">Alias:</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('alias', array('class' => 'form-control form-input', 'label' => false)); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Description:</label>
    <div class="col-sm-10">
     <?php echo $this->Form->textarea('description', array('class' => 'form-control form-input', 'label' => false, 'rows' => '5')); ?>
    </div>
  </div>
  
   <div class="form-group">
    <label class="col-sm-2 control-label">Data Provider:</label>
    <div class="col-sm-10">
     <?php echo $this -> Form -> input('data_provider_id', array('class' => 'form-control form-input', 'label' => false, 'div' => false, 'style' => 'width: 30%; display: inline')); ?>
    </div>
  </div>
  
  
  
  
 <hr>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>
  
<?php echo $this->Form->end(); ?>

