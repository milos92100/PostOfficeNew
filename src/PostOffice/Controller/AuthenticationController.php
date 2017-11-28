<?php

namespace PostOffice\Controller;

use PostOffice\Core\Controller;

class AuthenticationController extends Controller {
	
	public function index() {
		$this->loadPage ( "login" );
	}
}