<?php
/**
 * 贝塔小屋 3oo.me
 * QQ交流群： 751968139
 * 删掉版权死全家～
 */

namespace app\controller;

use app\BaseController;
use app\validate\UserTools;
use think\facade\View;
use app\common\Tools;
use app\Request;
use think\response\Json;

class Index extends BaseController
{

    /**
     * @param Request $request
     * @return Json
     * 贝塔小屋 3oo.me
     * QQ交流群： 751968139
     */
    public function ajax(Request $request): Json
    {
        try {
            validate(UserTools::class)->check($request->param());
            if($request->param('type') == 3){
                Tools::add($request->param('token'), 1, $request->param('time') * 60);
                Tools::add($request->param('token'), 2, $request->param('time') * 60);
                return json(['code' => 200, 'message' => '恭喜您，闯关成功']);
            }
            $data = Tools::add($request->param('token'), $request->param('type'), $request->param('time') * 60);
            if($data['err_code'] == 0) {
                return json(['code' => 200, 'message' => '恭喜您，闯关成功']);
            }
            return json(['code' => 204, 'message' => '错误提示，闯关失败请稍后重试']);
        } catch (\think\exception\ValidateException $e) {
            return json(['code' => 202,"message" => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @return Json
     */
    public function getUserToken(Request $request): Json
    {
        $open_id = Tools::getUserOpen($request->param('uid'));
        if($open_id['err_code'] === 10007){
            return json([
                'code' => 201,
                'message' => '用户不存在，请检查输入的UID'
            ]);
        }
        $token = Tools::getUserToken($open_id['data']['wx_open_id']);
        return json([
            'code' => 200,
            'message' => '获取成功',
            'data' => $token['data']['token']
        ]);
    }


    /**
     * @return string
     * 贝塔小屋 3oo.me
     * QQ交流群： 751968139
     */
    public function index(): string
    {
        return View::fetch();
    }
}
