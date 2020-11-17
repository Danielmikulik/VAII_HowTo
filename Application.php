<?php
include 'DBManager.php';

class Application
{
    private $dbManager;

    /**
     * Application constructor.
     * @param $dbMaanger
     */
    public function __construct()
    {
        $this->dbManager = new DBManager();
    }

    public function processData()
    {
        $this->dbManager->processData();
    }

    public function loadAllGuides()
    {
        $guides = $this->dbManager->loadAllGuides();

        foreach ($guides as $guide) {
            echo '<a href="detail.php" class="list-group-item list-group-item-action flex-column align-items-start card">';
            echo '    <div class="row no-gutters">';
            echo '        <div class="col-auto">';
            echo '            <img src="' . $guide['image'] . '" class="img-fluid img-thumbnail" alt="">';
            echo '        </div>';
            echo '        <div class="col card-block px-2">';
            echo '            <div class="d-flex w-100 justify-content-between ">';
            echo '                <h5 class="mb-1">List group item heading</h5>';
            echo '                <small>3 days ago</small>';
            echo '            </div>';
            echo '            <br>';
            echo '            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>';
            echo '        </div>';
            echo '    </div>';
            echo '</a>';
        }


    }
}