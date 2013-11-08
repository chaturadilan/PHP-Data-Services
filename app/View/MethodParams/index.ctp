<div class="raw">
	<h4>Input Params &rarr; Method: <?php $method = $this -> Session -> read('Method');
	echo $method['Method']['name'];
 ?>    &rarr; Data Collection: <?php $dataApp = $this -> Session -> read('DataCollection');
	echo $dataApp['DataCollection']['name'];
 ?>  &rarr; Data App: <?php $dataApp = $this -> Session -> read('DataApp');
	echo $dataApp['DataApp']['name'];
 ?></h4>
</div>


<div class="raw container top-bar">
	<div class="col-md-12">
		<div class="col-md-1 pull-right">			
			
		</div>
	</div>
</div>



<div class="raw">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>				
				<th>Name</th>
				<th>Description</th>
				<th>Validation Type</th>
				<th>Is Required</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>			
			 <?php foreach ($items as $item): ?>
			         <tr >						
						<td><?php echo $item['MethodParam']['name']; ?></td>
						<td><?php echo $item['MethodParam']['description']; ?></td>
						<td><?php echo $item['MethodParam']['validation']; ?></td>
						<td class="text-center"><?php echo $item['MethodParam']['is_required']? "<i class='fa fa-check'></i>":"<i class='fa fa-times'></i>"; ?></td>
						<td class="center">							
							<?php echo $this -> Html -> link('<i class="fa fa-edit"></i> Edit &nbsp;', array('action' => 'form', $item['MethodParam']['id']), array('escape' => false)); ?>
						</td>					
					</tr>
	         <?php endforeach; ?>	
			
		</tbody>	
	</table>
</div>



<div class="raw">
	<ol class="breadcrumb">	
	  <li><?php echo $this -> Html -> link('Data Apps', array('controller' => 'data_apps')); ?></li>
	   <li><?php echo $this -> Html -> link('Data Collections', array('controller' => 'data_collections')); ?></li>
	   <li><?php echo $this -> Html -> link('Methods', array('controller' => 'methods')); ?></li>
	  <li class="active">Input Params</li>
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
		$('#example').dataTable({
			"sDom" : "<'row'<'col-md-6'l><'ol-md-6'f>r>t<'row'<'span8'i><'span8'p>>"
		});
	});

	
</script>
<?php $this -> end(); ?>
