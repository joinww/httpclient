# httpclient
### HttpClient is a sample components for connect url
###
###
###

# How to use
##### require_once 'path/vendor/autoload.php';

##### $httpClient = new HttpClient\Client();
##### $response = $httpClient->get('https://www.baidu.com/s?wd=php');
##### var_dump($response);

##### $httpClient->post($url,$params,$cookie);
##### $response = $httpClient->post('http://test.monitor.com/tests/post.php',['wd'=>'php'],['st'=>1,'ad'=>1]);

##### var_dump($response->getBody());
