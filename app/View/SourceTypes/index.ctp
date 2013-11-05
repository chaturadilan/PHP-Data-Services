<div class="raw container top-bar">
	<div class="col-md-12">
		<div class="col-md-1 pull-right">			
			<?php echo $this -> Html -> link('<i class="fa fa-plus"></i> Add', array('action' => 'form'), array('class' => 'btn btn-default', 'escape' => false)); ?>
		</div>
	</div>
</div>



<div class="raw">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Init Params</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>			
			 <?php foreach ($items as $item): ?>
			         <tr >
						<td><?php echo $item['SourceType']['id']; ?></td>
						<td><?php echo $item['SourceType']['name']; ?></td>
						<td><?php echo $item['SourceType']['description']; ?></td>
						<td><?php echo $item['SourceType']['init_params']; ?></td>
						<td class="center">							
							<?php echo $this -> Html -> link('<i class="fa fa-edit"></i> Edit &nbsp;', array('action' => 'form', $item['SourceType']['id']), array('escape' => false)); ?>
							<?php echo $this -> Html -> link('<i class="fa fa-times"></i> Delete &nbsp;', array('action' => '#'), array('class' => 'item-delete', 'data-id' => $item['SourceType']['id'], 'escape' => false)); ?>
						</td>					
					</tr>
	         <?php endforeach; ?>	
			
		</tbody>	
	</table>
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
