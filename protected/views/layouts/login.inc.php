<?php

$content_footer = Yii::t('login', 'dont_have_an_account') . ' ' . 
          CHtml::link(Yii::t('login', 'sign_up'), 'register');

$this->beginWidget('ext.bootstrap.modal.ModalWidget', 
    array('id'=>'myLoginForm', 'modal_title'=> '', 'content_footer'=> $content_footer));
    // adding the login form.
    $login_form = new LoginForm();
    $login_form->setBaseController($this);
    $login_form->printForm(
        array(
            'id'=>'user-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array('validateOnSubmit'=>true),
            'errorMessageCssClass'=>'alert alert-warning',
            'action'=>Yii::app()->createUrl('user/login/read'),
      ),
      array(BsFormBehavior::SUBMIT_BUTTON => Yii::t('login', 'submit'))
    );
$this->endWidget();
