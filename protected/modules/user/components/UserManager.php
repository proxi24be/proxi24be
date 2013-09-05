<?php

namespace application\modules\user\components;

class UserManager extends \CComponent
{
	private $_error_message;

	/**
	 * The function will create user and return true if the user has been created
	 * successfully otherwise false.  In case of false, one can use getErrorMessage()
	 * function in order to check the reason of the failure.
	 * 
	 * @param  array  $params A map containing the information about the user.
	 * @return boolean true if operation success otherwise false.
	 */
	public function createUser(array $params)
	{
		$user = new \User();
		$params['locked'] = 0;
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
			throw new \Exception(print_r($user->getErrors(), true));
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
					throw new \Exception(print_r($user->getErrors(), true));
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
}