<?php

namespace Acme\App;

class Post {

	private $conn;

	public function __construct(Array $params = array())
	{	
		if (count($params)) {
			foreach ($params as $param => $value) {
				if (property_exists($this, $param)) {
					$this->$param = $value;
					//var_dump($this->$param);
				} 
			}
		}
	}

	public function all() 
	{
		$stmt = $this->conn->prepare('SELECT * FROM posts');
		$stmt->setFetchMode(\PDO::FETCH_OBJ);
		$stmt->execute();	

		return $stmt->fetchAll();

	}

	public function find($id)
	{
		$stmt = $this->conn->prepare('SELECT * FROM posts WHERE id = :id LIMIT 1');
		$stmt->setFetchMode(\PDO::FETCH_OBJ);
		$stmt->execute(array(
			'id' => $id
		));

		$results = $stmt->fetch();

		return ($results) ? $results : false;
	}

	public function create(Array $data)
	{
		if (count($data)) {
			extract($data);
		} else {
			return false;
		}

		try {
			$stmt = $this->conn->prepare('INSERT INTO posts (title, body) VALUES(:title, :body)');
			$stmt->execute(array(
				'title' => $title,
				'body' => $body
			));
		} catch(\PDOException $e) {
			return false;
		}
	}

}