<?php


class baabl_questions {
    private static $DB = NULL;

    private static function getDB() {
        if (self::$DB == NULL) {
            require_once( ROOT_DIR.'/DbSimple/DbWorker.php');
            // require_once "../DbSimple/DbWorker.php";
            self::$DB = DbWorker::getInstance()->getConnection();
        }
        return self::$DB;
    }

    public static function newQuestion($row) {
      return self::getDB()->query('INSERT INTO baabl_questions(?#) VALUES(?a)', array_keys($row), array_values($row));

    }

    public static function getQuestionByHash($hash) {
      return self::getDB()->query('SELECT question_text, question_time, user_hash, question_hash, question_answered FROM baabl_questions WHERE question_hash=?', $hash);
    }

    public static function getQuestionByHashALL($hash) {
      return self::getDB()->query('SELECT * FROM baabl_questions WHERE question_hash=?', $hash);
    }

    public static function getQuestionByUserHash($hash) {
      return self::getDB()->query('SELECT * FROM baabl_questions WHERE user_hash=?', $hash);
    }

    public static function updateQuestionByHash($row, $hash) {
      return self::getDB()->query('UPDATE baabl_questions SET ?a WHERE question_hash=?', $row, $hash);
    }

    public static function deleteQuestionByHash($hash) {
      return self::getDB()->query('DELETE FROM baabl_questions WHERE question_hash=?', $hash);
    }


}


?>
