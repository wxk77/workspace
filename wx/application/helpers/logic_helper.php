<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('check_login'))
{
    /**
     * Check whether the user has loginned.
     * @return bool
     */
    function check_login()
    {
        $CI =& get_instance();
        if ( ! strlen( $CI->session->userdata('token') ) OR $CI->session->userdata('expire') < time() ) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

if ( ! function_exists('get_userid'))
{
    /**
     * Get login user id.
     */
    function get_userid()
    {
        // Check user login
        $is_login = check_login();
        if (FALSE === $is_login) {
            header('Location: '. site_url('user/login'));
        }
        $CI =& get_instance();
        return $CI->session->userdata('userid');
    }
}

if ( ! function_exists('show_error'))
{
    /**
     * Show error page
     * @param string $message
     */
    function show_error($message)
    {
        $CI =& get_instance();
        $CI->load->view('errors/404', array('message'=>$message));
        $CI->output->_display();
        exit;
    }
}
