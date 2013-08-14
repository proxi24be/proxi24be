<?php
/**
 * User: TRANN
 * Date: 8/12/13
 * Time: 2:47 PM
 */

namespace application\components;

class UserManager {
    private $_errors;

    public function createNewUser(array $params) {
        $user = new \User();
        if (isset($params['password']))
            $params['password'] = Password::crypt($params['password']);
        $user->attributes = $params;
        try {
            if ($user->save()) {
                $this->_errors = array();
                return $user->getPrimaryKey();
            }
            else {
                $this->_errors = $user->getErrors();
                return FALSE;
            }
        }
        catch (\Exception $e) {
            \Yii::log($e->getMessage(), 'error', 'app.registration.user');
            return FALSE;
        }
    }

    public function updatePassword($user_id, $new_password) {
        $status = FALSE;
        $user = User::model()->findByPk($user_id);
        try {
            if ($user !== NULL) {
                $user->password = Password::crypt($new_password);
                if ($user->save()) {
                    $status = TRUE;
                }
                $user = NULL;
            }
        }
        catch (\Exception $e) {
            \Yii::log($e->getMessage(), 'error', 'app.registration.user');
        }
        return $status;
    }

    public function checkPassword($input_password, $password_stored) {
        return Password::check($input_password, $password_stored);
    }

    public function getErrors() {
        return $this->_errors;
    }

}