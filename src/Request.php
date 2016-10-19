<?php
namespace HttpClient;

class Request{
	/**
	 * 请求数据
	 * @var string
	 */
	private $queryData = null;
	/**
	 * 是否POST请求
	 * true：post 默认
	 * false：get
	 * @var bool
	 */
	private $postType = false;

	private $url;

	private $cookie = null;

	/**
	 * [$_header description]
	 * @var Array
	 */
	private $header = array('Expect:');

	public function __construct(){

	}

	public function setQueryData($queryData){
		if(is_array($queryData)){
			$this->queryData = http_build_query($queryData);
		}else{
			$this->queryData = $queryData;
		}
	}

	public function getQueryData(){
		return $this->queryData;
	}

	public function setPostType($postType){
		$this->postType = $postType;
	}

	public function getPostType(){
		return $this->postType;
	}

	public function getUrl(){
		return $this->url;
	}

	public function setUrl($url){
		$this->url = $url;
	}

	public function setCookie($cookie){
		if(is_array($cookie)){
			$_c = '';
			foreach ($cookie as $key => $value) {
				$_c .= "$key=$value; ";
			}
			$this->cookie = $_c;
		}else{
			$this->cookie = $cookie;	
		}		
	}

	public function getCookie(){
		return $this->cookie;
	}

	public function setHeader($header){		
		$this->header = array_merge($this->header,$header);
	}

	public function getHeader(){
		return $this->header;
	}

}