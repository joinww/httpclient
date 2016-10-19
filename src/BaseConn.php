<?php
namespace HttpClient;

class BaseConn{
	/**
	 * 请求对象
	 * @var Request
	 */
	private $request;

	/**
	 * 超时时间，默认5s
	 */
	const TIMEOUT = 5;
	const USERAGENT = "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)";

	public function setRequest($request){
		$this->request = $request;
	}

	public function getRequest(){
		return $this->request;
	}

	/**
	 * 发送请求
	 * @return [Response] [响应对象]
	 */
	public function request(){
		try{
			$ch = curl_init($this->request->getUrl());
			/**
			 * 启用后对FTP传输使用ASCII模式。对于LDAP，它检索纯文本信息而非HTML。
			 * 在Windows系统上，系统不会把STDOUT设置成binary模式。
			**/
			//curl_setopt($ch,CURLOPT_TRANSFERTEXT,TRUE);
			
			/**
			 * 将 curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
			 */
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);

			curl_setopt($ch,CURLOPT_TIMEOUT,BaseConn::TIMEOUT);
			curl_setopt($ch,CURLOPT_USERAGENT,BaseConn::USERAGENT);

			/**
			 * 禁用后cURL将终止从服务端进行验证。
			 */
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
			curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);

			
			if($postType = $this->request->getPostType()){
				curl_setopt($ch,CURLOPT_POST,TRUE);
				curl_setopt($ch,CURLOPT_POSTFIELDS,$this->request->getQueryData());
			}

			/**
			 * 设定HTTP请求中"Cookie: "部分的内容。
			 * 多个cookie用分号分隔，分号后带一个空格(例如， "fruit=apple; colour=red")。
			 * @var string
			 */
			if($cookie = $this->request->getCookie())
				curl_setopt($ch,CURLOPT_COOKIE,$cookie);

			/**
			 * 一个用来设置HTTP头字段的数组。
			 * 使用如下的形式的数组进行设置： array('Content-type: text/plain', 'Content-length: 100')
			 * @var array
			 */
			if($header = $this->request->getHeader())
				curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
			var_dump($header);

			$body = curl_exec($ch);
			$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);

			$response = new Response($httpCode,$body);

			curl_close($ch);
		}
		catch(\Exception $ex){
			throw new \Exception("Request data Error.", 1);			
		}

		return $response;
	}
}