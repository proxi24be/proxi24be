<?php
/**
 * User: TRANN
 * Date: 8/12/13
 * Time: 12:05 PM
 *
 * The purpose of this class is to provide functions to crypt
 * password.
 */

namespace application\components;

class Password {
    /**
     * @param $input The string that we want to hash.
     * @param int $iteration The number of iteration of the blowfish algorithm.\n
     * The value should be between 04-31. By default it is set to 10.\n
     * @return string The hashed string.
     */
    public static function crypt ($input, $iteration=10) {
        $salt = self::randomSalt();
        // used of blowfish
        $salt = '$2y$'. $iteration .'$'. $salt;
        return crypt($input, $salt);
    }

    /**
     * @param $input The string to check.
     * @param $input_stored The input stored.
     * @return bool TRUE if the hashed of $input == $password otherwise FALSE.
     */
    public static function check($input, $input_stored) {
        $crypted_password = crypt($input, $input_stored);
        return $crypted_password === $input_stored;
    }

    private static function randomSalt() {
        $salt = "";
        for($i=0; $i<10; $i++) {
            $salt .= rand();
        }
        return $salt;
    }

}