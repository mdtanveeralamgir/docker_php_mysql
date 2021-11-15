<?php
class Controller
{

    //Load model
    public function model($model)
    {
        require_once '../Model/' . $model . '.php';

        //instantiate model class
        return new $model(); //So if Posts passed as model then it will return "new Posts()".
    }

    //Load view
    public function view($view, $data = [])
    { //$view will be the file name and data will be the data that we need to add on view. that data could come from DB or hard coded.
        //Check the view file exists in the views folder
        if(file_exists('../view/' . $view . '.php'))
        {
            require_once '../view/' . $view . '.php';
        } 
        else 
        {
            die('view does not exists');
        }
    }
}
?>