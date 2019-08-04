<?php
    class users extends Controller {

            public function __construct()
                {
                    
                    //Load model

                $this->userModel=$this->model('User');


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
                    }else
                    {
                        if($this->userModel->findUserByEmail($data['email'])){
                            $data['email_err'] = 'Email is already taken';
                        }
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
                       //hash password 
                        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                      // Register User 
                      if($this->userModel->register($data))
                      {
                        flash('register_succes','you are registerd and can log in ');
                        redirect('/users/login');
                      }
                      else{
                          die('Something went wrong');
                      }
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


                public function login (){
                    //check for post 
                    if( $_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                        // process form
                        

                          //sanitize post data

                    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                    
                    // init data

                     $data = [
                        
                        
                        'email' => trim($_POST['email']),
                        'password' =>trim($_POST['password']),
                        'email_err' =>'',
                        'password_err' => '',
                     ];



                    //Validate email 
                    if(empty($data['email'])){

                        $data['email_err'] = 'please enter your email';
                    }

                     //Validate password 
                     if(empty($data['password'])){

                        $data['password_err'] = 'please enter your password';
                    }

                    //CHECK FOR USER/EMAIL

                    if($this->userModel->findUserByEmail($data['email'])){
                        // user found
                    }else{
                        //user not found
                        $data['email_err'] = 'No user found';
                    }

                     


                    //make sure errors are empty

                    if(empty($data['email_err']) && empty($data['password_err']))
                    {
                       // validated
                       //check and set logged in user
                       $loggedInUser = $this->userModel->login($data['email'],$data['password']);
                       if($loggedInUser)
                       {
                           //create Session
                            $this->createUserSession($loggedInUser);


                       }else{
                           $data['password_err'] = 'Password incorrect';
                           $this->view('users/login',$data);
                       }
                    }

                    else{

                        // load views
                        $this->view('users/login', $data);
                    }




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
            public function createUserSession($user){

                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_email'] = $user->email;
                $_SESSION['user_name'] = $user->name;
                redirect('posts'); 
             }
             public function logout()
             {
                 unset($_SESSION['user_id']);
                 unset($_SESSION['user_email']);
                 unset($_SESSION['user_name']);
                 session_destroy();
                 redirect('users/login');
             }


                


    }


?>