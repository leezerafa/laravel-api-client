<?php 


require_once('classes/apiConnect.php');

$url = 'http://192.168.33.10/api/v1/gettest';
// $url = 'http://www.google.com';
$parameters = array(
	'user_key'   => '$2y$10$DeFd6Q6/zTb86sj62aQw4uGGk50xIAzXy1f/FFmNK.0mcHLBdD3j.',
	'api_key'    => '$2y$10$QIMOjy9HmAw6FY3q5ZXdS.AdeGl6McHP5fZsYV.k.UfO0p/Jvmcd6',
	'table_name' => 'test'
);
$apiConnect = new apiConnect($url,$parameters);
$apiResults = $apiConnect->returnApiData();
// $curl = curl_init();
// curl_setopt ($curl, CURLOPT_URL, 'http://192.168.33.10/api/v1/gettest?user_key=$2y$10$DeFd6Q6/zTb86sj62aQw4uGGk50xIAzXy1f/FFmNK.0mcHLBdD3j.&api_key=$2y$10$QIMOjy9HmAw6FY3q5ZXdS.AdeGl6McHP5fZsYV.k.UfO0p/Jvmcd6&table_name=test');
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// // $apiResults = curl_exec ($curl);

// $apiResults = curl_exec($curl);

// if($apiResults === false)
// {
//     echo 'Curl error: ' . curl_error($curl);
// }
// else
// {
//     echo 'Operation completed without any errors';
// }

// curl_close ($curl);
print_r($apiResults);

 ?>