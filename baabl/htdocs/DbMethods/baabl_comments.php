<?php


class baabl_comments {
    private static $DB = NULL;

    private static function getDB() {
        if (self::$DB == NULL) {
            require_once( ROOT_DIR.'/DbSimple/DbWorker.php');
            // require_once "../DbSimple/DbWorker.php";
            self::$DB = DbWorker::getInstance()->getConnection();
        }
        return self::$DB;
    }

    public static function newBaablComment($row) {
      return self::getDB()->query('INSERT INTO baabl_comments(?#) VALUES(?a)', array_keys($row), array_values($row));

    }

    public static function getBaablCommentByHash($hash) {
      return self::getDB()->query('SELECT * FROM baabl_comments WHERE comment_hash=?', $hash);
    }

    public static function updateBaablCommentByHash($row, $hash) {
      return self::getDB()->query('UPDATE baabl_comments SET ?a WHERE comment_hash=?', $row, $hash);
    }

    public static function getBaablCommentByParentHashAndType($hash, $type) {
      return self::getDB()->query('SELECT * FROM baabl_comments WHERE parent_hash=? AND parent_type=?', $hash, $type);
    }

    public static function deleteBaablCommentByHash($hash) {
      return self::getDB()->query('DELETE FROM baabl_comments WHERE comment_hash=?', $hash);
    }


}


?>
