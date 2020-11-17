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

    public function load()
    {
        return $this->dbManager->loadAllGuides();
    }

    public function loadAllGuides()
    {
        $guides = $this->dbManager->loadAllGuides();

        $result = '';

        foreach ($guides as $guide) {
             $result .=     '<a href="detail.php?id='.$guide['id'].'" class="list-group-item list-group-item-action flex-column align-items-start card">' .
                                '<div class="row no-gutters">'.
                                    '<div class="col-auto">'.
                                        '<img src="'. $guide["view_pic"] . '" class="img-fluid img-thumbnail img-preview" alt="">'.
                                    '</div>'.
                                    '<div class="col card-block px-2">'.
                                        '<div class="d-flex w-100 justify-content-between ">'.
                                            '<h5 class="mb-1">'.$guide['title'].'</h5>'.
                                            '<small>'.$guide['uploaded'].'</small>'.
                                        '</div>'.
                                        '<br>'.
                                        '<p class="mb-1 text-preview">'.$guide['description'].'</p>'.
                                    '</div>'.
                               ' </div>'.
                            '</a>';
        }
        return $result;
    }

    public function getDetail($id)
    {
        return $this->dbManager->getDetail($id);
    }

    public function deleteGuideById($id)
    {
        $this->dbManager->deleteGuideById($id);
    }

    public function updateGuideById($id, $title, $description)
    {
        $this->dbManager->updateGuideById($id, $title, $description);
    }
}