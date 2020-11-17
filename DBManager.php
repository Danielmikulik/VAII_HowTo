<?php
include "Guide.php";

class DBManager
{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'how_to';
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
        $imgContent = null;
        if (isset($_POST['add'])) {
            if (empty($_POST['title'] || empty($_POST['description']))) {
                echo 'You need to fill title and description.';
                return;
            }

            if (!empty($_FILES['image']['name'])) {
                $fileName = basename($_FILES['image']['name']);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    //$image = $_FILES['image']['tmp_name'];
                    //$imgContent = addslashes(file_get_contents($image));

                    $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
                    $imgContent = 'data:image/'.$fileType.';base64,'.$image_base64;
                }
            }
            $this->saveToDB(new Guide($_POST['title'], $_POST['description'], $imgContent));
        }
    }

    public function saveToDB(Guide $guide)
    {
        try {
            $statusMsg = 'na pipik';
            $sql = 'INSERT INTO guide(title, description, view_pic) VALUES (?, ?, ?)';
            $insert = $this->db->prepare($sql)->execute([$guide->getTitle(), $guide->getDescription(), $guide->getImage()]);
            if ($insert) {
                $statusMsg = "File uploaded successfully.";
            }
            echo $statusMsg;
        } catch (PDOException $exception) {
            echo 'Insert failed: ' . $exception->getMessage();
        }
    }

    public function loadAllGuides()
    {
        return $this->db->query('SELECT * FROM guide');
    }

    public function getDetail($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM guide WHERE id=?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}