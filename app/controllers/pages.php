<?php 
    class pages  extends Controller {


        public function __construct()
        {
        }
        public function index()
        {   
            $data = [
                    
                "title"=>"SharePosts",
                "description"=>"Simple social network built on the TraversyMVC PHP framework"
            ];
            $this->view('pages/index',$data);
            
        }
        public function about ()
        {

            $data = [
                    
                "title"=>"About US",
                "description"=>"App to share posts with other users "
            ];

            $this->view('pages/about',$data);
        }
    }