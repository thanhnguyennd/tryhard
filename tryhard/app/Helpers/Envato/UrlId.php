<?php


namespace App\Helpers\Envato;


use Hashids\Hashids;
use Illuminate\Support\Facades\Crypt;

class UrlId
{
    public static function encrypt($id, $type) {
        $hashids = new Hashids(config('app.key'));
        $arr = [];
        $mod = $id % 10;
        $min = $id - 50;
        $max = $id + 50;
        for($i=0; $i<10; $i++){
            if($i === $mod){
                $arr[$i] = $id;
            }
            else{
                $arr[$i] = rand(0,100);
            }
        }
        $arr = [$id, 8, 9, 3, 7, $type, 5, 6, 0, 8];
        $encrypt = $hashids->encode($arr);
        return(base64_encode($encrypt));
    }
    public static function decrypt($key_encrypt) {
        $hashids = new Hashids(config('app.key'));
        $decrypt = $hashids->decode(base64_decode($key_encrypt));
        return isset($decrypt[0])? $decrypt[0] : "";
    }
}
