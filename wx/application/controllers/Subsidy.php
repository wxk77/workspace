<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//header('Content-type:text/plain;charset=utf-8');
/**
 * Class Subsidy
 *
 * @author  YuanLong
 * @create  2016-06-22
 */
class Subsidy extends CI_Controller
{

    /**
     * Fetch list as default config.
     * @return json
     */
    public function index()
    {
        $result = $this->api->SearchSubsidy(1);
        if (FALSE === $result OR isset($result['error'])) {
            return;
        }

        $total = $result['RecordCount'];
        $text  = $result['DisclaimerText'];
        $this->load->view('subsidy/index', array('total'=>$total, 'text'=>$text));
    }

    /**
     * Search list of subsidy
     * @param int $index  index of page
     */
    public function search($index)
    {
        $result = $this->api->SearchSubsidy($index);
        $list = $result['SubsidyInfoList'];
        echo json_encode($list);
    }

    /**
     * Detail info of subsidy
     * @param $subsidy_id
     */
    public function detail($subsidy_id)
    {
        $result = $this->api->GetSubsidyDetailInfo($subsidy_id);
        if (FALSE === $result OR isset($result['error'])) return;
        $detail = $result['SubsidyInfo'];
        $this->load->view('subsidy/detail', array('detail'=>$detail));
    }
}