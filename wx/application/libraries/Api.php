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

    /**
     * Fetch the regions in city as list
     * @param int $cid
     * @return array
     */
    public function GetCityRegionList($cid = 1)
    {
        $body = array( 'cityId'=>$cid );
        $result = $this->_request(__FUNCTION__, $body);

        return $result;
    }

    /**
     * Fetch subsidies as list
     * @param  int     $index   page index
     * @return array
     */
    public function SearchSubsidy($index)
    {
        $body = array(
            'CityRegionIds' => array(),
            'IndustryIds'   => array(),
            'Key'           => '',
            'PagingSetting' => array(
                'Direction' => 0,
                'Index'     => $index,
                'OrderBy'   => 0,
                'Size'      => 20,
            ),
            'SubsidyMaxValue' => 0.0,
            'SubsidyMinValue' => 0.0,
            'CityId'        => 1,
            'IsMCEnsure'    => 0,
            'IsShopEnsure'  => 0,
            'UserId'        => 0,
        );
        $result = $this->_request(__FUNCTION__, $body);

        return $result;
    }

    /**
     * Get detail of subsidy
     * @param int $subsidy
     * @param int $userid
     * @return array | bool
     */
    public function GetSubsidyDetailInfo($subsidy, $userid = 0)
    {
        $body = array('SubsidyId'=>$subsidy, 'UserId'=>$userid);
        $result = $this->_request(__FUNCTION__, $body);
        return $result;
    }

    /**
     * Fetch tuGou as list
     * @return array
     */
    public function SearchTuGouList($index)
    {
        $body = array(
            'PagingSetting' => array(
                'Direction' => 0,
                'Index'     => $index,
                'OrderBy'   => 0,
                'Size'      => 20,
            ),
            'BId'           => 0,
            'CategoryId'    => 0,
            'CityId'        => 1,
            'CityRegionId'  => 0,
            'FavorUserId'   => -1,
            'FuncType'      => 0,
            'IndustryId'    => 0,
            'Status'        => 0,
            'UserId'        => 0,
        );
        $result = $this->_request(__FUNCTION__, $body);

        return $result;
    }

    /**
     * Get tugou detail info
     * @param int $togou_id
     * @return array
     */
    public function GetTuGouDetail($togou_id)
    {
        $body = array(
            'TGId' => $togou_id,
            'FavorUserId' => -1,
        );
        $result = $this->_request(__FUNCTION__, $body);

        return $result;
    }

    /**
     * Get GetTuGouReplyList info
     * @param int $tugou_id
     * @param array $page
     * @return array
     */
    public function GetTuGouReplyList($tugou_id, $page = array())
    {
        $body = array(
            "ReplyStatus" => 0,
            "TGId" => $tugou_id,
            "PagingSetting" => $this->_page_setting($page)
        );
        $result = $this->_request(__FUNCTION__, $body);

        return $result;
    }

    /**
     * Create customer service
     * @param string $username
     * @param string $mobile
     * @param string $suggest
     * @return bool
     */
    public function CreateCustomerService($username, $mobile, $suggest)
    {
        $body = array(
            'UserName'   => $username,
            'UserMobile' => $mobile,
            'Suggestion' => $suggest,
            'Channel'    => 1,
        );
        $result = $this->_request(__FUNCTION__, $body);

        return $result;
    }

    /**
     * User login
     * @param username
     * @param password
     * @return bool
     */
    public function UserLogin($username, $password)
    {
        $body = array(
            'deviceId' => '',
            'uniqueId' => '',
            'userName' => $username,
            'userPassword' => md5($password),
            'sourceType' => 0,
        );

        $result = $this->_request(__FUNCTION__, $body);
        return $result;
    }

    /**
     * Get base information of shop.
     * @param int $shopid
     * @return bool | array
     */
    public function GetShopInfo($shopid)
    {
        $body = array(
            'ShopId' => $shopid,
            'UserId' => 0,
        );

        $result = $this->_request(__FUNCTION__, $body);
        return $result;
    }

    /**
     * Get detail information of shop about subsidy list.
     * @param int $shopid
     * @param int $userid
     * @return bool | array
     */
    public function GetShopSubsidyInfo($shopid, $userid = 0)
    {
        $body = array(
            'ShopId' => $shopid,
            'UserId' => $userid,
        );

        $result = $this->_request(__FUNCTION__, $body);
        return $result;
    }

    /**
     * User add Husheng for shop.
     */
    public function UserAddShopHusheng($shopid, $userid = 0, $type = 1)
    {
        $body = array(
            'ShopId' => $shopid,
            'UserId' => $userid,
            'Type'   => $type,
            'PayPwd' => '',
        );
        $result = $this->_request(__FUNCTION__, $body);
        return $result;
    }

    /**
     * Get Discuss Count.
     * @param  int       $shopid
     * @param  array     $page
     * @return bool | array
     */
    public function GetTuGouDiscussListV2($shopid, $page = array())
    {
        $body = array(
            'PagingSetting' => $this->_page_setting($page),
            'CreateUserId' => 0,
            'DiscussId'    => 0,
            'GoodsId'      => 0,
            'IsShowPicComment'   => 0,
            'IsUserDiscussGoods' => 0,
            'MallId' => 0,
            'ShopId' => $shopid,
            'TuGouId'=> 0,
            'UserId' => 0
        );
        $result = $this->_request(__FUNCTION__, $body);
        return $result;
    }

    /**
     * Get KouBei List.
     * @param int $shopid
     * @param array $page
     * @return bool | array
     */
    public function SearchDealKouBei($shopid, $page = array())
    {
        $body = array(
            'PagingSetting' => $this->_page_setting($page),
            'CreateUserId' => 0,
            'MallId' => 0,
            'ShopId' => $shopid,
            'UserId' => -1
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
                'version' => '2.9.9'
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
