<div class="raw top-bar">
	<div class="col-md-12">

		<h4><?php echo $id ? "Edit" : "Add"; ?>
		Auth</h4>
	</div>
</div>
<?php echo $this -> Form -> create('DataAuth', array('class' => 'form-horizontal')); ?>

<?php echo $this -> Form -> hidden('id'); ?>

 <div class="form-group">
    <label class="col-sm-2 control-label">Auth Type:</label>
    <div class="col-sm-10">
  		<?php echo $this -> Form -> select('auth_type', array(array("private" => "Private", "public" => "Public", "secret" => "Secret", "social" => "Social")), array("empty" => false, 'label' => false)); ?>
    </div>
  </div>
  
 <div id="secretbox">
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Secret:</label>
	    <div class="col-sm-10">
	      <?php echo $this->Form->input('secret', array('class' => 'form-control form-input', 'label' => false)); ?>
	    </div>
	  </div>
 </div>  
  
<div id="socalbox"> 
   <div class="form-group">
    <label class="col-sm-2 control-label">Auth App:</label>
    <div class="col-sm-10">
  		<?php echo $this -> Form -> select('auth_app', array($authApps), array("empty" => false, 'label' => false)); ?>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-2 control-label">Identifier:</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('identifier', array('class' => 'form-control form-input', 'label' => false)); ?>
    </div>
  </div>
</div>  


<hr>
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-default">
			Save
		</button>
	</div>
</div>

<?php echo $this -> Form -> end(); ?>

<?php $this -> startIfEmpty('script'); ?>
<script>
	
	$(document).ready(function() {
		$('#socalbox').hide();
		$('#secretbox').hide();
		
		if($('#DataAuthAuthType').val() == "social"){
			$('#socalbox').show();
		}
		
		if($('#DataAuthAuthType').val() == "secret"){
			$('#secretbox').show();
		}
		
	});
	
	
	$( "#DataAuthAuthType" ).change(function() {
		$('#socalbox').hide();
		$('#secretbox').hide();
		
		if($('#DataAuthAuthType').val() == "social"){
			$('#socalbox').show();
		}
		
		if($('#DataAuthAuthType').val() == "secret"){
			$('#secretbox').show();
		}
	});
	
	
</script>
<?php $this -> end(); ?>

