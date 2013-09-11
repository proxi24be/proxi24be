<?php

namespace application\modules\user\components;

class UserManager extends \CComponent
{
	private $_error_message;
	private $_errors = array();

	/**
	 * The function will create user and return true if the user has been created
	 * successfully otherwise false.  In case of false, one can use getErrorMessage()
	 * function in order to check the reason of the failure.
	 * 
	 * @param  array  $params A map containing the information about the user.
	 * @return mixed Return an instance of user if the user has been created otherwise false.
	 */
	public function createUser(array $params)
	{
		$user = new \User();
		// By default the account is locked.
		// That simply means the user cannot do some actions.
		// By doing that we prevent some spam account: the registered user
		// will need to active his/her account.
		$params['locked'] = 1;
		$params['last_connection'] = time();
		$user->attributes = $params;
		try
		{
			// This validation might seem redundant (as there is a call to "save" further)
			// but it is required because all the required fields needs to be validated
			// before transformation (if any).
			if($user->validate())
			{
				$user->password = Password::crypt($user->password);
			
				if($user->save())
					return $user;
			}
			// If the program reaches here it means a validation error 
			// has occured.
			$this->_errors = $user->getErrors();
			throw new \Exception(print_r($this->_errors, true));
		}
		catch(\Exception $e)
		{
			// CDbExpression is more accurate however for the convenience 
			// I use the general class Exception.
			$this->_error_message = $e->getMessage();
			return false;
		}
	}

	public function checkPassword($username, $password)
	{
		$user = \User::model()->find('email = :email', array(':email' => $username));
		if($user != null)
			return Password::check($password, $user->password);
		else
			return false;
	}
	
	public function updatePassword($username, $new_password)
    {
		try
		{
			$user = \User::model()->find('email=:email', array(':email' => $username));
			if($user != null)
			{
				$user->password = Password::crypt($user->password);
				if($user->save())
					return true;
				else
				{
					$this->_errors = $user->getErrors();
					throw new \Exception(print_r($this->_errors, true));
				}
			}
			else
				throw new \Exception('User not found : ' . $username);
		}
		catch(\Exception $e)
		{
			$this->_error_message = $e->getMessage();
			return false;	
		}
    }

    /**
     * This function provide the last error encountered.
     * All the errors are string type.
     * 
     * @return string The error message of the last operation.
     */
	public function getErrorMessage()
    {
        return $this->_error_message;
    }

    /**
     * Similarly to CModel::getErrors()
     * @return array An array containing the validation errors.
     */
    public function getErrors()
    {
    	return $this->_errors();
    }
}