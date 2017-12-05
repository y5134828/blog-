<?php
namespace app\admin\controller;
use app\admin\model\AuthGroup as AuthGroupModel;
use app\admin\model\AuthRule;
class AuthGroup extends Base
{
    //友情链接列表页显示
    public function lst()
    {
        $groupres=db('auth_group')->paginate(6);
        $this->assign('groupres',$groupres);
        return $this->fetch('lst');
    }

    public function add()
    {
        if(request()->isPost()){
            $data=input('post.');
            if(isset($data['rules'])){
                $data['rules']=implode(',',$data['rules']);
            }
            if(!isset($data['status'])){
                $data['status']=0;
            }
            if(db('auth_group')->insert($data)){
                $this->success('添加用户组成功',url('lst'),'',1);
            }else{
                $this->error('添加用户组失败');
            }

            return;
        }
        $authRule= new AuthRule();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        
        return $this->fetch('add');
    }
     public function edit()
    {
        $authgroups=\think\Db::name('auth_group')->find(input('id'));
        $this->assign('authgroups',$authgroups);
        if(request()->isPost()){
            $data=input('post.');
            if(isset($data['rules'])){
                $data['rules']=implode(',',$data['rules']);
            }else{
                $data['rules']='';
            }
            if(!isset($data['status'])){
                $data['status']= 0;
            }
            if(db('auth_group')->update($data)){
                $this->success('修改用户组成功',url('lst'),'',1);
            }else{
                $this->error('修改用户组失败');
            }
            return;
        }
        $authRule= new AuthRule();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);

        return $this->fetch('edit');
    }
     public function del()
    {
        if(db('auth_group')->delete(input('id'))){
                $this->success('添加用户组成功',url('lst'),'',1);
            }else{
                $this->error('添加用户组失败');
            }
    }
}
