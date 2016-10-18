<?php
namespace HttpClient;

class Response{
	private $_body;
	private $_httpCode;

	public function __construct($httpCode,$body){
		$this->_httpCode = $httpCode;
		$this->_body = $body;
	}

	public function setBody($body){
		$this->_body = $body;
	}

	public function getBody(){
		return $this->_body;
	}

	public function setHttpCode($httpCode){
		$this->_httpCode = $httpCode;
	}

	public function getHttpCode(){
		return $this->_httpCode;
	}
}