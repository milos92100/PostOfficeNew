<?php
namespace PostOffice\Core;

/**
 * Application core class
 *
 * @author Milos Stojanovic
 * @version 1.0
 * @namespace PostOffice\Core
 *           
 */
class Application
{

    function __construct()
    {}

    public function run()
    {
        
    	if (strpos($_SERVER['REQUEST_URI'], "login") > -1){
    		include "./web/page/login.php";
    	}else{
    		echo "Application is running ..";
    	}
    	
    }
}