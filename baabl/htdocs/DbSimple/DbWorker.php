<?php

class DbWorker {
    private static $instance = NULL;
    private $connection = NULL;

    public static function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new DbWorker();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    private function __construct() {
        require_once "Generic.php";
        define('__AUDO_CONNECT__', 'mysql://davidyuan7536:da1993112@localhost/baabl');
        $db = new DbSimple_Generic();
        $this->connection = $db->connect(__AUDO_CONNECT__);
        $this->connection->setErrorHandler(array($this, 'mysqlErrorHandler'));
        $this->connection->setIdentPrefix('ffm_');
        $this->connection->query("SET NAMES 'utf8'");
    }

    public function mysqlErrorHandler($message, $info) {
        require_once "Utils.php";
        // Utils::mailMessage('Database Error', $message, $info['query']);
        if (!error_reporting()) return;
        Utils::sendError('Internal server error');
        exit();
    }
}
