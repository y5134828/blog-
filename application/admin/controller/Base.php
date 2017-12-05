<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Base extends Controller
{
    public function _initialize()
    {
       if(!session('id') || !session('name')){
        $this->error('未登录无权访问，请先登录',url('Login/index'),'',1);
       }

       //使用auth类判断登陆的用户拥有的权限
       $auth=new Auth();
       $request=Request::instance();
       $con=$request->controller();
       $action=$request->action();
       $name=$con.'/'.$action;
       $notCheck=array('Index/index','Idmin/lst','Admin/logout');
       if(session('name')!='admin'){
       	if(!in_array($name,$notCheck)){
       		 if(!$auth->check($name,session('id'))){
         	$this->error('没有权限',url('index/index'),'',1);
         }
       	}
       }
        
    }
}