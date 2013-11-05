<div class="raw top-bar">
	<div class="col-md-12">

		<h4><?php echo $id ? "Edit" : "Add"; ?>
		Data Provider</h4>
	</div>
</div>

<?php echo $this -> Form -> create('DataProvider', array('class' => 'form-horizontal')); ?>

<?php echo $this -> Form -> hidden('id'); ?>

<div class="form-group">
	<label class="col-sm-2 control-label">Name:</label>
	<div class="col-sm-10">
		<?php echo $this -> Form -> input('name', array('class' => 'form-control form-input', 'label' => false)); ?>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Description:</label>
	<div class="col-sm-10">
		<?php echo $this -> Form -> textarea('description', array('class' => 'form-control form-input', 'label' => false, 'rows' => '5')); ?>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Provider Source Type:</label>
	<div class="col-sm-10">
		<?php echo $this -> Form -> input('source_type_id', array('class' => 'form-control form-input', 'label' => false, 'div' => false, 'style' => 'width: 30%; display: inline')); ?>
		<a href="#" class="btn btn-default" id="btn_init_params">Load Init Params</a>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Params:</label>
	<div class="col-sm-10">
		<?php echo $this -> Form -> textarea('params', array('class' => 'form-control form-input', 'label' => false, 'rows' => '10')); ?>
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
	$("#btn_init_params").click(function() {
		var sourceType = $('#DataProviderSourceTypeId').val();
		$.ajax({
			url : "find_source_by_id/" + sourceType,			
		}).done(function(data) {			
			data = JSON.parse(data);			
			$("#DataProviderParams").val(data.SourceType.init_params);			
		});
	});

</script>
<?php $this -> end(); ?>

