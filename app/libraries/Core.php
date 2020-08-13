<?php

/*
- App Core Class :
   - Create URL & loads core controller
   - URL FORMAT - /controller/method/params

*/ 



Class Core {

    protected $currentController= 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];
  
        // Step 2 : 

    public function __construct(){
      //  print_r( $this->getUrl() );

      $url = $this->getUrl();

      // Look in controllers 'folder' for first value :
    
        if(isset($url[0])){
          // Look in controllers for first value
              if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                  // If exists, set as controller
                  $this->currentController = ucwords($url[0]);
                  // Unset 0 Index
                  unset($url[0]);
              }
          }
      // require the controller :

      require_once('../app/controllers/' . $this->currentController . '.php');
      
      // Instantiate controller class :
          //  Exemple : $Pages = new Pages ; 
       $this->currentController = new $this->currentController;


      // Checking if the Method existe insite the controller : second part url
       
      if(isset($url[1])){
        // Check if method/function exists in current controller class
        if(method_exists($this->currentController, $url[1])){
          // Set current method if it exsists
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }

      }


      // Get params : 
      // Note : $url[0] and $url[1] are destroyed  :  /$url[3]
      // Get params - Any values left over in url are params
      $this->params = $url ? array_values($url) : [];

      // Call a callback with an array of parameters
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

        // *** Step 3 : creating our Pages Controller & index default function   
 
    }

    // *** step 1 : Getting the Url
    // *** step 2 => Creating the Core Class __construct

    public function getUrl(){
       
      if( isset( $_GET['url'] ) ){
           
          // Strip the ending '/' :
          $url = rtrim($_GET['url'] , '/' );
          // sanitize as URL format :
          $url = filter_var($url , FILTER_SANITIZE_URL);
          // break it to an array at every '/' : 
          $url = explode('/' , $url);

          return $url;
       }


    }

}





// Notes :

/*

- file_exists(url) : To look for a file .
- ucwords()        : Make First letter Uppercase
- unset()          : destroys the specified variables.
- method_exists    : Check if method exists in a class : method_exists( Class , Methode ) .
- array_values()   : Returns an indexed array of values.
- call_user_func_array :  Call a callback function with 
                          an array of parameters .


*/




/*


Code details : vwath this code do : ? 


#1 :              $this->currentController = new $this->currentController;  

      - Instantiate controller class :
        Exemple : $Pages = new Pages ; 








#2 :       // Call a callback function with an array of parameters
      call_user_func_array( [ $this->currentController ,
                              $this->currentMethod ] ,
                               $this->params );

 



*/ 