<?php
/**
 * 贝塔小屋 3oo.me
 * QQ交流群： 751968139
 */

namespace app\validate;

use think\Validate;

class UserTools extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
//        'uid'  =>  'require|float',
        'type' => 'require|between:1,3|length:1',
        'time' => 'require|float',
        'number' => 'require|float|between:0,9999',
        'token' => 'require'
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
//        'uid.require' => 'UID不正确，请检查填写的UID',
//        'uid.float' => 'UID不正确，请检查填写的UID',
        'type.require' => '刷取类型错误，请检查选择刷取类型',
        'type.between' => '刷取类型错误，请检查选择刷取类型',
        'type.length' => '刷取类型错误，请检查选择刷取类型',
        'time.require' => '时间不正确，请检查填写的时间',
        'time.float' => '时间不正确，请检查填写的时间',
        'number.require' => '通关次数不正确，请检查填写的通关次数',
        'number.float' => '通关次数不正确，请检查填写的通关次数',
        'number.between' => '通关次数0～9999之间刷完，请在提交',
    ];
}