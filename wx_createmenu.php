<?php
define("APPID","wxaabe33e0a92f4f14");
define("APPSECRET","58d0e0c1a548a9be91197135debc1047");
$appid = APPID;
$appsecret = APPSECRET;
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
$jsoninfo = json_decode($output, true);
$access_token = $jsoninfo["access_token"];
$domain = "http://61.153.52.70:19810";
$jsonmenu = '{      
				"button":[
				{
					"name":"关于我们",
					"sub_button":[
					{ 	
						"type":"view",
						"name":"公司简介", 
						"url":"'.$domain.'/about.php"           
					},
					{    
						"type":"view",
						"name":"成员",  
						"url":"'.$domain.'/members.php"           						  },
					{        
						"type":"view",              
						"name":"联系我们",    
						"url":"'.$domain.'"        
					}]  
				 }, 
				{
					"name":"作品列表", 
					"sub_button":[     
					 {   
						 "type":"view",
						 "name":"路引系统",
						 "url":"'.$domain.'/projects.php"     
					 }]
				}
			]
			}';
$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
$result = https_request($url, $jsonmenu);
var_dump($result);
function https_request($url,$data = null)
{  
  	$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	if (!empty($data)){        
		curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	}  
  	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   $output = curl_exec($curl);
	curl_close($curl);
    return $output;
}
?>
