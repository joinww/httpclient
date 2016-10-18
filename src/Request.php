<?php
namespace HttpClient;

class Request{
	/**
	 * 请求数据
	 * @var string
	 */
	private $_queryData = null;
	/**
	 * 是否POST请求
	 * true：post 默认
	 * false：get
	 * @var bool
	 */
	private $_postType = false;

	private $_url;

	private $_cookie = null;

	/**
	 * [$_header description]
	 * @var Array
	 */
	private $_header = array('Expect:');

	public function __construct(){

	}

	public function setQueryData($queryData){
		if(is_array($queryData)){
			$this->_queryData = http_build_query($queryData);
		}else{
			$this->_queryData = $queryData;
		}
	}

	public function getQueryData(){
		return $this->_queryData;
	}

	public function setPostType($postType){
		$this->_postType = $postType;
	}

	public function getPostType(){
		return $this->_postType;
	}

	public function getUrl(){
		return $this->_url;
	}

	public function setUrl($url){
		$this->_url = $url;
	}

	public function setCookie($cookie){
		if(is_array($cookie)){
			$_c = '';
			foreach ($cookie as $key => $value) {
				$_c .= "$key=$value; ";
			}
			$this->_cookie = $_c;
		}else{
			$this->_cookie = $cookie;	
		}		
	}

	public function getCookie(){
		return $this->_cookie;
	}

	public function setHeader($header){		
		$this->_header = array_merge($this->_header,$header);
	}

	public function getHeader(){
		return $this->_header;
	}

}