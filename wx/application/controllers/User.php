<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class User
 * @create  2016-06-27
 */
class User extends CI_Controller
{
    /**
     * Display the form of login
     */
    public function login()
    {
        $callback = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $this->load->view('user/login_form', array('callback'=>$callback));
    }

    /**
     * Do login in
     */
    public function doLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (strlen($username) === 0 OR strlen($password) === 0) {
            return;
        }
        $result = $this->api->UserLogin($username, $password);
        if (FALSE === $result OR isset($result['error']) ) {
            echo json_encode($result);
            return;
        }
        $token_info = $result['TokenInfo'];
        $user_id = $result['UserBasicInfo']['Id'];
        $this->session->set_userdata('token', $token_info['Token']);
        $this->session->set_userdata('expire', str_to_time($token_info['ExpirationTime']));
        $this->session->set_userdata('userid', $user_id);

        echo json_encode($result);
    }

    /**
     * Check whether user login.
     * @return bool
     */
    public function checkLogin()
    {
        $token = $this->session->userdata('token');
        if ( strlen($token) === 0 OR $this->session->userdata('expire') < time() ) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Create Favor
     * @param int $shopid
     * @return JSON
     */
    public function createFavor($shopid)
    {
        $userid = get_userid();
        if ( ! is_numeric($shopid) OR $shopid < 1 ) {
            $response = array(
                'success' => 0,
                'error'   => '请输入合法的店铺编号'
            );
            return json_encode($response);
        }

        $result = $this->api->createFavor($shopid, $userid);
        if (isset($result['error'])) {
            $response = array(
                'success' => 0,
                'error'   => $result['error']
            );
            return json_encode($response);
        }

        $response = array(
            'success' => 1,
            'body' => $result,
        );
        echo json_encode($response);
        return json_encode($response);
    }

    /**
     * Create Favor
     * @param int $shopid
     * @return JSON
     */
    public function cancelFavor($shopid)
    {
        $userid = get_userid();
        if ( ! is_numeric($shopid) OR $shopid < 1 ) {
            $response = array(
                'success' => FALSE,
                'error'   => '请输入合法的店铺编号'
            );
            return json_encode($response);
        }

        $result = $this->api->cancelFavor($shopid, $userid);
        if (isset($result['error'])) {
            $response = array(
                'success' => FALSE,
                'error'   => $result['error']
            );
            return json_encode($response);
        }

        $response = array(
            'success' => TRUE,
            'body' => $result,
        );
        echo json_encode($response);
        return json_encode($response);
    }

}