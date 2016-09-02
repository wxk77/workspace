<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('show_text'))
{
    /**
     * Replace in '...' if over the max length
     * @param $text
     * @param $max_length
     * @param string $encoding
     * @return mixed
     */
    function show_text($text, $max_length, $encoding = 'UTF-8')
    {
        if (mb_strlen($text, $encoding) > $max_length ) {
            return str_replace(mb_substr($text, $max_length), '...', $text);
        } else {
            return $text;
        }
    }
}

if ( ! function_exists('show_str'))
{
    /**
     *
     * @param $str
     */
    function show_str($str)
    {
        $item=explode(" ", $str);
        foreach($item as $value)
        {
            $newArr[] = $value;
        }

        return $newArr;

    }
}


if ( ! function_exists('cut_str'))
{
    /**
     *
     * @param $str
     */
    function cut_str($str)
    {
        $item=preg_split('/(?<!^)(?!$)/u', $str);
        foreach($item as $value)
        {
            $newArr[] = $value;
        }

        return $newArr;

    }
}
