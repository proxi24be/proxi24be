<div class="container">
	<div class="row">
		<div class="col-md-5 col-md-offset-2">
<?php
	$this->beginWidget('ext.bootstrap.table.TableWidget', 
		array(
			'ths'=> array('id' ,'category', 'message', 'action'),
			'class'=> 'table',
			'id' => 'table-message-id',
		));
?>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td><button class='btn btn-info' ng-click='create(dataToCollect.new_message)'><span class="glyphicon glyphicon-plus"></span> add</button></td>
</tr>

<?php
	$this->endWidget();
?>
		</div>
	</div>
</div>