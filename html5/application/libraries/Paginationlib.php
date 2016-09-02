<?php

class Paginationlib {

    function __construct()
    {
        $this->ci =& get_instance();
    }

    public function initPagination($base_url, $total_rows, $page_size = 5, $segment = 3)
    {
        $this->ci->load->library('pagination');
        $config = array(
            'per_page' => $page_size,
            'uri_segment' => $segment,
            'base_url'    => base_url(). $base_url,
            'total_rows'  => $total_rows,
            'use_page_numbers' => TRUE,
            'first_tag_open'   => '<span class="fir">',
            'first_link'       =>  '首页',
            'last_tag_open'    => '<span class="last">',
            'next_tag_open'    => '<span class="next">',
            'next_link'        => '下一页',
            'prev_tag_open'    => '<span class="prev">',
            'prev_link'        => '上一页',
            'num_tag_open'     => '<span class="num">',
            'first_tag_close'  => '</span>',
            'last_tag_close'   => '</span>',
            'last_link'        => '尾页',
            'next_tag_close'   => '</span>',
            'prev_tag_close'   => '</span>',
            'num_tag_close'    => '</span>',
            'cur_tag_open'     => '<span class="num">',
            'cur_tag_close'    => '</span>',
        );
        $this->ci->pagination->initialize($config);

        return $config;
    }
}