<div class="raw">
	<h4>Methods &rarr; Data Collection: <?php $dataApp = $this -> Session -> read('DataCollection');
	echo $dataApp['DataCollection']['name'];
 ?>  &rarr; Data App: <?php $dataApp = $this -> Session -> read('DataApp');
	echo $dataApp['DataApp']['name'];
 ?></h4>
</div>


<div class="raw" style="padding-top: 20px">
	<ul class="nav nav-tabs etabs">
  <li><a href="#custom-methods" data-toggle="tab">Custom Methods</a></li>
  <li><a href="#crud-methods" data-toggle="tab">CRUD Methods</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="custom-methods">
  	
  	
  	<div class="raw container top-bar" style="padding-top: 20px">
	<div class="col-md-12">
		<div class="col-md-1 pull-right">			
			<?php echo $this -> Html -> link('<i class="fa fa-plus"></i> Add', array('action' => 'form'), array('class' => 'btn btn-default', 'escape' => false)); ?>
		</div>
	</div>
</div>



<div class="raw">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="mainTable">
		<thead>
			<tr>				
				<th>Name</th>				
				<th>Description</th>
				<th>HTTP Methods</th>
				<th>Published</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>			
			 <?php foreach ($items as $item): ?>
			        <?php if($item['Method']['method_type_id'] == 5) : ?>
			         <tr >						
						<td><?php echo $item['Method']['name']; ?></td>
						<td><?php echo $item['Method']['description']; ?></td>
						<td><?php echo $item['Method']['http_methods']; ?></td>							
						<td class="text-center"><?php echo $item['Method']['is_published']? "<i class='fa fa-check'></i>":"<i class='fa fa-times'></i>"; ?></td>
						<td class="center">
							<?php echo $this -> Html -> link('<i class="fa fa-dot-circle-o"></i> Input Parameters &nbsp;', array('controller' => 'method_params', $item['Method']['id']), array('escape' => false)); ?>							
							<?php echo $this -> Html -> link('<i class="fa fa-edit"></i> Edit &nbsp;', array('action' => 'form', $item['Method']['id']), array('escape' => false)); ?>
							<?php echo $this -> Html -> link('<i class="fa fa-times"></i> Delete &nbsp;', array('action' => '#'), array('class' => 'item-delete', 'data-id' => $item['Method']['id'], 'escape' => false)); ?>
						</td>					
					</tr>
					<?php endif; ?>
	         <?php endforeach; ?>	
			
		</tbody>	
	</table>
</div>
  	
  	
  	
  	
  	
  	
  	
  	
  </div>
  <div class="tab-pane" id="crud-methods">
  	
  	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
		<thead>
			<tr>				
				<th>Table Name</th>
				<th>Create</th>
				<th>Retrieve</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>			
			 <?php foreach ($tableList as $table): ?>			 		
			         <tr >						
						<td><?php echo $table['name']; ?></td>
						<td class="text-center"><input <?php if(isset($table['create'])) echo $table['create']? "checked" : "" ?> data-collection="<?php $dataApp = $this -> Session -> read('DataCollection');
							echo $dataApp['DataCollection']['id'];
 ?>" type="checkbox" class="crud-op" data-operation="create" data-opid="1" data-table="<?php echo $table['name']; ?>"></td>	
						<td class="text-center"><input <?php if(isset($table['retrieve'])) echo $table['retrieve']? "checked" : "" ?> data-collection="<?php $dataApp = $this -> Session -> read('DataCollection');
							echo $dataApp['DataCollection']['id'];
 ?>" type="checkbox" class="crud-op" data-operation="retrieve" data-opid="2" data-table="<?php echo $table['name']; ?>"></td>	
						<td class="text-center"><input <?php if(isset($table['update'])) echo $table['update']? "checked" : "" ?> data-collection="<?php $dataApp = $this -> Session -> read('DataCollection');
							echo $dataApp['DataCollection']['id'];
 ?>" type="checkbox" class="crud-op" data-operation="update" data-opid="3" data-table="<?php echo $table['name']; ?>"></td>	
						<td class="text-center"><input <?php if(isset($table['delete'])) echo $table['delete']? "checked" : "" ?> data-collection="<?php $dataApp = $this -> Session -> read('DataCollection');
							echo $dataApp['DataCollection']['id'];
 ?>" type="checkbox" class="crud-op" data-operation="delete" data-opid="4" data-table="<?php echo $table['name']; ?>"></td>												
					</tr>
	         <?php endforeach; ?>	
			
		</tbody>	
	</table>
  	
  	
  	
  	
  	
  	
  	
  	
  </div>
  
</div>
</div>




<div class="raw">
	<ol class="breadcrumb">	
	  <li><?php echo $this -> Html -> link('Data Apps', array('controller' => 'data_apps')); ?></li>
	   <li><?php echo $this -> Html -> link('Data Collections', array('controller' => 'data_collections')); ?></li>
	  <li class="active">Methods</li>
	</ol>
</div>


<?php $this -> startIfEmpty('script'); ?>
<script>
	$(".item-delete").click(function() {
		var id = $(this).data("id");
		noty({
			text : 'Are you sure you want to delete this item?',
			buttons : [{
				addClass : 'btn btn-primary',
				text : 'Ok',
				onClick : function($noty) {
					$.ajax({
						url : "form/" + id,
						type : "delete",
						context : document.body
					}).done(function() {
						window.location.replace("");
					});
				}
			}, {
				addClass : 'btn btn-danger',
				text : 'Cancel',
				onClick : function($noty) {
					$noty.close();
				}
			}]
		});
	});

	/* Default class modification */
	$.extend($.fn.dataTableExt.oStdClasses, {
		"sSortAsc" : "header headerSortDown",
		"sSortDesc" : "header headerSortUp",
		"sSortable" : "header"
	});

	/* Table initialisation */
	$(document).ready(function() {
		$('#mainTable').dataTable({
			"sDom" : "<'row'<'col-md-6'l><'ol-md-6'f>r>t<'row'<'span8'i><'span8'p>>"
		});
	});

	$(".crud-op").click(function() {
		var collection = $(this).data("collection");
		var operation = $(this).data("operation");
		var opid = $(this).data("opid");
		var table = $(this).data("table");			
		var value = $(this).is(':checked');
		
		$.ajax({
			url : "../updateCrud/" + collection,
			type : "put",
			data: {collection: collection, operation: operation, opid: opid, table: table, value: value}
		}).done(function() {
			
		});

	});

</script>
<?php $this -> end(); ?>
