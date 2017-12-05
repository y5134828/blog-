<?php
namespace app\admin\controller;
use app\admin\model\Admin as Adminmodel;
class Admin extends Base
{
    // public function _initialize(){

    //     $adminmodel=new Adminmodel();
    // }

    public function lst()
    {
        $auth=new Auth();
        $adminmodel=new Adminmodel();
        $adminres=$adminmodel->getadmin();
        foreach ($adminres as $k => $v) {
            $groupsTitle=$auth->getGroups($v['id']);
            if($groupsTitle){
                $v['groupsTitle']=$groupsTitle[0]['title'];
            }
            
        }

        $this->assign('adminres',$adminres);
        return $this->fetch('lst');
    }
    //添加管理员
    public function add()
    {
        if(request()->isPost()){
            $adminmodel=new Adminmodel();
            if($adminmodel->addadmin(input('post.'))){
              $this->success('添加管理员成功！','lst','',2);
            }else{
                $this->error('添加管理员失败');
            }

            return;
        }
        $authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes);
        return $this->fetch('add');
    }
     public function edit($id)
    {
        $admins=\think\Db::name('admin')->find($id);
        if(request()->isPost()){
            $data=input('post.');
            $adminmodel=new Adminmodel();
            if($adminmodel->editadmin($data,$admins) !== false){
                $this->success('更新管理员成功','lst','',2);
            }else{
                $this->error('更新管理员失败');
            }
        }
        if(!$admins){
            $this->error('该管理员不存在');
        }
        $authGroups=db('auth_group_access')->where('uid',$id)->find();
        $this->assign('authGroups',$authGroups);

        $authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes);

        $this->assign('admins',$admins);
        return $this->fetch('edit');
    }
    public function del($id){
        $adminmodel=new Adminmodel();
        if($adminmodel->deladmin($id)){
            $this->success('删除管理员成功','lst','',2);
        }
        else{
            $this->error('删除管理员失败');
        }
    }
    public function logout(){
        session(null);
        $this->success('退出账户成功',url('Login/index'),'',2);
    }
}
