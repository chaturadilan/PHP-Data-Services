<div class="raw top-bar">
	<div class="col-md-12">

		<h4><?php echo $id ? "Edit" : "Add"; ?>
		Method</h4>
	</div>
</div>
<?php echo $this -> Form -> create('Method', array('class' => 'form-horizontal')); ?>

<?php echo $this -> Form -> hidden('id'); ?>
<?php echo $this -> Form -> hidden('data_collection_id', array('value' => $this -> Session -> read('DataCollection_id'))); ?>
<?php echo $this -> Form -> hidden('method_type_id', array('value' => 5)); ?>

<div class="form-group">
	<label class="col-sm-2 control-label">Name:</label>
	<div class="col-sm-10">
		<?php echo $this -> Form -> input('name', array('class' => 'form-control form-input', 'label' => false)); ?>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Alias:</label>
	<div class="col-sm-10">
		<?php echo $this -> Form -> input('alias', array('class' => 'form-control form-input', 'label' => false)); ?>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Description:</label>
	<div class="col-sm-10">
		<?php echo $this -> Form -> textarea('description', array('class' => 'form-control form-input', 'label' => false, 'rows' => '3')); ?>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Command:</label>
	<div class="col-sm-10">
		<?php echo $this -> Form -> textarea('command', array('class' => 'form-control form-input', 'label' => false, 'rows' => '8')); ?>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">HTTP Methods:</label>
	<div class="col-sm-10">	
		<?php echo $this -> Form -> select('http_methods', array('options' => array("GET" => "GET", "POST" => "POST", "PUT" => "PUT", "DELETE" => "DELETE")), array(  'multiple'=> 'multiple', 'class' => 'form-control form-input', 'label' => false)); ?>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Published:</label>
	<div class="col-sm-10">
		<?php echo $this -> Form -> input('is_published', array('class' => 'form-control form-input', 'label' => false)); ?>
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
<script>var demo1 = $('[name="data[Method][http_methods][]"]').bootstrapDualListbox();</script>
<?php $this -> end(); ?>

