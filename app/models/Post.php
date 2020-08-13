<?php 


class Post {

  // propoerty to acess the Database 
   private $db;


   public function __construct (){

      // Instantiate the Database class 
        $this->db = new Database;
   }

}





?>