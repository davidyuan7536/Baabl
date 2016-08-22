<?php


class baabl_answers {
    private static $DB = NULL;

    private static function getDB() {
        if (self::$DB == NULL) {
            require_once( ROOT_DIR.'/DbSimple/DbWorker.php');
            // require_once "../DbSimple/DbWorker.php";
            self::$DB = DbWorker::getInstance()->getConnection();
        }
        return self::$DB;
    }

    public static function newAnswer($row) {
      return self::getDB()->query('INSERT INTO baabl_answers(?#) VALUES(?a)', array_keys($row), array_values($row));

    }

    public static function getAnswerByHash($hash) {
      return self::getDB()->query('SELECT * FROM baabl_answers WHERE answer_hash=?', $hash);
    }

    public static function getAnswerByQuestionHash($hash) {
      return self::getDB()->query('SELECT * FROM baabl_answers WHERE question_hash=?', $hash);
    }

    public static function getAnswerByUserHash($hash) {
      return self::getDB()->query('SELECT * FROM baabl_answers WHERE user_hash=? ORDER BY answer_time DESC', $hash);
    }

    public static function updateAnswerByHash($row, $hash) {
      return self::getDB()->query('UPDATE baabl_answers SET ?a WHERE answer_hash=?', $row, $hash);
    }

    public static function deleteAnswerByHash($hash) {
      return self::getDB()->query('DELETE FROM baabl_answers WHERE answer_hash=?', $hash);
    }

    public static function deleteAnswerByQuestionHash($hash) {
      return self::getDB()->query('DELETE FROM baabl_answers WHERE question_hash=?', $hash);
    }


}


?>
