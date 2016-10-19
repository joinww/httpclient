<?php
namespace HttpClient;

class Client{
	/**
	 * connection 对象
	 * @var BaseConn
	 */
	private $conn;

	public function __construct(){
		$this->conn = new BaseConn();
	}

	/**
	 * http get 请求
	 * @param  string $url  请求地址
	 * @param  string|array $data 请求体
	 * @return Response       返回对象
	 */
	public function get($url,$data=null){
		$request = new Request();
		$request->setUrl($url);
		if($data){
			$request->setQueryData($data);
		}
		if($cookie){
			$request->setCookie($cookie);
		}
		if($header){
			$request->setHeader($header);
		}

		$this->conn->setRequest($request);
		return $this->conn->request();
	}

	/**
	 * http post 请求
	 * @param  string $url    请求地址
	 * @param  string|array $data   请求体
	 * @param  string|array $cookie cookie
	 * @param  array $header header
	 * @return Response         返回对象
	 */
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

		$this->conn->setRequest($request);
		return $this->conn->request();
	}

	public function put(){
		throw new \Exception("未实现", 1);
	}

	public function delete(){
		throw new \Exception("未实现", 1);
	}
}