<?php


class DBManager
{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'blog';
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';

    private $db;

    /**
     * DBManager constructor.
     * @param $db
     */
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:dbname=' .self::DB_NAME. ';host=' .self::DB_HOST,
                self::DB_USER, self::DB_PASS);
        } catch (PDOException $exception) {
            echo 'Connection failed: ' . $exception->getMessage();
        }
    }

    public function processData()
    {
        if (isset($_POST['add'])) {
            $this->save(new Guide($_POST['title'], $_POST['description'], $_FILES))
        }
    }
}