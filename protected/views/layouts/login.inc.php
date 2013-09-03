<div id="myLoginForm" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content" style="max-width:80%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
      <?php 
            // adding the login form.
            $login_form = new LoginForm();
            $login_form->setBaseController($this);
            $login_form->printForm(
              array(
                  'id'=>'user-form',
                  'enableClientValidation'=>true,
                  'clientOptions'=>array('validateOnSubmit'=>true),
                  'errorMessageCssClass'=>'error alert alert-warning',
                'action'=>Yii::app()->createUrl('site/authenticate'),
              ),
              array(BsFormBehavior::SUBMIT_BUTTON => Yii::t('login', 'submit'))
            );
      ?>
      </div> <!-- /.model-body -->
      <div class="modal-footer">
        <?= Yii::t('login', 'dont_have_an_account') . ' ' . 
          CHtml::link(Yii::t('login', 'sign_up'), 'register');?>
      </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


