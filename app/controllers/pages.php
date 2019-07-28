<?php 
    class pages  extends Controller {


        public function __construct()
        {
        }
        public function index()
        {   
            $data = ["title"=>"oussama","cin"=>"AE225790"];
            $this->view('pages/index',$data);
            
        }
        public function about ()
        {
            


        }
    }