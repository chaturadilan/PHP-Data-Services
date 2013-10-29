<?php

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    //...

    public $components = array(
	    'Session',
	    'Auth' => array(
	        'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
	        'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
	        'authorize' => array('Controller') // Added this line
	    )
	);

	public function isAuthorized($user) {
	    // Admin can access every action
	    if (isset($user['role']) && $user['role'] === 'admin') {
	        return true;
	    }
	
	    // Default deny
	    return false;
	}

  
}