<?php

namespace Acme\App;

class Connection {

	private $connection;

	/*
	*******************************************************************************
	* Constructor function
	* @param Array
	*******************************************************************************
	*/
	public function __construct(Array $params = array()) 
	{
		if ( count($params) ) {
			foreach ( $params as $param => $value ) {
				if ( property_exists($this, $param) ) {
					$this->$param = $value;
				}
			}
		}	
	}

	public function connect($config) {

		try {
			$conn = new \PDO('mysql:host=localhost;dbname=' . $config['DB_NAME'], $config['DB_USERNAME'], $config['DB_PASSWORD']);
			$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			
			$this->setConnection($conn);

			return true;
		} catch(\PDOException $e) {
			return false;
		}
	}

	public function setConnection($conn)
	{
		$this->connection = $conn;
	}

	public function getConnection()
	{
		return $this->connection;
	}

	



}