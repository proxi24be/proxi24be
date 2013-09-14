<div class="col-md-2">
	<select class="form-control" size='10' ng-model='dataToCollect.source_message'
            ng-options='source_message.message for source_message in db.source_messages'>
    </select>
</div>
<div class="col-md-1">
	<button class="btn btn-primary" ng-click="getTranslation(dataToCollect.source_message);">check</button>
</div>

<div class="col-md-6">
<?php
	$this->beginWidget('ext.bootstrap.table.TableWidget', 
		array(
			'ths'=> array('Language', 'Translation', 'Update'),
			'class'=> 'table',
			'id' => 'table-message-id',
		));
?>

<tr ng-repeat = 'message in db.messages'>
    <td><input type="text" value="{{message.langue}}"></td>
    <td><input type="text" value="{{message.message}}"></td>
    <td>
    	<button class='btn btn-primary' ng-click="update(message)"><span class="glyphicon glyphicon-edit"></span> edit</button>
    </td>
</tr>

<?php
	$this->endWidget();
?>
</div>