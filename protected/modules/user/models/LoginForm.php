<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends \CFormModel
{
	public $username;
	public $password;
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// For the convenience the username expected is the email.
			array('username', 'email'),
			array('password', 'length', 'min'=>8),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username' => Yii::t('login', 'username'),
			'password' => Yii::t('login', 'password'),
		);
	}

	public function behaviors()
	{
		return array(
			'BsFormBehavior' => array(
				'class' => 'ext.bootstrap.form.BsFormBehavior',
				'active_form'=> array
				(
		            'id'=>'user-form',
		            'enableClientValidation'=>true,
		            'clientOptions'=>array('validateOnSubmit'=>true),
		            'errorMessageCssClass'=>'alert alert-warning',
		            'action'=>Yii::app()->createUrl('user/login/read'),
		      	),
		      	'submit_button'=> array
		      	(
		      		BsFormBehavior::SUBMIT_BUTTON => Yii::t('login', 'submit')
	      		),
			),
			'AttributeFormBehavior' => array(
				'class' => 'ext.bootstrap.form.AttributeFormBehavior'
			),
		);
	}

	public function defaultBusinessAttributes()
	{
		$this->bs_input_attribute = new BsInputAttribute();
		$this->bs_input_attribute->setAttribute('username', 'text', BsInputAttribute::TYPE_HTML);
		$this->bs_input_attribute->setAttribute('password', 'password', BsInputAttribute::TYPE_HTML);
		$this->bs_input_attribute->setAttribute(
				'password', 
				Yii::t('login', 'help_message_password'), 
				BsInputAttribute::HELP_MESSAGE
			);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity = new UserIdentity($this->username, $this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect email address or password.');
			else if($this->_identity->errorCode === UserIdentity::ERROR_NONE)
			{
				Yii::app()->user->login($this->_identity, 0);
			}
			else
				;
		}
	}
}