<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 3/7/16
 * Time: 10:58 PM
 */
class Utilities
{
    function limit_text($text, $limit)
    {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }

}
