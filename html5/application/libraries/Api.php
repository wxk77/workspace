<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Api
 *
 * As call APP interface bridge.
 *
 * @author YuanLong
 * @create 2016-06-21
 */
class Api
{
    /**
     * Base URI of APP
     * @var string
     */
    protected $base_url;

    /**
     * Instance of Supper class
     * @var
     */
    protected $CI;

    /**
     * Api constructor.
     */
    public function __construct()
    {
        $this->base_url = rtrim(APP_BASE_URL, DIRECTORY_SEPARATOR). DIRECTORY_SEPARATOR;
        $this->CI = get_instance();
        $this->CI->load->helper('curl');
    }

    public function UpLoadImageBase64($image, $format = 1)
    {
        $body = array(
            'UserId' => 0,
            'ImageString' => $image,
            'ThumbWidth'  => 0,
            'ThumbHeight' => 0,
            'ImageFormat' => $format,
            'ImageCategory' => 1
        );
        $result = $this->_request(__FUNCTION__, $body);
        return $result;
    }

    /**
     * Curl Request from APP
     *
     * @param string $function  name of interface
     * @param array  $body      body of request header
     *
     * @return array | false
     */
    protected function _request($function, $body)
    {
        $timestamp = time();
        foreach ($body as $key=>$value) {
            if (is_string($value) && strlen($value) > 0) {
                $bodys[$key] = urlencode( $value );
            } else {
                $bodys[$key] = $value;
            }

        }

        $data = array(
            'body' => $bodys,
            'requestHead' => array(
                'auth' => 'zh-cn',
                'channel' => 'Android_MCF2',
                'clientIP' => '',
                'md5' => $this->_md5($function, $body, $timestamp),
                'sessionId' => '',
                'timestamp' => $timestamp,
                'version' => APP_VERSION,
            ),
        );

        $data = urldecode( json_encode($data) );
        $url = $this->base_url. $function;
        $result = curl_request($url, TRUE, $data);

        if ($result['code'] !== 200) {
            log_message('error', '请求APP端接口异常 ：'. $function. ' -- body -- '. urldecode( json_encode($bodys) ));
            show_error('请求APP端接口异常');
        }
        $content = json_decode( $result['content'], TRUE );
        $ack = $content['ResponseStatus']['Ack'];
        if (strcasecmp('success', $ack) !== 0) {
            $errors = $content['ResponseStatus']['Errors'];
            $error = ltrim( strchr($errors[0]['Message'], '|'), '|' );
            log_message('error', '请求APP端口失败 :　'. $function. ' -- body -- '. urldecode( json_encode($bodys) ). ' -- error -- '.  $error);
            return array('success'=>FALSE, 'error'=>$error);
        }

        $body = isset($content['Body']) ? $content['Body'] : TRUE;
        return $body;
    }

    /**
     * Generate Md5 verify
     *
     * @param  string $function
     * @param  array $body
     * @param  int   $timestamp
     * @return string
     */
    protected function _md5($function, $body, $timestamp)
    {
        $temp = array();
        foreach($body as $key=>$value) {
            if (strcasecmp('PagingSetting', $key) === 0) continue;
            if (is_bool($value) OR is_array($value) OR empty($value)) continue;
            $key = strtoupper($key);
            $temp[$key] = $value;
        }
        ksort($temp);
        $string = 'AppId='. APP_ID. '&MethodName='. strtoupper($function);
        $string.= '&'. urldecode( http_build_query($temp) );
        $string.= '&ClientSecret='. CLIENT_SECRET. '&Timestamp='. $timestamp;

        return md5($string);
    }

    /**
     * Setting params of page.
     * @param $page
     * @return array
     */
    protected function _page_setting($page)
    {
        $default = array(
            'Direction' => 0,
            'Index'     => 1,
            'OrderBy'   => 0,
            'Size'      => 20,
        );
        if (empty($page)) {
            return $default;
        } else {
            return array_replace_recursive($default, $page);
        }
    }
}
