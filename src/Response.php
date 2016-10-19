<?php
namespace HttpClient;

class Response{
	private $body;
	private $httpCode;

	public function __construct($httpCode,$body){
		$this->httpCode = $httpCode;
		$this->body = $body;
	}

	public function setBody($body){
		$this->body = $body;
	}

	public function getBody(){
		return $this->body;
	}

	public function setHttpCode($httpCode){
		$this->httpCode = $httpCode;
	}

	public function getHttpCode(){
		return $this->httpCode;
	}
}