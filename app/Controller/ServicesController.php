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
			
			
			$httpMethod = null;
				switch($_SERVER['REQUEST_METHOD']){
					case "GET":
						$httpMethod = "retrieve";
						break;
					case "POST":
						$httpMethod = "create";
						break;
					case "PUT":
						$httpMethod = "update";
						break;
					case "DELETE":
						$httpMethod = "delete";
						break;			
			}
			
			
			if(!$dataMethod){				 
								
				$dataMethodResult = $this->Method->find('first', array('conditions' => array('Method.alias' => $alias, 'Method.command' => $httpMethod, 'Method.http_methods' => strtoupper($_SERVER['REQUEST_METHOD']))));
							
				if(!$dataMethodResult){
					$this->setError("Invalid Operation", "808");
					return;
				}
				
				
				$sourceName = $dataCollectionResult['DataProvider']['SourceType']['name'];
				$provider = $dataCollectionResult['DataProvider']["params"];
				$dBase = $dataCollectionResult['DataCollection']['dbname'];
				
				App::import('Vendor', 'Sources/'. $sourceName .'DataSource');	
				
							
				
				switch($dataMethodResult['Method']['command']){
					case 'retrieve' :
						
						$sentParams = array();
						$sentParams['table'] = $dataMethodResult['Method']['alias'];
						if(isset($params['offset'])){
							$sentParams['offset'] = $params['offset'];
						}
						if(isset($params['limit'])){
							$sentParams['limit'] = $params['limit'];
						}						
						
						$finalResult = dataSource_retrieveOP($provider,$dBase, $sentParams);
						echo json_encode($finalResult);
						break;
					
					case 'create' :
						$sentParams['table'] = $dataMethodResult['Method']['alias'];
						if(isset($this->request->data)){
								$sentParams['data'] = $this->request->data;
						}		
						
											
						$status = dataSource_createOP($provider,$dBase, $sentParams);
						
						if($status){
							$this->setRes("Insert operation success!", "809");
						}else{
							$this->setError("Insert operation failed!", "810");
						}
						break;
					default:
						$this->setError("Invalid Operation", "808");
						return;	
				}
				
			
			}else if(is_numeric($dataMethod)){
				$dataMethodResult = $this->Method->find('first', array('conditions' => array('Method.alias' => $alias, 'Method.command' => $httpMethod, 'Method.http_methods' => strtoupper($_SERVER['REQUEST_METHOD']))));
							
				if(!$dataMethodResult){
					$this->setError("Invalid Operation", "807");
					return;
				}
				
				$sourceName = $dataCollectionResult['DataProvider']['SourceType']['name'];
				$provider = $dataCollectionResult['DataProvider']["params"];
				$dBase = $dataCollectionResult['DataCollection']['dbname'];
				
				App::import('Vendor', 'Sources/'. $sourceName .'DataSource');	
				
								
				switch($dataMethodResult['Method']['command']){
					case 'retrieve' :
						
						$sentParams = array();
						$sentParams['table'] = $dataMethodResult['Method']['alias'];
						$sentParams['id'] = $dataMethod;
						
						$finalResult = dataSource_retrieveOP($provider,$dBase, $sentParams);
						echo json_encode($finalResult);
						break;
						
					case 'update' :
						
						$sentParams = array();
						$sentParams['table'] = $dataMethodResult['Method']['alias'];
						$sentParams['id'] = $dataMethod;
						if(isset($this->request->data)){
								$sentParams['data'] = $this->request->data;
						}			
						
						
						$status = dataSource_updateOP($provider,$dBase, $sentParams);
						
						if($status){
							$this->setRes("Update operation Success!", "809");
						}else{
							$this->setError("Update operation failed!", "810");
						}
						break;
						
					case 'delete' :
						
						$sentParams = array();
						$sentParams['table'] = $dataMethodResult['Method']['alias'];
						$sentParams['id'] = $dataMethod;						
						
						$status = dataSource_deleteOP($provider,$dBase, $sentParams);
						
						if($status){
							$this->setRes("Delete operation success!", "809");
						}else{
							$this->setError("Delete operation failed!", "810");
						}
						break;		
				}
			
			}
			
			
	}
	
	
	private function setError($message, $code){
		echo '{"message": "'. $message . '", "code": "'. $code . '"}';
		$this->response->statusCode(400);
	}

	private function setRes($message, $code){
		echo '{"message": "'. $message . '", "code": "'. $code . '"}';
		$this->response->statusCode(200);
	}
	

}