<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//header('Content-type:text/plain;charset=utf-8');
/**
 * Class Shop
 */
class Shop extends CI_Controller
{
    /**
     * Get detail info of shop.
     * @param $shopid int
     */
    public function detail($shopid = 0)
    {
        if ( ! is_numeric($shopid) OR $shopid < 1 ) {
            show_error('请输入合法的店铺编号');
        }

        // Check user login
        $is_login = check_login();
        $userid = FALSE !== $is_login ? $this->session->userdata('userid') : 0;

        // Fetch shop base information.
        $result = $this->api->GetShopInfo($shopid, $userid);
        if (isset($result['error'])) {
            show_error($result['error']);
        }
        $base_info = $result['ShopDetailInfo'];

        // Fetch subsidy information
        $result = $this->api->GetShopSubsidyInfo($shopid, $userid);
        if (isset($result['error'])) {
            show_error($result['error']);
        }
        $subsidy = $result;

        // ShopDiscussCount
        $result = $this->api->GetTuGouDiscussListV2($shopid, FALSE, array('Size'=>3));
        if (isset($result['error'])) {
            show_error($result['error']);
        }
        $discuss = $result;

        // ShopDealKoubeiCount
        $result = $this->api->SearchDealKouBei($shopid, array('Size'=>2));
        if (isset($result['error'])) {
            show_error($result['error']);
        }
        $koubei = $result;

        // Render the view
        $this->load->view('shop/detail.php', array(
            'info'    => $base_info,
            'subsidy' => $subsidy,
            'discuss' => $discuss,
            'koubei'  => $koubei,
            'is_login'=> $is_login,
            'userid'  => $userid,
        ));
    }

    /**
     * Fetch list of discuss
     * @param int $shopid
     */
    public function discuss($shopid)
    {
        if ( ! is_numeric($shopid) OR $shopid < 1 ) {
            show_error('请输入合法的店铺编号');
        }
        $result = $this->api->GetTuGouDiscussListV2($shopid);
        if (isset($result['error'])) {
            show_error($result['error']);
        }
        $total = ceil( $result['Count']/PAGE_SIZE );
        $this->load->view('shop/discuss', array('list'=>$result, 'shopid'=>$shopid, 'total'=>$total));
    }

    /**
     * Fetch list of discuss
     * @param int $shopid
     *
     */
    public function koubei($shopid)
    {
        if ( ! is_numeric($shopid) OR $shopid < 1 ) {
            show_error('请输入合法的店铺编号');
        }
        $result = $this->api->SearchDealKouBei($shopid);
        if (FALSE === $result OR isset($result['error'])) {
            show_error($result['error']);
        }

        $total = ceil( $result['RecordCount'] / PAGE_SIZE);
        $this->load->view('shop/koubei', array('list'=>$result, 'shopid'=>$shopid, 'total'=>$total));
    }

    /**
     * Search Page Discuss
     * @param int $shopid
     * @param int $index
     * @param int $size
     */
    public function discussSearch($shopid, $index = 1, $size = PAGE_SIZE)
    {
        $search = array('Index'=>$index, 'Size'=>$size);
        $result = $this->api->GetTuGouDiscussListV2($shopid, FALSE, $search);
        $list = $result['TuGouDiscussInfoList'];
        foreach ($list as $key=>$item) {
            $list[$key]['CreateAt'] =  date('y-m-d H:i:s', substr($item['CreateAt'], 6, 10));
        }
        echo json_encode($list);
    }

    /**
     * Search Page Discuss
     * @param int $shopid
     * @param int $index
     * @param int $size
     */
    public function koubeiSearch($shopid, $index = 1, $size = PAGE_SIZE)
    {
        $search = array('Index'=>$index, 'Size'=>$size);
        $result = $this->api->SearchDealKouBei($shopid, $search);
        $list = $result['DealKouBeiInfoList'];
        echo json_encode($list);
    }

    /**
     * Add Husheng for shop.
     * @param $shopid
     * @param $userid
     * @param int $type
     */
    public function addCalling($shopid, $userid, $type = 1)
    {
        if ( ! is_numeric($shopid) OR $shopid < 1 ) {
            show_error('请输入合法的店铺编号');
        }
        $result = $this->api->UserAddShopHusheng($shopid, $userid, $type);
        echo json_encode($result);
    }

    /**
     * The detail of comment.
     */
    public function comment()
    {
        preg_match_all('/<img src=\"(?<m>.*)\"/iU', $_COOKIE['images'], $matches);

        $data = array(
            'stars'   => trim($_COOKIE['stars']),
            'content' => trim($_COOKIE['content']),
            'images'  => $matches['m'],
            'title'   => trim($_COOKIE['shopname']),
            'tugou'  => trim($_COOKIE['tugouid'])
        );
        $this->load->view('shop/commentDetail', array('data'=>$data));
    }

    /**
     * Knockdown commit
     */
    public function knockdown()
    {
        preg_match_all('/<img src=\"(?<m>.*)\"/iU', $_COOKIE['images'], $matches);

        $data = array(
            'title'   => trim($_COOKIE['title']),
            'content' => trim($_COOKIE['content']),
            'building' => trim($_COOKIE['building']),
            'createtime' => trim($_COOKIE['createtime']),
            'images'  => $matches['m'],
        );
        $this->load->view('shop/knockdown', array('data'=>$data));
    }

}