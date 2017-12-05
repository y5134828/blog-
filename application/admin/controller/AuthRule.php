<?php
namespace app\admin\controller;
use app\admin\model\AuthRule as AuthRuleModel;
class AuthRule extends Base
{
  public function lst(){
    if(request()->isPost()){
        $authRule= new AuthRuleModel;
        $data=$_POST;
       foreach ($data as $k => $v) {
           $authRule->update(['id'=>$k,'sort'=>$v]);
       }
       $this->success('更新排序成功',url('lst'),'',1);
       return;
    }
    $authRule= new AuthRuleModel;
    $authRuleRes=$authRule->authRuleTree();
    $this->assign('authRuleRes',$authRuleRes);
    return $this->fetch('lst');
  }
   public function add(){
    if(request()->isPost()){
        $data=input('post.');
        $plevel=db('auth_rule')->where('id',$data['pid'])->field('level')->find();
        if($plevel){
            $data['level']=$plevel['level']+1;
        }
        if(db('auth_rule')->insert($data)){
            $this->success('添加规则成功',url('lst'),'',1);
        }else{
            $this->error('添加规则失败');
        }
        return;
    }
    $authRule= new AuthRuleModel;
    $authRuleRes=$authRule->authRuleTree();
    $this->assign('authRuleRes',$authRuleRes);

    return $this->fetch('add');
  }
   public function edit(){
    if(request()->isPost()){
        $data=input('post.');
        $plevel=db('auth_rule')->where('id',$data['pid'])->field('level')->find();
        if($plevel){
            $data['level']=$plevel['level']+1;
        }else{
            $data['level']=0;
        }
        if(db('auth_rule')->update($data)){
            $this->success('修改权限成功',url('lst'),'',1);
        }else{
            $this->error('修改权限失败');
        }
        return;
    }


    $authRule= new AuthRuleModel;
    $authRuleRes=$authRule->authRuleTree();
    $this->assign('authRuleRes',$authRuleRes);
    $authRules=$authRule->find(input('id'));
    $this->assign('authRules',$authRules);
    return $this->fetch('edit');
  }
   public function del(){
    $authRule= new AuthRuleModel;
    $authRules=$authRule->getchildrenid(input('id'));
    $authRules[]=input('id');
    if(db('auth_rule')->delete($authRules)){
            $this->success('删除权限成功',url('lst'),'',1);
        }else{
            $this->error('删除权限失败');
        }
  }
}
