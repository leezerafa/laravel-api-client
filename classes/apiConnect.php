<?php 

class apiConnect
{

	public function __construct($url,$parameters)
	{
		$this->url 		  = $url;
		$this->parameters = $parameters;
		// $this->returnApiData();
	}

	public function returnApiData(){
		
		$url = $this->buildUrl();
		//open connection
		// print_r($url);
		if (!function_exists('curl_init')){
        	return 'Sorry cURL is not installed!';
    	}
    	// print_r($url);
		$curlHandle = curl_init();
		curl_setopt ($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 5);
	    curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);

	    //https only, please!
	    //curl_setopt($curlHandle, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);

	    //ALWAYS verify SSL - this should NEVER be changed. 2 = strict verify
	    //curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);

	    //return the result from the server as the return value of curl_exec instead of echoing it
	    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
	    //specifiy the request

	    $apiResult = curl_exec($curlHandle);
	    // print_r($apiResult);

	    if($apiResult === false)
	    {
	    	// let's see what went wrong -- first look at curl
	    	$humanReadableError = curl_error($curlHandle);

	        // you can also get the HTTP response code
	        $httpResponseCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
	    	// curl_close($curlHandle);

	    	return ("Unable to successfully complete API call to $url -- curl error: \r\n$humanReadableError\r\n, HTTP response code was: $httpResponseCode");
	    } 
	  
	    // curl_close($curlHandle);

		//as the api call returns a 
		// $apiResult = json_decode($apiResult);
		return $apiResult;

	}

	// build out the full url, with the query string attached.
	protected function buildUrl(){

		$queryString = http_build_query($this->parameters, null, '&');
		if (strpos($this->url, '?') !== false) {
		    $url = $this->url . '&' . $queryString;
		} else {
		    $url = $this->url . '?' . $queryString;
		}

		return $url;
	}
}




 ?>

