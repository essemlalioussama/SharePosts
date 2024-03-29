<?php

    /* PDO Database class
     * connectto database
     * bind values
     * return rows and results
     */
    class Database{

        private $host =DB_Host;
        private $user = DB_User;
        private $pass = DB_Pass;
        private $dbname = DB_Name;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct()
        {
            //set DSN
            
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
            $options = array (

                PDO::ATTR_PERSISTENT => true ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // create PDO instance

            try {

                $this->dbh = new PDO ($dsn,$this->user,$this->pass,$options);
            }catch( PDOException $e)
            {
                $this->error = $e->getMessage();
                echo $this->error;
            }


        }
        //prepare statement with query
        public function query($sql)
        {
            $this->stmt = $this->dbh->prepare($sql);

        }
        //Bind values
        public function bind($param,$value,$type=null){
            if(is_null($type)){
                switch(true)
                {
                    case is_int($value): $type = PDO::PARAM_INT;break;
                    case is_bool($value): $type = PDO::PARAM_BOOL;break;
                    case is_null($value): $type = PDO::PARAM_NULL;break;
                    default : $type = PDO :: PARAM_STR ;
                }
            }
            $this->stmt->bindvalue($param,$value,$type);
        }
        // excute the prepared statement 
        public function execute()
        {
            return $this->stmt->execute();
        }
        //Get result set as array of objects

        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        // Get single record as objet
        public function single()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
        // Get row count 
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    } 