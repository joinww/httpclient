<?php
namespace HttpClient;

class Client{
	private $_conn;

	public function __construct(){
		$this->_conn = new BaseConn();
	}

	public function get($url,$data=null){
		$request = new Request();
		$request->setUrl($url);
		if($data){
			$request->setQueryData($data);
		}

		$this->_conn->setRequest($request);
		return $this->_conn->request();
	}

	public function post($url,$data,$cookie=null,$header=null){
		$request = new Request();
		$request->setUrl($url);
		$request->setPostType(true);
		$request->setQueryData($data);
		if($cookie){
			$request->setCookie($cookie);
		}
		if($header){
			$request->setHeader($header);
		}

		$this->_conn->setRequest($request);
		return $this->_conn->request();
	}

	public function put(){
		throw new \Exception("未实现", 1);
	}

	public function delete(){
		throw new \Exception("未实现", 1);
	}
}