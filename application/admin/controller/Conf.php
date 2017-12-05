<?php
namespace app\admin\controller;
use app\admin\model\Conf as ConfModel;
class Conf extends Base
{
   public function lst(){
    $confres=db('conf')->paginate(8);
    $this->assign('confres',$confres);
    return $this->fetch('lst');
   }

   public function add(){
    if (request()->isPost()) {
        $data=input('post.');
        if($data['values']){
            $data['values']=str_replace('，', ',', $data['values']);
        }
        $conf=new ConfModel();
        if($conf->save($data)){
            $this->success('添加配置成功',url('lst'),'',1);
        }else{
            $this->error('添加配置失败');
        }
    }
    return $this->fetch('add');
   }

   public function edit(){
    if(request()->isPost()){
        $data=input('post.');
        if($data['values']){
            $data['values']=str_replace('，', ',', $data['values']);
        }
        $conf=new ConfModel();
        $save=$conf->save($data,['id'=>$data['id']]);
        if($save){
            $this->success('修改配置成功',url('lst'),'',1);
        }else{
            $this->error('修改配置失败');
        }
    }
    $confs=ConfModel::find(input('id'));
    $this->assign('confs',$confs);
    return $this->fetch('edit');
   }

   public function del(){
    $del=ConfModel::destroy(input('id'));
     if($del){
            $this->success('删除配置成功',url('lst'),'',1);
        }else{
            $this->error('删除配置失败');
        }
   }
   public function conf(){
    if(request()->isPost()){
        $data=input('post.');
        $formarr=array();
        foreach ($data as $k => $v) {
            $formarr[]=$k;
        }
        $_confarr=db('conf')->field('enname')->select();
        $confarr=array();
        foreach ($_confarr as $k => $v) {
            $confarr[]=$v['enname'];
        }
        $checkboxarr=array();
        foreach ($confarr as $k => $v) {
           if(!in_array($v, $formarr)){
                $checkboxarr[]=$v;
           }
        }
        if(!is_null($checkboxarr)){
            foreach ($checkboxarr as $k => $v) {
                $data[$v]='';
            }
        }
        if($data){
            foreach ($data as $k => $v) {
                ConfModel::where('enname',$k)->update(['value'=>$v]);
            }
            $this->success('修改成功','','',1);
        }
        return;
    }

    $confres=ConfModel::select();
    $this->assign('confres',$confres);
    return $this->fetch('conf');
   }
}
