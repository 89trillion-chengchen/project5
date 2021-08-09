<?php
/**
 * 接口通用响应方法类
 * 将各个接口中数据转换为指定格式并响应
 *
 * @file    AnswerService.php
 * @date    2014-02-26
 * @author  MiaoYushun <miaoyushun@gmail.com>
 */
namespace service;

use utils\Functions;
use utils\HttpUtil;

class AnswerService
{
    /**
     * 纯文本原始格式响应
     */
    public static function plainResponse($data)
    {
        die($data);
    }

    /**
     * JSON格式数据响应
     */
    public static function jsonResponse($data)
    {
        $json = json_encode($data);
        die($json);
    }

    /**
     * XML格式数据响应
     */
    public static function xmlResponse($data)
    {
        $xml = self::arrayToXml($data);
        die($xml);
    }
    
    /**
     * 构造通用的响应数组结构
     */
    public static function makeResponseArray($errKey,$data=array(),$noDataKey=false)
    {
        !is_array($data) ? $data = array() : 1;
        list($code,$msg) = self::getResponseCodeAndMsg($errKey);
        $response = array(
                        'code'   => $code,
                        'msg'    => $msg,
                    );
        if($noDataKey){
            $response += $data;
        }
        else{
            $response += array('data' => $data);
        }

        return $response;
    }

    /**
     * 获取错误KEY对应的错误码和错误描述
     */
    public static function getResponseCodeAndMsg($errKey)
    {
    	
        $responseConfig = Functions::getGlobalVars("response");
		$params = HttpUtil::getQueryData();
        if(isset($responseConfig[$errKey])){
            return $responseConfig[$errKey];
        }

        return $responseConfig[DEFAULT_ERROR_KEY];
       
    }

    /**
     * 重定向响应
     */
    public static function redirectResponse($url)
    {
        header("Location: $url");
        exit;
    }

    /**
     * The main function for converting to an XML document.
     * Pass in a multi dimensional array and this recrusively loops through and builds up an XML document.
     *
     * @param array $data
     * @param string $rootNodeName - what you want the root node to be - defaultsto data.
     * @param SimpleXMLElement $xml - should only be used recursively
     * @return string XML
     */
    private function arrayToXml($data, $rootNodeName = 'data', $xml=null)
    {
        // turn off compatibility mode as simple xml throws a wobbly if you don't.
        if (ini_get('zend.ze1_compatibility_mode') == 1)
        {
            ini_set ('zend.ze1_compatibility_mode', 0);
        }
         
        if ($xml == null)
        {
            $xml = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$rootNodeName />");
        }
         
        // loop through the data passed in.
        foreach($data as $key => $value)
        {
            // no numeric keys in our xml please!
            if (is_numeric($key))
            {
                // make string key...
                $key = "item";//. (string) $key;
            }
             
            // replace anything not alpha numeric
            $key = preg_replace('/[^a-z_0-9]/i', '', $key);
             
            // if there is another array found recrusively call this function
            if (is_array($value))
            {
                $node = $xml->addChild($key);
                // recrusive call.
                self::arrayToXml($value, $rootNodeName, $node);
            }
            else
            {
                // add single node.
                $value = $value;
                $xml->addChild($key,$value);
            }
             
        }
        // pass back as string. or simple xml object if you want!
        //return $xml->asXML();

        $dom = dom_import_simplexml($xml)->ownerDocument;
        $dom->formatOutput = true;
        return $dom->saveXML();
    }
}
