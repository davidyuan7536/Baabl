<?php


class baabl_notifications {
    private static $DB = NULL;

    private static function getDB() {
        if (self::$DB == NULL) {
            require_once( ROOT_DIR.'/DbSimple/DbWorker.php');
            // require_once "../DbSimple/DbWorker.php";
            self::$DB = DbWorker::getInstance()->getConnection();
        }
        return self::$DB;
    }

    public static function newNotification($row) {
      return self::getDB()->query('INSERT INTO baabl_notifications(?#) VALUES(?a)', array_keys($row), array_values($row));

    }

    public static function getNotificationByHash($hash) {
      return self::getDB()->query('SELECT * FROM baabl_notifications WHERE notification_hash=?', $hash);
    }

    public static function getNotificationByUserHash($hash) {
      return self::getDB()->query('SELECT * FROM baabl_notifications WHERE user_hash=?', $hash);
    }

    public static function updateNotificationByHash($row, $hash) {
      return self::getDB()->query('UPDATE baabl_notifications SET ?a WHERE notification_hash=?', $row, $hash);
    }

    public static function deleteNotificationByHash($hash) {
      return self::getDB()->query('DELETE FROM baabl_notifications WHERE notification_hash=?', $hash);
    }

    public static function deleteNotificationByTypeAndTriggerHash($type, $hash) {
      return self::getDB()->query('DELETE FROM baabl_notifications WHERE notification_type=? AND notification_trigger_hash=?', $type, $hash);
    }


}


?>
