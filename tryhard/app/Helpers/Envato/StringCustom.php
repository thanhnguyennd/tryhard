<?php


namespace App\Helpers\Envato;


class StringCustom
{
    public static function get_content_sub_text($content,$key_word) {
        $idx = strpos(strip_tags($content),$key_word);
        return mb_substr(strip_tags($content), $idx - 3 > 0 ? $idx - 3 : 0 , $idx + 12);
    }
}