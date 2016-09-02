<?php defined('BASEPATH') OR exit('No direct script access allowed');

//header('Content-type:text/plain;charset=utf-8');
class Special extends My_Controller
{

    public function index()
    {
        $where = "1=1";
        $page_size = 5;
        $offset = isset($this->uri->segments[3]) ? ($this->uri->segments[3] - 1) * $page_size : 0;

        $total = $this->special_model->count($where);
        $this->load->library('paginationlib');
        $this->paginationlib->initPagination('special/index/', $total, $page_size);

        $result = $this->special_model->lists($where, $offset, $page_size);
        $this->load->view("special/list", array("special"=>$result) );
    }

    public function create()
    {
        $data = $this->getPostData();

        // base data
        $special_base['theme'] = $data['theme'];
        $special_base['title'] = $data['page']['title'];
        $special_base['share_title'] = $data['page']['share']['title'];
        $special_base['share_link'] = $data['page']['share']['link'];
        $special_base['share_desc'] = $data['page']['share']['describe'];
        $special_base['share_image'] = $data['page']['image'];
        $special_base['username'] = $this->session->userdata("username");
        unset($data['theme']);
        unset($data['page']);
        $special_id = $this->special_model->create($special_base);
        if ($special_id < 1) {
            echo json_encode(array("success"=>false, "id"=>"", "theme"=>""));
            return;
        }

        // header info
        $special_header['special_id'] = $special_id;
        $special_header['type'] = 1;
        $special_header['data'] = json_encode($data['header'],JSON_UNESCAPED_UNICODE);
        unset($data['header']);
        $this->specialDatas_model->create($special_header);

        //type = content
        $special_content['special_id'] = $special_id;
        $special_content['type'] = 2;
        $special_content['data'] = json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->specialDatas_model->create($special_content);

        echo json_encode(array("success"=>true, "id"=>$special_id, "theme"=>$special_base['theme']));
    }

    public function appendData($id, $theme)
    {
        $this->load->view('special/addDataForm'. $theme, array('id'=>$id, "theme"=>$theme));
    }

    public function appendContent($id, $theme)
    {
        $data = $this->getPostData();
        $special_content['special_id'] = $id;
        $special_content['type'] = 2;
        $special_content['data'] = json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->specialDatas_model->create($special_content);

        echo json_encode(array("success"=>true, "id"=>$id, "theme"=>$theme));

    }

    public function preview($id)
    {
        $datas = $this->specialDatas_model->fetch($id);
        $special = array();
        foreach($datas as $data) {
            if($data['type'] < 2){
                $special['header'] = json_decode($data['data'], true);
            } else {
                $special['content'][] = json_decode($data['data'], true);
            }
        }
        $special['page'] = (array)$this->special_model->fetch($id);

        $this->load->view('special/preview-theme'. $special['page']['theme'], array('special'=>$special));
    }

    //预览头部信息
    public function headerPreview($id,$theme)
    {

        $result= (array)$this->specialDatas_model->fetchHeader($id);
        $header_info=json_decode($result['data'], true);
        $this->load->view('previews/preview-header'.$theme, array('special'=>$header_info,"theme"=>$theme));

    }

    //预览主题内容
    public function contentPreview($id,$theme)
    {
        $result = (array)$this->specialDatas_model->fetchContent($id);
        $content = json_decode($result['data'], true);
        $this->load->view('previews/preview-content'.$theme, array('special'=>$content,"theme"=>$theme, "id"=>$id));
    }

    public function edit($id, $theme)
    {
        $datas = $this->specialDatas_model->fetch($id);
        $special = array();
        foreach($datas as $data) {
            if($data['type'] < 2){
                $key =$data['id'];
                $special['header'][$key] = json_decode($data['data'], true);
            } else {
                $key = $data['id'];
                $special['content'][$key] = json_decode($data['data'], true);
            }
        }
        $special['page'] = (array)$this->special_model->fetch($id);
        $this->load->view("special/data-list", array('special'=>$special, 'id'=>$id, "theme"=>$theme));
    }

    public function editPageInfo($id)
    {
        $page_info = (array)$this->special_model->fetch($id);
        $this->load->view('special/page-modify', array('data'=>$page_info));
    }

    public function editHeader($id,$theme)
    {
        $result = (array)$this->specialDatas_model->fetchHeader($id);
        $header_info = json_decode($result['data'], true);

        $this->load->view('special/header-modify'.$theme, array('data'=>$header_info, 'id'=>$result['id'],"theme"=>$theme));
    }

    public function editContent($id, $theme)
    {
        $result = (array)$this->specialDatas_model->fetchContent($id);
        $content = json_decode($result['data'], true);
        $this->load->view('special/editDataForm'. $theme, array('special'=>$content, "theme"=>$theme, "id"=>$id));
    }

    public function modifyContent($id)
    {
        $data = $this->getPostData();
        $result = $this->specialDatas_model->modify($id, $data);
        echo json_encode(array("success"=>$result));
    }

    public function modifyHeader($id)
    {
        $data = $this->getPostData();
        if (isset($data['header']['image']) && strlen($data['header']['image']) > 0) {
            $data['image'] = $data['header']['image'];
            unset($data['header']);
        }
        $result = $this->specialDatas_model->modify($id, $data);
        echo json_encode(array("success"=>$result));
    }

    public function modifyPageInfo($id)
    {
        $data = $this->getPostData();
        $special_base['title'] = $data['page']['title'];
        $special_base['share_title'] = $data['page']['share']['title'];
        $special_base['share_link'] = $data['page']['share']['link'];
        $special_base['share_desc'] = $data['page']['share']['describe'];
        $special_base['share_image'] = $data['page']['image'];
        $special_base['username'] = $this->session->userdata("username");

        $result = $this->special_model->modify($id, $special_base);
        echo json_encode(array("success"=>$result));
    }

    public function delete()
    {
        $id = $_POST["id"];
        $result = $this->special_model->delete($id);
        echo json_encode(array("success"=>$result));
    }

    public function delete_content()
    {
        $id = $_POST["id"];
        $result = $this->specialDatas_model->delete($id);
        echo json_encode(array("success"=>$result));
    }

    public function getPostData()
    {
        $data = $_POST;

        $prefixs = array('Image', 'Logo', 'Background');
        foreach($_FILES as $key=>$val) {
            if ($val['error'] == 4) continue;
            foreach($prefixs as $prefix) {
                if (strpos($key, $prefix) !== FALSE) {
                    $end = $prefix;
                    break;
                }
            }

            $k = str_replace($end, '', $key);
            $end = strtolower($end);
            if (is_numeric(substr($k, -1))) {
                $node = substr($k, -1);
                $k = str_replace($node, '', $k);
                $data["$k"][$node]["$end"] = $this->getImage($key);
            } else {
                $data["$k"]["$end"] = $this->getImage($key);
            }
        }

        return $data;
    }

    public function getImage($key)
    {
        if ( ! isset($_FILES[$key])) {
            return;
        }
        $file_info = $_FILES[$key];
        $suffix = strtolower(ltrim(strrchr($file_info['name'], '.'), '.'));
        $format = 1;
        if ($suffix == 'png') {
            $format = 2;
        } elseif($suffix == 'gif') {
            $format = 3;
        }
        $image = base64_encode(file_get_contents($file_info['tmp_name']));
        $result = $this->api->UpLoadImageBase64($image, $format);
        return $result['ImageUrl'];
    }
}