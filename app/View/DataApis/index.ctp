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
<div class="raw">
	<h4>Data APIs &rarr; Data App: <?php $dataApp =  $this->Session->read('DataApp'); echo $dataApp['DataApp']['name']; ?></h4>
</div>


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
				<th>Name</th>				
				<th>Description</th>				
				<th>Published</th>
				<th>Has WADL</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>			
			 <?php foreach ($items as $item): ?>
			         <tr >						
						<td><?php echo $item['DataApi']['name']; ?></td>						
						<td><?php echo $item['DataApi']['description']; ?></td>
						<td class="text-center"><?php echo $item['DataApi']['is_published']? "<i class='fa fa-check'></i>":"<i class='fa fa-times'></i>"; ?></td>
						<td class="text-center"><?php echo $item['DataApi']['is_haswadl']? "<i class='fa fa-check'></i>":"<i class='fa fa-times'></i>"; ?></td>
						<td class="center">
							<?php echo $this -> Html -> link('<i class="fa fa-eye"></i> Go Into &nbsp;', array('controller' => 'data_auths', $item['DataApi']['id']), array('escape' => false)); ?>							
							<?php echo $this -> Html -> link('<i class="fa fa-gavel"></i> WADL &nbsp;', '/services/wadl/' . $item['DataApp']['alias'] . '/' .$item['DataApi']['name'] , array('escape' => false, 'target' => '_blank')); ?>	
							<?php echo $this -> Html -> link('<i class="fa fa-edit"></i> Edit &nbsp;', array('action' => 'form', $item['DataApi']['id']), array('escape' => false)); ?>
							<?php echo $this -> Html -> link('<i class="fa fa-times"></i> Delete &nbsp;', array('action' => '#'), array('class' => 'item-delete', 'data-id' => $item['DataApi']['id'], 'escape' => false)); ?>
						</td>					
					</tr>
	         <?php endforeach; ?>	
			
		</tbody>	
	</table>
</div>

<div class="raw">
	<ol class="breadcrumb">	
	  <li><?php echo $this->Html->link('Data Apps',  array( 'controller' => 'data_apps')); ?></li>
	  <li class="active">Data APIs</li>
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
