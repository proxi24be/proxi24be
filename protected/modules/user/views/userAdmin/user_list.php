<div class="col-md-6 col-xs-1">
<?php

	$this->beginWidget('ext.bootstrap.table.TableWidget', 
		array(
			'ths'=> array('email', 'password', 'edit', 'delete'),
			'class'=> 'table',
			'id' => 'table-user-id',
		));
?>

<tr ng-repeat = 'user in db.users'>
    <td>{{user.email}}</td>
    <td>{{user.password}}</td>
    <td>
    	<button class='btn btn-warning'><span class="glyphicon glyphicon-edit"></span> edit</button>
    </td>
    <td>
    	<button class='btn btn-danger' ng-click="delete(user)"><span class="glyphicon glyphicon-minus"></span> delete</button>
    </td>
</tr>

<?php

	$this->endWidget();

?>

</div>


