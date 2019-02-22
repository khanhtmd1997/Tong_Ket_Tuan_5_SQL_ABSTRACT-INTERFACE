<?php 
class DB {
    private static $instance = NULL;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host=localhost:3306;dbname=demo_mvc_php','root','');
                 self::$instance->exec("SET NAMES 'utf8'");
            }

            catch (PDOException $e) {
                die($e->getMessage());
            }
        } 
        return self::$instance;
    }
}