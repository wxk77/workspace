<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( ! function_exists('display_time'))
{
    /**
     * Display the time of create on.
     * @param float $create_time
     * @return string
     */
    function display_time($create_time)
    {
        $create_time = substr($create_time, 6, 10);
        $time_today = zero_time_of_today();
        $time_yes = zero_time_of_today() - 3600 * 24;
        $time_diff = time() - $create_time;
        if ($time_diff < 0)
            return FALSE;
        if ($create_time < $time_yes) {
            if ( floor($time_diff / (3600 * 24)) > 3 ) {
                return date('y-m-d', $create_time);
            } else {
                return floor($time_diff / (3600 * 24)) . '天前';
            }
        }

        elseif ($create_time < $time_today)
            return '昨天';
        elseif ($time_diff > 3600)
            return floor($time_diff / 3600) . '小时前';
        else
            return floor($time_diff / 60) . '分钟前';
    }
}

if ( ! function_exists('zero_time_of_today'))
{
    /**
     * Fetch the beginning of today as unix format.
     */
    function zero_time_of_today()
    {
        return strtotime(date('Y-m-d 00:00:00'));
    }
}

if ( ! function_exists('zero_time_of_week'))
{
    /**
     * Fetch the beginning of this week as unix format
     */
    function zero_time_of_week()
    {
        $date_obj = new DateTime();
        $date_obj->modify('this week');
        $date_mon = $date_obj->format('Y-m-d 00:00:00');

        return strtotime($date_mon);
    }
}

if ( ! function_exists('str_to_time'))
{
    /**
     * Change string time into time format.
     * @param $string_time
     * @return int
     */
    function str_to_time($string_time)
    {
        return substr($string_time, 6, 10);
    }

}

if ( ! function_exists('show_replay_text'))
{
    /**
     * Replace in '...' if over the max length
     * @param $text
     * @param $max_length
     * @param string $encoding
     * @return mixed
     */
    function show_replay_text($text, $max_length, $encoding = 'UTF-8')
    {
        if (mb_strlen($text, $encoding) > $max_length ) {
            return str_replace(mb_substr($text, $max_length, null, $encoding), '...', $text);
        } else {
            return $text;
        }
    }
}