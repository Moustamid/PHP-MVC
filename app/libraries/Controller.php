<?php 

  /* 
   *  CORE CONTROLLER CLASS
   *  Loads Models & Views
   */

   Class Controller { 
      
        // Load model 
      public function model($model){
        // Require model file
        require_once '../app/models/'. $model .'.php'; 
        // Tnstatiate model
        return new $model();
 
      }


      //Load view 
      public function view($view , $data = []){
      
        //check for view file 
        
          if(file_exists('../app/views/' . $view . '.php')){
                   // Require model file
                  require_once '../app/views/' . $view . '.php'; 
              } else {
                   // file dont exist
                  die('View does not exist'); 

              }

      }





   }