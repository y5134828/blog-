<?php
namespace app\admin\controller;
use \think\Controller;
use app\admin\model\Admin;

class Login extends Controller
{
    public function index()
    {
    	if(request()->isPost()){
    		$data=input('post.');
            $this->check(input('code'));
    		$admin=new Admin();
    		$lognum=$admin->login($data);
    		if($lognum==1){
    			$this->error('用户不存在');
    		}
    		if($lognum==2){
    			$this->error('密码错误');
    		}
    		if($lognum==3){
    			$this->success('验证通过，正在进入个人主页',url('index/index'),'',2);
    		}

    		return;
    	}
        return $this->fetch('Login');
    }

    public function check($code=''){
        if(!captcha_check($code)){
            $this->error('验证码错误','','',1);
        }else{
            return true;
        }
    }
}
