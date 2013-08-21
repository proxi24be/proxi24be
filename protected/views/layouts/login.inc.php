<div id="myLoginForm" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content" style="max-width:80%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <form role="form">
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1"><?= Yii::t('login', 'email');?></label>
            <input type="email" class="form-control" name="email" placeholder="<?=Yii::t('login','placeholder_email');?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"><?= Yii::t('login', 'password');?></label>
            <input type="password" class="form-control" name="password" placeholder="<?=Yii::t('login','placeholder_password');?>" required>
          </div>
            <?=Yii::t('login','dont_have_an_account');?> <a href="#"><?=Yii::t('login', 'sign_up');?></a>
      </div>
      <div class="modal-footer">
        <a class="btn btn-link" data-dismiss="modal" href="#"><?=Yii::t('login', 'cancel');?></a>
        <input type="submit" class="btn btn-primary" value="<?= Yii::t('login', 'submit');?>"/> 
      </div>
      </form> 
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
