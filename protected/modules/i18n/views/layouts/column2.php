<?php $this->beginContent('/layouts/i18n_admin'); ?>
<div id="content" class="container">
  <div class="row" style="margin-top:5px">
    <div class="col-md-3">
      <?php
        $this->widget('ext.bootstrap.sidebar.SidebarWidget', 
          array
          (
            'id' => 'i18n-admin-sidebar',
            'items' => 
              array
              (
                array
                (
                  'label'=>'I18N ADMINISTRATION', 
                  'itemOptions'=>array('class'=>'dropdown-header')
                ),
                            array('label'=>'Edit meta tables', 'url'=>array('/i18n/default/index')),
                            array('label'=>'Translation', 'url'=>array('/i18n/translation/index')),
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
