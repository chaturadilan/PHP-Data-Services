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
<div class="raw top-bar">
	<div class="col-md-12">
		
		<h4><?php echo $id ? "Edit" : "Add"; ?> Source Type</h4>
	</div>
</div>


<?php echo $this->Form->create('MethodParam', array('class' => 'form-horizontal')); ?>

  <?php echo $this->Form->hidden('id'); ?>
  <?php echo $this -> Form -> hidden('method_id', array('value' => $this -> Session -> read('Method_id'))); ?>
  
  <div class="form-group">
    <label class="col-sm-2 control-label">Name:</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('name', array( 'disabled' => 'disabled', 'class' => 'form-control form-input', 'label' => false)); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Description:</label>
    <div class="col-sm-10">
     <?php echo $this->Form->textarea('description', array('class' => 'form-control form-input', 'label' => false, 'rows' => '5')); ?>
    </div>
  </div>
  
  
  
  <div class="form-group">
    <label class="col-sm-2 control-label">Validation Type:</label>
    <div class="col-sm-10">
  		<?php echo $this -> Form -> select('validation', array(array("none" => "None", "phone" => "Phone", "alphanumeric" => "Alpha Numeric", "numeric" => "Numeric", "url" => "URL", "email" => "Email", "custom" => "Custom")), array("empty" => false, 'label' => false)); ?>
    </div>
  </div>
  
  
   <div class="form-group" id="expressionBox">
    <label class="col-sm-2 control-label">Expression:</label>
    <div class="col-sm-10">
     <?php echo $this->Form->textarea('expression', array('class' => 'form-control form-input', 'label' => false, 'rows' => '5')); ?>
    </div>
  </div>
  
    
  <div class="form-group">
	<label class="col-sm-2 control-label">Is Required:</label>
	<div class="col-sm-10">
		<?php echo $this -> Form -> input('is_required', array('class' => 'form-control form-input', 'label' => false)); ?>
	</div>
</div>
  
  
  
  
  
 <hr>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>
  
<?php echo $this->Form->end(); ?>


<?php $this -> startIfEmpty('script'); ?>
<script>
		
	$(document).ready(function() {
		$('#expressionBox').hide();
		
		if($('#MethodParamValidation').val() == "custom"){
			$('#expressionBox').show();
		}
		
	});
	
	
	$( "#MethodParamValidation" ).change(function() {
		$('#expressionBox').hide();
		
		if($('#MethodParamValidation').val() == "custom"){
			$('#expressionBox').show();
		}
	});
	
	


</script>
<?php $this -> end(); ?>
