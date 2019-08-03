<?php
    class users extends Controller {

            public function __construct()
                {
                    
                }
            
            public function register(){
                //check for post 
                if( $_SERVER['REQUEST_METHOD'] == 'POST')
                {
                     
                    //process form 
                    //sanitize post data

                    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                    
                    // init data

                     $data = [
                        
                        'name' => trim($_POST['name']),
                        'email' => trim($_POST['email']),
                        'password' =>trim($_POST['password']),
                        'confirm_password' => trim($_POST['confirm_password']),
                        'name_err' => '',
                        'email_err' =>'',
                        'password_err' => '',
                        'confirm_password_err' =>''
                     ];



                    //Validate email 
                    if(empty($data['email'])){

                        $data['email_err'] = 'please enter your email';
                    }
                     //Validate name 
                     if(empty($data['name'])){

                        $data['name_err'] = 'please enter your name';
                    }
                     //Validate password 
                     if(empty($data['password'])){

                        $data['password_err'] = 'please enter your password';
                    }elseif(strlen($data['password']) < 6 )
                    {
                        $data['password_err'] = 'password must be at least 6 characters';
                    }
                     //Validate confirm password
                     if(empty($data['confirm_password'])){

                        $data['confirm_password_err'] = 'please confirm your password';

                    }elseif($data['confirm_password']!= $data['password']){

                        $data['confirm_password_err'] = 'password do not match';
                    }


                    //make sure errors are empty

                    if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']))
                    {
                       // validated
                       die("success");
                    }

                    else{

                        // load views
                        $this->view('users/register' , $data);
                    }


                }
                else {
                     // init data

                     $data = [
                        
                        'name' => '',
                        'email' => '',
                        'password' =>'',
                        'confirm_password' => '',
                        'name_err' => '',
                        'email_err' =>'',
                        'password_err' => '',
                        'confirm_password_err' =>''
                     ];
                    //  load view
                     $this->view('users/register',$data);
                    
                    }

                }


                public function login(){
                    //check for post 
                    if( $_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                        // process form
                    }
                    else {
                         // init data
    
                         $data = [
                            
                            'email' => '',
                            'password' =>'',
                            'email_err' =>'',
                            'password_err' => '',
                         ];
                        //  load view
                         $this->view('users/login',$data);
                        
                        }
    
                    }

                


    }


?>