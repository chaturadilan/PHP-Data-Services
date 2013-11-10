<?php

function dataSource_connetToDB($provider, $dbase) {
	$dbParams = json_decode($provider);
	$mysqli = new mysqli($dbParams -> host, $dbParams -> username, $dbParams -> password, $dbase, $dbParams -> port);
	if (mysqli_connect_errno($mysqli)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	return $mysqli;
}

function dataSource_loadTables($provider, $dbase) {
	$mysqli = dataSource_connetToDB($provider, $dbase);

	$tableList = array();
	$result = mysqli_query($mysqli, "SHOW TABLES");
	while ($row = mysqli_fetch_array($result)) {
		$tableList[] = array('name' => $row[0]);
	}
	mysqli_close($mysqli);
	
	return($tableList);

}


function dataSource_retrieveOP($provider, $dbase, $params = null) {
	$dbParams = json_decode($provider);	
	$mysqli = new mysqli($dbParams -> host, $dbParams -> username, $dbParams -> password, $dbase, $dbParams -> port);
	
	if (mysqli_connect_errno($mysqli)) {
		print_r("error");	
		return false;
	}else{
		//print("SELECT * FROM " . $params['table'] . ";");	
		$preString = "";
		
		if(isset($params['id'])){
			$preString .= " WHERE id=" . $mysqli->real_escape_string($params['id']);
		}
		
		if(isset($params['identifier'])){
			if(isset($params['id'])){
				$preString .= " AND ";
			}else{
				$preString .= " WHERE ";
			}
			$preString .= " ". $mysqli->real_escape_string($params['identifier']['name']) ."= '" . $mysqli->real_escape_string($params['identifier']['value']) . "'";
		}
			
		
		if(isset($params['limit'])){
			$preString .= " LIMIT " . $mysqli->real_escape_string($params['limit']);
		}
		
		if(isset($params['limit']) && isset($params['offset'])){
			$preString .= " OFFSET " . $mysqli->real_escape_string($params['offset']);
		}
		
		$query = "SELECT * FROM " . $mysqli->real_escape_string($params['table']) . $preString . ";";		
		//print($query);die();
		$result = $mysqli->query($query);
		$finalResult = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$finalResult[] = $row;
		}
		return $finalResult;	
	}	
	mysqli_close($mysqli);
}


function dataSource_createOP($provider, $dbase, $params = null) {
	$dbParams = json_decode($provider);	
	$mysqli = new mysqli($dbParams -> host, $dbParams -> username, $dbParams -> password, $dbase, $dbParams -> port);
	
	if (mysqli_connect_errno($mysqli)) {	
		return false;
	}else{
			
		$keys = array();
		$values = array();
		foreach ($params['data'] as $key => $value) {
			$keys[] = $mysqli->real_escape_string($key);
			$values[] = "'" . $mysqli->real_escape_string($value) . "'";
			
		}
		
		if(isset($params['identifier'])){
			$keys[] = 	$mysqli->real_escape_string($params['identifier']['name']);
			$values[] = "'" . $mysqli->real_escape_string($params['identifier']['value']) . "'";		
		}
		
		
		
		$preString = "(". implode(",", $keys) .") VALUES (" . implode(",", $values) . ")";
		
		$query = "INSERT INTO " . $mysqli->real_escape_string($params['table']) . $preString . ";";		
		//print($query);die();
		return $mysqli->query($query);
		
	}	
	mysqli_close($mysqli);
}

function dataSource_updateOP($provider, $dbase, $params = null) {
	$dbParams = json_decode($provider);	
	$mysqli = new mysqli($dbParams -> host, $dbParams -> username, $dbParams -> password, $dbase, $dbParams -> port);
	
	if (mysqli_connect_errno($mysqli)) {	
		return false;
	}else{
			
		$preString = "";
		foreach ($params['data'] as $key => $value) {			
			$preString .= $mysqli->real_escape_string($key) . "= '" . $mysqli->real_escape_string($value) . "'";	
			$preString .= ",";		
		}
		$preString = rtrim($preString,',');	
		
		if(isset($params['id'])){
			$preString .= " WHERE id=" . $mysqli->real_escape_string($params['id']);
		}
		
		if(isset($params['identifier'])){
			if(isset($params['id'])){
				$preString .= " AND ";
			}else{
				$preString .= " WHERE ";
			}
			$preString .= " ". $mysqli->real_escape_string($params['identifier']['name']) ."= '" . $mysqli->real_escape_string($params['identifier']['value']) . "'";
		}	
		
		$query = "UPDATE " . $mysqli->real_escape_string($params['table']). " SET " . $preString . " ;";		
				
		return $mysqli->query($query); //or die ("E: ".mysqli_error());
		
	}	
	mysqli_close($mysqli);
}


function dataSource_deleteOP($provider, $dbase, $params = null) {
		
	
	$dbParams = json_decode($provider);	
	$mysqli = new mysqli($dbParams -> host, $dbParams -> username, $dbParams -> password, $dbase, $dbParams -> port);
	
	
	
	if (mysqli_connect_errno($mysqli)) {	
		return false;
	}else{
		
		$preString ="";				
		if(isset($params['id'])){
			$preString .= " WHERE id=" . $mysqli->real_escape_string($params['id']);
		}
		
		if(isset($params['identifier'])){
			if(isset($params['id'])){
				$preString .= " AND ";
			}else{
				$preString .= " WHERE ";
			}
			$preString .= " ". $mysqli->real_escape_string($params['identifier']['name']) ."= '" . $mysqli->real_escape_string($params['identifier']['value']) . "'";
		}
			
		
		$query = "DELETE FROM " . $mysqli->real_escape_string($params['table']) . $preString . " ;";				
		return $mysqli->query($query); //or die ("E: ".mysqli_error());
		
	}	
	mysqli_close($mysqli);
}


function dataSource_customOP($provider, $dbase, $params = null) {
		
	
	$dbParams = json_decode($provider);	
	$mysqli = new mysqli($dbParams -> host, $dbParams -> username, $dbParams -> password, $dbase, $dbParams -> port);
	
	
	
	if (mysqli_connect_errno($mysqli)) {	
		return false;
	}else{
		
		$paramsData = $params['data'];	
		
		$queryString = $params['command'];	
		
		
		foreach($paramsData as $key => $paramData){
			$queryString = str_replace("{{" . $mysqli->real_escape_string($key) . "}}", $mysqli->real_escape_string($paramData), $queryString);
		}	
		
						
		$result = $mysqli->query($queryString);
		
		if(is_object($result)){
			$finalResult = array();
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$finalResult[] = $row;
			}
			return $finalResult;
		}else{
			return $result;
		}
		
		
		
	}	
	mysqli_close($mysqli);
}




?>
