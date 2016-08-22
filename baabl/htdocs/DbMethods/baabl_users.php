<?php

class baabl_users {
    private static $DB = NULL;

    private static function getDB() {
        if (self::$DB == NULL) {
            require_once "../DbSimple/DbWorker.php";
            self::$DB = DbWorker::getInstance()->getConnection();
        }
        return self::$DB;
    }

    public static function newUser($row) {
      return self::getDB()->query('INSERT INTO baabl_users(?#) VALUES(?a)', array_keys($row), array_values($row));

    }

    public static function updateUserByEmail($email, $row) {
      return self::getDB()->query('UPDATE baabl_users SET ?a WHERE user_email=?', $row, $email);
    }

    public static function getUserByEmail($email) {
      return self::getDB()->selectRow('SELECT * FROM baabl_users WHERE user_email=?', $email);
    }


}


?>
