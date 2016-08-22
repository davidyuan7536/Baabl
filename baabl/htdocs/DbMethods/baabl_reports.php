<?php


class baabl_reports {
    private static $DB = NULL;

    private static function getDB() {
        if (self::$DB == NULL) {
            require_once( ROOT_DIR.'/DbSimple/DbWorker.php');
            // require_once "../DbSimple/DbWorker.php";
            self::$DB = DbWorker::getInstance()->getConnection();
        }
        return self::$DB;
    }

    public static function newReport($row) {
      return self::getDB()->query('INSERT INTO baabl_reports(?#) VALUES(?a)', array_keys($row), array_values($row));

    }

    public static function getReportByHash($hash) {
      return self::getDB()->query('SELECT * FROM baabl_reports WHERE report_hash=?', $hash);
    }

    public static function getReportByReportedHashAndType($hash, $type) {
      return self::getDB()->query('SELECT * FROM baabl_reports WHERE reported_hash=? AND report_type=?', $hash, $type);
    }


}


?>
