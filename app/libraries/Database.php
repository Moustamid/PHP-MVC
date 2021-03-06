<?php 


/*
- PDO Database Class 
- Connect to database 
- Create prepared statements
- Bind values
- Return rows and resukts 
*/


Class Database {
   private $host = DB_HOST ;
   private $user = DB_USER ;
   private $pass = DB_PASS ;
   private $dbname = DB_NAME ;


   // Database hundler 
   private $dbh;
   // statement 
   private $stmt;
   // errors 
   private $error;

 
   public function __construct(){
     
      // Set DSN 
      $dsn = 'mysql:host='. $this->host . ';dbname=' . $this->dbname;
      // PDO Option see documentation
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      // Creat a new PDO instance 

      try {
             $this->dbh = new PDO($dsn , $this->user , $this->pass , $options);
      } catch( PDOException $e ){
         $this->error = $e->getMessage();
         echo $this->error;
      } 



   }



}
