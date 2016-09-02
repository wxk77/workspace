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
        $total_reply = ceil( $result['RecordCount'] / PAGE_SIZE);
        $reply = $result['TGReplyInfoList'];

        $result = $this->api->GetTuGouDiscussListV2($tugou_id, TRUE);
        $total_discuss = ceil( $result['Count'] / PAGE_SIZE);

        $this->load->view('tugou/detail', array(
            'detail'        =>$detail,
            "reply"         =>$reply,
            'total_reply'   =>$total_reply,
            'total_discuss' =>$total_discuss,
            'tugou_id'      =>$tugou_id
        ));
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
     * @param $tugou_id
     */
    public function replyList($tugou_id)
    {

        $result = $this->api->GetTuGouReplyList($tugou_id);
        $reply = $result['TGReplyInfoList'];
        foreach ($reply as $key=>$item){
            $reply[$key]['GName'] =show_replay_text($item['GName'],8);
            $reply[$key]['SName'] =show_replay_text($item['SName'],10);

        }

        echo json_encode($reply);
    }

    /**
     * fetch list of discuss
     * @param $tugou_id
     */
    public function discuss($tugou_id)
    {

        $result = $this->api->GetTuGouDiscussListV2($tugou_id, TRUE);
        $discuss = $result['TuGouDiscussInfoList'];
        foreach ($discuss as $key=>$item){
            $discuss[$key]['CreateAt'] =  date('y-m-d H:i:s', substr($item['CreateAt'], 6, 10));
        }
        echo json_encode($discuss);
    }
}