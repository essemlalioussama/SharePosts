<?php
    /*
     * Base Controller 
     * loads the models and views
     */
class Controller{
    //load model
    public function model($model){
        //require model file 
        require_once '../app/models/'.$model.'.php';
        //Instantiate model
        return new $model();
    }

    //load view
    public function view($view, $data = []){
        //check for view file
        if(file_exists('../app/views/'.$view.'.php'))
        {
            require_once '../app/views/'.$view.'.php';
        }
        else
        {
            //file doesn't exist
            die('view doesn\'t exist');

        }
    }
}

