<div class="col-md-6 col-xs-1">
<div class="flash-message"></div>
<?php
	$this->beginWidget('ext.bootstrap.table.TableWidget', 
		array(
			'ths'=> array('Category', 'Message', 'Edit', 'Delete'),
			'class'=> 'table',
			'id' => 'table-source-message-id',
		));
?>
<tr>
<td><input type="text" name="category" ng-model="new_source_message.category" placeholder="category"></td>
<td><input type="text" name="message" ng-model="new_source_message.message" placeholder="message"></td>
<td><button class='btn btn-primary' ng-click="create(new_source_message)">
        <span class="glyphicon glyphicon-plus"></span> add</button></td>
</tr>

<tr ng-repeat = 'source_message in db.source_messages'>
    <td>{{source_message.category}}</td>
    <td>{{source_message.message}}</td>
    <td>
    	<button class='btn btn-warning' ng-click="update(source_message)"><span class="glyphicon glyphicon-edit"></span> edit</button>
    </td>
    <td>
    	<button class='btn btn-danger' ng-click="delete(source_message)"><span class="glyphicon glyphicon-minus"></span> delete</button>
    </td>
</tr>

<?php
	$this->endWidget();
?>
</div>