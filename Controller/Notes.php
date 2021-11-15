<?php
require_once "Controller.php";
// require_once "../db/DBConfig.php";
class Notes extends Controller
{

    private $_model;

    public function __construct()
    {
        $this->_model = $this->model('Model');
    }

    public function getAllNote()
    {
        $notes = $this->_model->getAllData();
        $data = 
        [
            'notes' => $notes
        ];
        $this->view('index', $data);
       
        // return $data;
    }



}

$note = new Notes;
$note->getAllNote();
?>