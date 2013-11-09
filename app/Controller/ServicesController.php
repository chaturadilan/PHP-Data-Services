<?php

App::uses('AppController', 'Controller');

class ServicesController extends AppController {
		
	 var $components = array('RequestHandler');	
	
	public function beforeFilter() {
        $this->Auth->allow('data', "wadl");
    }		
	
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
								
				$dataMethodResult = $this->Method->find('first', array('conditions' => array( 'DataCollection.alias' => $dataCollectionResult['DataCollection']['alias'] , 'Method.alias' => $alias, 'Method.command' => $httpMethod, 'Method.http_methods' => strtoupper($_SERVER['REQUEST_METHOD']))));
							
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
				$dataMethodResult = $this->Method->find('first', array('conditions' => array( 'DataCollection.alias' => $dataCollectionResult['DataCollection']['alias'], 'Method.alias' => $alias, 'Method.command' => $httpMethod, 'Method.http_methods' => strtoupper($_SERVER['REQUEST_METHOD']))));
							
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
			
			}else{
				$dataMethodResult = $this->Method->find('first', array('conditions' => array( 'DataCollection.alias' => $dataCollectionResult['DataCollection']['alias'], 'Method.alias' => $alias, 'Method.name' => $dataMethod)));
				
				if(!$dataMethodResult){
					$this->setError("Invalid Operation", "807");
					return;
				}
				
				if(!$dataMethodResult['Method']['is_published']){
					$this->setError("Invalid Operation", "807");
					return;
				}
				
				$sentParams['data'] = array();
				
				if($dataMethodResult['Method']['http_methods']){
					$http_methods = explode(",", $dataMethodResult['Method']['http_methods']);
					
					
					if(!is_numeric(array_search(strtoupper($_SERVER['REQUEST_METHOD']), $http_methods))){
						$this->setError("Invalid HTTP Method", "812");
						return;
					}
					
					if(strtoupper($_SERVER['REQUEST_METHOD']) == 'GET'){
						$sentParams['data'] = $this->request->query;
					}else{
						$sentParams['data'] = array_merge($this->request->query, $this->request->data);
					}
					
					
					if($dataMethodResult['Method']['command']){
						$sentParams['command'] = $dataMethodResult['Method']['command'];
					}
					
					
					$validatedInputs = array();	
					$validated = true;
					$validateMessages = array();	
					
					
					$methodParams = $dataMethodResult['MethodParam'];
					
					foreach($methodParams as $methodParam){					
						if(array_key_exists($methodParam['name'], $sentParams['data'])){
							
							if($methodParam['is_required'] && $sentParams['data'][$methodParam['name']] == ""){
								$validated = false;
								$validateMessages[] = array('field' => $methodParam['name'], 'code' => 'required' , 'message' => $methodParam['name'] . " is required");								
							}
							
							if($methodParam['validation'] == "email"){
								if(!filter_var($sentParams['data'][$methodParam['name']], FILTER_VALIDATE_EMAIL)) {
     									$validated = false;
										$validateMessages[] = array('field' => $methodParam['name'], 'code' => 'email' , 'message' => $methodParam['description']); 
										continue;
								}
							}
							
							if($methodParam['validation'] == "url"){
								if(!filter_var($sentParams['data'][$methodParam['name']], FILTER_VALIDATE_URL)) {
     									$validated = false;
										$validateMessages[] = array('field' => $methodParam['name'], 'code' => 'url' , 'message' => $methodParam['description']); 
										continue;
								}				
								
							}
							
							if($methodParam['validation'] == "phone"){
								if(!preg_match("/^\+?(\(?[0-9]{3}\)?|[0-9]{3})[-\.\s]?[0-9]{3}[-\.\s]?[0-9]{4}$/", $sentParams['data'][$methodParam['name']])) {
									 $validated = false;
										$validateMessages[] = array('field' => $methodParam['name'], 'code' => 'phone' , 'message' => $methodParam['description']);
										continue; 
								}								
							}
							
							if($methodParam['validation'] == "numeric"){
								if(!is_numeric($sentParams['data'][$methodParam['name']])) {
									 $validated = false;
									$validateMessages[] = array('field' => $methodParam['name'], 'code' => 'numeric' , 'message' => $methodParam['description']); 
									continue;
								}								
							}
							
							if($methodParam['validation'] == "alphanumeric"){
								if(!preg_match("/^[a-z0-9]+$/i", $sentParams['data'][$methodParam['name']])) {
									 $validated = false;
										$validateMessages[] = array('field' => $methodParam['name'], 'code' => 'alphanumeric' , 'message' => $methodParam['description']); 
										continue;
								}								
							}
							
							if($methodParam['validation'] == "custom"){
								if(!preg_match($methodParam['expression'], $sentParams['data'][$methodParam['name']])) {
									 $validated = false;
										$validateMessages[] = array('field' => $methodParam['name'], 'code' => 'custom' , 'message' => $methodParam['description']); 
										continue;
								}								
							}
																										
							$validatedInputs[] = array($methodParam['name'] => $sentParams['data'][$methodParam['name']]);
						}else{
							if($methodParam['is_required']){
								$validated = false;
								$validateMessages[] = array('field' => $methodParam['name'], 'code' => 'required' , 'message' => $methodParam['name'] . " is required");								
							}
						}
					}

					if(!$validated)	{
						$this->setErrorWithData("Input Validation Failed", "814", $validateMessages);						
						return;
					}else{
						$sourceName = $dataCollectionResult['DataProvider']['SourceType']['name'];
						$provider = $dataCollectionResult['DataProvider']["params"];
						$dBase = $dataCollectionResult['DataCollection']['dbname'];	
							
						App::import('Vendor', 'Sources/'. $sourceName .'DataSource');	
						$result = dataSource_customOP($provider,$dBase, $sentParams);
						if(is_array($result)){
							echo json_encode($result);
						}else{
							if($result){
							$this->setRes("Operation success!", "809");
							}else{
								$this->setError("Operation failed!", "810");
							}
						}
						
					}
												
					
					
				}else{
					$this->setError("No HTTP Method Defined", "811");
					return;
				}
				
				
				//$result = dataSource_customOP($provider,$dBase, $sentParams);
			}
			
			
	}





	public function wadl($dataApp){
		
		$this->autoRender = false;
		$this->RequestHandler->respondAs("text/xml");
		
		if(!$dataApp){
				$this->setError("Data App is required", "800");
				return;
		}
		
						
		
		$this->loadModel('DataApp');
		$this->loadModel('Method');
		$dataApp = $this->DataApp->find('first', array('conditions' => array('DataApp.alias' => $dataApp)));
		
		
		if(!$dataApp['DataApp']['is_public']){
				$this->setError("Data App is private", "803");
				return;
		}
						
		if(!$dataApp['DataApp']['is_published']){
				$this->setError("Data App is not published", "804");
				return;
		}
		
		$xmlString = ' <application xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://wadl.dev.java.net/2009/02 wadl.xsd"  xmlns:xsd="http://www.w3.org/2001/XMLSchema"   xmlns="http://wadl.dev.java.net/2009/02"> ';
		
		foreach($dataApp['DataCollection'] as $dataCollection){
			if($dataCollection['is_published']){
				$xmlString  .= '<resources base="'.Router::fullbaseUrl() . $this->webroot. 'services/data/'. $dataApp['DataApp']['alias'] . '/' . $dataCollection['alias'] . '/">';
				
				
				
				$resources = $this->Method->find('all', array('conditions' => array( 'Method.is_published' => true, 'Method.data_collection_id' => $dataCollection['id']),  'group' => 'Method.alias'));
				
				foreach($resources as $resource){
					$xmlString  .= '<resource path="'.$resource['Method']['alias'].'">';	
						
					$methods = $this->Method->find('all', array('conditions' => array( 'Method.is_published' => true, 'Method.alias' => $resource['Method']['alias'] ,  'Method.data_collection_id' => $dataCollection['id'])));
										
					foreach ($methods as $method) {
						$http_methods = explode(',' , $method['Method']['http_methods']);
						foreach($http_methods as $http_method){
							if($method['Method']['method_type_id'] == 5){
								$methodId = 'id="' . $method['Method']['name'] .'"';
							}else{
								$methodId = 'description="' . $method['Method']['command'] .'"';
							}
							
													
							
							$xmlString  .= '<method name="'.$http_method. '" ' . $methodId .'>';
							
							
							
							
							
								$xmlString  .= '<request><representation mediaType="application/json"/>';
								
								foreach($method['MethodParam'] as $methodParam){
									if($methodParam['validation'] == 'numeric'){
										$paramValidation = 'type="xsd:int"';
									}else{
										$paramValidation = 'type="xsd:string"';
									}

									if($methodParam['is_required'] == 'numeric'){
										$paramRequired = 'required="true"';
									}else{
										$paramRequired = '';
									}
									
									
									$xmlString  .= '<param name="'.$methodParam['name'].'" '.$paramValidation.' style="query" '. $paramRequired .'/>';
								}
								
								
								$xmlString  .= '</request>';
							
							
							
							$xmlString  .= '<response status="200"><representation mediaType="application/json"/></response>'; 
							$xmlString  .= '<response status="400"><representation mediaType="application/json"/></response>'; 
							
							
							
							
							$xmlString  .= '</method>';
						}
					}
					
					
					$xmlString  .= '</resource>';
				
				}
				
				$xmlString  .= '</resources>';
			}
		}
		
		
		
		$xmlString .= '</application>';
		
		echo $xmlString ;
		//print_r($dataApp);
	}
	
	
	private function setError($message, $code){
		echo '{"message": "'. $message . '", "code": "'. $code . '"}';
		$this->response->statusCode(400);
	}
	
	private function setErrorWithData($message, $code, $data){
		$messageE = array("message" => $message, 'code' => $code, 'data' => $data);
		echo json_encode($messageE);
		$this->response->statusCode(400);
	}

	private function setRes($message, $code){
		echo '{"message": "'. $message . '", "code": "'. $code . '"}';
		$this->response->statusCode(200);
	}
	

}