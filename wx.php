<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "helloworld");

$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])){
	$wechatObj->valid();
}else{
	$wechatObj->responseMsg();
}

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }


    public function responseMsg()
    {
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

		if (!empty($postStr)){
			libxml_disable_entity_loader(true);
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$fromUsername = $postObj->FromUserName;
			$toUsername = $postObj->ToUserName;
			$keyword = trim($postObj->Content);
			$time = time();
			$RX_TYPE = trim($postObj->MsgType);            
			switch ($RX_TYPE)
			{         
			case "event":                    
			$result = $this->receiveEvent($postObj);
			break;
			}            
			echo $result;
		}else {           
	   				echo "";
		            exit;
		}

    }

	private function receiveEvent($object)
	{
		$content ="";
		switch($object->Event)
		{
		case "subscribe":
			$content ="欢迎关注汉符设计";
			break;
		case "unsubscribe":
			$content = "";
			break;
		}
		$result = $this->transmitText($object, $content);
		return $result;
	}	

	private function transmitText($object, $content)
	{
 		$textTpl = "
		<xml>
		<ToUserName> <![CDATA[%s]]> </ToUserName>
		<FromUserName> <![CDATA[%s]]> </FromUserName>
		<CreateTime>%s </CreateTime>
		<MsgType> <![CDATA[text]]> </MsgType>
		<Content> <![CDATA[%s]]> </Content>
		</xml>";
		$domain="http://61.153.52.70:19810";
		$picTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[news]]></MsgType>
					<ArticleCount>1</ArticleCount>
					<Articles>
					<item>
						<Title><![CDATA[汉符设计]]></Title>
						<Description><![CDATA[欢迎关注]]></Description>
						<PicUrl><![CDATA[".$domain."/img/logo.jpg]]></PicUrl>
						<Url><![CDATA[".$domain."]]></Url>
					</item>
					</Articles>
				</xml> ";
		$result = sprintf($picTpl, $object->FromUserName, $object-> ToUserName, time());
		return $result;
		
	}


	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>
