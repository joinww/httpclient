# httpclient
### HttpClient is a sample components for connect url
###
###
###

# How to use
##### require_once 'path/vendor/autoload.php';

##### $httpClient = new HttpClient\Client();

##### $url = 'https://www.baidu.com/s?wd=php';
##### $response = $httpClient->get($url);

##### var_dump($response->getBody());

##### $url = 'http://127.0.0.1/tests/post.php';
##### $params = ['wd'='php'];
##### $cookies = ['st'=>1,'ad'=>1];
##### $response = $httpClient->post($url,$params,$cookies);

##### var_dump($response->getBody());
