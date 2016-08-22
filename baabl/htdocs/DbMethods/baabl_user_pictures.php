<?php

class baabl_user_pictures {
    private static $DB = NULL;

    private static function getDB() {
        if (self::$DB == NULL) {
            require_once "../DbSimple/DbWorker.php";
            self::$DB = DbWorker::getInstance()->getConnection();
        }
        return self::$DB;
    }

    public static function newUserPicture($row) {
      return self::getDB()->query('INSERT INTO baabl_user_pictures(?#) VALUES(?a)', array_keys($row), array_values($row));

    }

    public static function updateUserPictureByHash($hash, $row) {
      return self::getDB()->query('UPDATE baabl_user_pictures SET ?a WHERE user_picture_hash=?', $row, $hash);
    }

    public static function deleteUserPictureByHash($hash) {
      return self::getDB()->query('DELETE FROM baabl_user_pictures WHERE user_picture_hash=?', $hash);
    }

    public static function getUserPictureByUserHashAndOffset($hash, $limit, $offset) {
      return self::getDB()->query('SELECT * FROM baabl_user_pictures WHERE user_hash=? ORDER BY user_picture_time DESC LIMIT ?d OFFSET ?d', $hash, $limit, $offset);
    }

    public static function getCountOfUserPictureByUserHash($hash){
      return self::getDB()->query('SELECT COUNT(*) FROM baabl_user_pictures WHERE user_hash=?', $hash);
    }

    public static function getUserProfilePicture($hash) {
      return self::getDB()->query('SELECT * FROM baabl_user_pictures WHERE user_hash=? AND is_profile_picture = 1', $hash);
    }

    public static function getUserHeaderPicture($hash) {
      return self::getDB()->query('SELECT * FROM baabl_user_pictures WHERE user_hash=? AND is_header_picture = 1', $hash);
    }


}


?>
