<?php

class baabl_baabls {
    private static $DB = NULL;

    private static function getDB() {
        if (self::$DB == NULL) {
            require_once( ROOT_DIR.'/DbSimple/DbWorker.php');
            // require_once "../DbSimple/DbWorker.php";
            self::$DB = DbWorker::getInstance()->getConnection();
        }
        return self::$DB;
    }

    public static function newBaabl($row) {
      return self::getDB()->query('INSERT INTO baabl_baabls(?#) VALUES(?a)', array_keys($row), array_values($row));

    }

    public static function getBaablByHash($hash) {
      return self::getDB()->query('SELECT * FROM baabl_baabls WHERE user_hash=?', $hash);
    }

    public static function getBaablByBaablHash($hash) {
      return self::getDB()->query('SELECT * FROM baabl_baabls WHERE baabl_hash=?', $hash);
    }

    public static function updateBaablByHash($row, $hash) {
      return self::getDB()->query('UPDATE baabl_baabls SET ?a WHERE baabl_hash=?', $row, $hash);
    }

    public static function deleteBaablByHash($hash) {
      return self::getDB()->query('DELETE FROM baabl_baabls WHERE baabl_hash=?', $hash);
    }



}


?>
