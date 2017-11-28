<?php

namespace PostOffice\Core;

abstract class Controller {
	
	protected function loadPage(string $page) 
	{	
		include_once "./web/page/{$page}.php";
	}
}
