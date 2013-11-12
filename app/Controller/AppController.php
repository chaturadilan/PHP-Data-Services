<?php
/**
 * PHP REST Data Services
 * Copyright (c) Chatura Dilan Perera,(http://www.dilan.me)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Chatura Dilan Perera,(http://www.dilan.me)
 * @link          http://www.dilan.me 
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
class AppController extends Controller {
	
	public $components = array(
	    'Session',
	    'Auth' => array(
	        'loginRedirect' => array('controller' => 'data_apps', 'action' => 'index'),
	        'logoutRedirect' => array('controller' => 'data_apps', 'action' => 'index', 'index'),
	        'authorize' => array('Controller') 
	    )
	);
	
	public function isAuthorized($user) {
	    	
	     if (isset($user['role']) && $user['role'] === 'admin') {
	        return true;
	   		 }

	    // Default deny
	    return false;
	}
	
	
}
