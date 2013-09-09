<div class="col-md-6 col-xs-1">
<?php

	$this->beginWidget('ext.bootstrap.table.TableWidget', 
		array(
			'ths'=> array('email', 'password', 'action'),
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
</tr>

<?php

	$this->endWidget();

?>

</div>


