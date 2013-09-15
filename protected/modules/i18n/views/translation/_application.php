<div class="col-md-2">
	<select class="form-control" size='10' ng-model='data_to_collect.source_message'
            ng-options='source_message.message for source_message in db.source_messages'>
    </select>
</div>
<div class="col-md-1">
	<button class="btn btn-primary" ng-click="getTranslation(data_to_collect.source_message);">check</button>
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
<tr>
    <td>
    	<select ng-model="data_to_collect.new_message" 
    	ng-options="language.language for language in db.languages">
    	</select>
	</td>
    <td><input type="text" value="" ng-model="data_to_collect.new_message.translation" placeholder="translation"></td>
    <td>
    	<button class='btn btn-primary' ng-click="createMessage(data_to_collect.new_message, data_to_collect.source_message)"><span class="glyphicon glyphicon-plus"></span> add</button>
    </td>
</tr>
<tr ng-repeat = 'message in db.messages'>
    <td><input type="text" value="{{message.language}}"></td>
    <td><input type="text" value="{{message.translation}}"></td>
    <td>
    	<button class='btn btn-warning' ng-click="update(message)"><span class="glyphicon glyphicon-edit"></span> edit</button>
    </td>
</tr>

<?php
	$this->endWidget();
?>
</div>