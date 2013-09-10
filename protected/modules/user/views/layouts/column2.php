<?php $this->beginContent('/layouts/user_admin'); ?>
<div id="content" class="container">
	<div class="row" style="margin-top:5px">
		<div class="col-md-3">
			<?php
				$this->widget('ext.bootstrap.sidebar.SidebarWidget', 
					array
					(
						'id' => 'user-admin-sidebar',
						'items' => 
							array
							(
								array
								(
									'label'=>'USER ADMINISTRATION', 
									'itemOptions'=>array('class'=>'dropdown-header')
								),
		                        array('label'=>'Edit user', 'url'=>array('/user/userAdmin/index')),
		                        array('label'=>'Other action', 'url'=>array('#')),
							)
					)
				);
			?>
		</div>
		<div class="col-md-9">
			<?php echo $content; ?>
		</div>
	</div>
</div><!-- content -->
<?php $this->endContent(); ?>