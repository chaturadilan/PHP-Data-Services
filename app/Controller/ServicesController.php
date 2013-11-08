<?php

App::uses('AppController', 'Controller');

class ServicesController extends AppController {
		
	 var $components = array('RequestHandler');	
			
	
	public function data($dataApp = null, $dataCollection = null, $alias = null, $dataMethod = null) {
			$this->autoRender = false;
			$this->RequestHandler->respondAs(" application/json");
			
			if(!$dataApp){
				$this->setError("Data App is required", "800");
				return;
			}
			if(!$dataCollection){
				$this->setError("Data Collection is required", "801");
				return;
			}               
          
		  	$params = $this->request->query;
			
   			$this->loadModel('DataCollection');
			$this->loadModel('Method');
			$dataCollectionResult = $this->DataCollection->find('first', array('recursive' => 3, 'conditions' => array('DataApp.alias' => $dataApp, 'DataCollection.alias' => $dataCollection)));
			
			
			if(!$dataCollectionResult){
				$this->setError("Invalid Service", "802");
				return;
			}
			
			
			if(!$dataCollectionResult['DataApp']['is_public']){
				$this->setError("Data App is private", "803");
				return;
			}
			
			if(!$dataCollectionResult['DataApp']['is_published']){
				$this->setError("Data App is not published", "804");
				return;
			}
			
						
			if(!isset($params['secret'])){
				$this->setError("No Secret Key Defined", "805");
				return;
			}
			
			if($dataCollectionResult['DataApp']['secret'] != $params['secret']){
				$this->setError("Invalid Secret Key", "806");
				return;
			}
			
			if(!$dataCollectionResult['DataCollection']['is_published']){
				$this->setError("Data Collection is not published", "807");
				return;
			}
			
			
			if(!$dataMethod){				
				$dataMethodResult = $this->Method->find('first', array('conditions' => array('Method.alias' => $alias, 'Method.http_methods' => strtoupper($_SERVER['REQUEST_METHOD']))));
							
				if(!$dataMethodResult){
					$this->setError("Invalid Operation", "807");
					return;
				}
				
				
				$sourceName = $dataCollectionResult['DataProvider']['SourceType']['name'];
				
				
				
				
			
			}
			
			//echo json_encode($dataMethodResult);
			
	}
	
	
	private function setError($message, $code){
		echo '{"message": "'. $message . '", "error_code": "'. $code . '"}';
		$this->response->statusCode(400);
	}
	

}