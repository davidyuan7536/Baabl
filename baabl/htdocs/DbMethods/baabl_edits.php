<?php

class baabl_edits {
    private static $DB = NULL;

    private static function getDB() {
        if (self::$DB == NULL) {
            require_once "../DbSimple/DbWorker.php";
            self::$DB = DbWorker::getInstance()->getConnection();
        }
        return self::$DB;
    }

    public static function newEdit($row) {
      return self::getDB()->query('INSERT INTO baabl_edits_history(?#) VALUES(?a)', array_keys($row), array_values($row));

    }

    public static function deleteEditsByHash($hash, $type) {
      return self::getDB()->query('DELETE FROM baabl_edits_history WHERE edit_hash=? AND edit_type =?' , $hash, $type);
    }

    public static function getEditsByHash($hash, $type) {
      return self::getDB()->query('SELECT * FROM baabl_edits_history WHERE edit_hash=? AND edit_type =? ORDER BY edit_time DESC' , $hash, $type);
    }



}


?>
