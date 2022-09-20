<?php
/**
 * 贝塔小屋 3oo.me
 * QQ交流群： 751968139
 * 删掉版权死全家～
 */
namespace app\common;

class Tools
{
    /**
     * @param $uid
     * @return mixed
     * 贝塔小屋 3oo.me
     * QQ交流群： 751968139
     */
    public static function getUserOpen($uid)
    {
        //你自己的token
        $t = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2OTQ1MTgwNzQsIm5iZiI6MTY2MzQxNTg3NCwiaWF0IjoxNjYzNDE0MDc0LCJqdGkiOiJDTTpjYXRfbWF0Y2g6bHQxMjM0NTYiLCJvcGVuX2lkIjoiIiwidWlkIjoyMTMxNzM4OSwiZGVidWciOiIiLCJsYW5nIjoiIn0.SxlIdM90xULCwzFqYySeQtW4CmrErdxQ7u-xJJjEq7c";
        $url = "https://cat-match.easygame2021.com/sheep/v1/game/user_info?uid=" .$uid. "&t=".$t;
        return json_decode(self::_curlGet($url, []),true);
    }

    /**
     * @param $open_id
     * @return mixed
     * 用微信的open_id 获取用户的Token
     * 贝塔小屋 3oo.me
     * QQ交流群： 751968139
     */
    public static function getUserToken($open_id)
    {
        $url = "https://cat-match.easygame2021.com/sheep/v1/user/login_oppo";
        $data = [
            'uid' => $open_id,
            'nick_name' => '3oo.me',
            'avatar' => 'https://www.baidu.com/favicon.ico',
            'sex' => 1
        ];
        return json_decode(self::_curlPost($url, $data),true);
    }


    /**
     * @param $t
     * @param $rank_state
     * @param $rank_time
     * @return mixed
     * 贝塔小屋 3oo.me
     * QQ交流群： 751968139
     */
    public static function add($t, $rank_state, $rank_time)
    {
        $head = [
            "Host" => "cat-match.easygame2021.com",
            "User-Agent" => "Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 MicroMessenger/8.0.27(0x18001b36) NetType/WIFI Language/zh_CN",
            "Referer" => "https://servicewechat.com/wx141bfb9b73c970a9/14/page-frame.html",
            "Accept-Encoding" => "gzip,compress,br,deflate",
            "Connection" => 'close',
            "t" => $t,
        ];
        //完成游戏接口
        $a = $rank_state == 1 ? 'topic_game_over' :  'update_user_skin';
        $finish_url = 'https://cat-match.easygame2021.com/sheep/v1/game/'. $a .'?rank_score=1&skin=24&rank_state=1&rank_role=1&rank_time='.$rank_time.'&t='.$t;
        return json_decode(self::_curlget($finish_url, $head),true);
    }

    /**
     * @param $url
     * @param $postDataArr
     * @param array $header
     * @return bool|string
     * 贝塔小屋 3oo.me
     * QQ交流群： 751968139
     */
    private static function _curlPost($url, $postDataArr, $header = [])
    {
        $header = [];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataArr);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        return curl_exec($ch);
    }

    /**
     * @param $getUrl
     * @param $header
     * @return bool|string
     * 贝塔小屋 3oo.me
     * QQ交流群： 751968139
     */
    private static function _curlGet($getUrl, $header = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        return curl_exec($ch);
    }
}