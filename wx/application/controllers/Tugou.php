<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//header('Content-type:text/plain;charset=utf-8');
/**
 * Class Tugou
 *
 * @author  YuanLong
 * @create  2016-06-22
 */
class Tugou extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fetch list as default config.
     * @return json
     */
    public function index()
    {
        $result = $this->api->SearchTuGouList(1);
        if (FALSE === $result OR isset($result['error'])) {
            return;
        }
        $total = $result['RecordCount'];
        $this->load->view('tugou/index', array('total'=>$total));
    }

    /**
     * Detail info of tugou
     * @param $tugou_id
     */
    public function detail($tugou_id)
    {
        if ( ! is_numeric($tugou_id) OR $tugou_id < 1 ) {
            show_error('请输入合法的编号');
        }
        $result = $this->api->GetTuGouDetail($tugou_id);
        if (FALSE === $result OR isset($result['error'])) {
            show_error($result['error']);
        }
        $detail = $result['TGInfo'];
        $detail['CreateAt'] = display_time($detail['CreateAt']);

        $result = $this->api->GetTuGouReplyList($tugou_id);
        if (FALSE === $result OR isset($result['error'])) {
            return;
        }

        $reply = $result['TGReplyInfoList'];


        $this->load->view('tugou/detail', array('detail'=>$detail,"reply"=>$reply));
    }


    /**
     * @param $index
     */
    public function search($index)
    {
        $result = $this->api->SearchTuGouList($index);
        $list = $result['TGBasicInfoList'];

        foreach ($list as $key=>$item) {
            $list[$key]['CreateAt'] =  display_time($item['CreateAt']);
        }
        echo json_encode($list);
    }

    /**
     * fetch list of Reply
     * @param $index
     */

}