<?php
namespace app\admin\model;
use \think\Model;
use \think\Session;

class Admin extends Model
{
    //添加admin数据
    public function addadmin($data){
        if(empty($data) || !is_array($data)){
            return false;
        }
        $adminData=array();
        $adminData['name']=$data['name'];
        $adminData['password']=md5($data['password']);
        if ($this->save($adminData)) {
            $groupAccess=array();
            $groupAccess['uid']=$this->id;
            $groupAccess['group_id']=$data['group_id'];
            if(db('auth_group_access')->insert($groupAccess)){
                return true;  
            }
        }else{
            return false;
        }
    }
    //获得admin数据
    public function getadmin(){
        return $this::order('id','asc')->paginate(5);
    }

    //修改admin数据
    public function editadmin($data,$admins){
        if(!$data['password']){
            $data['password']=$admins['password'];
        }else{
            $data['password']=md5($data['password']);
        }
        //查询是否存在不存在添加，存在修改
        $isuid=db('auth_group_access')->where(array('uid'=>$data['id']))->find();
        if(!$isuid){
            $groupAccess=array();
            $groupAccess['uid']=$data['id'];
            $groupAccess['group_id']=$data['group_id'];
            db('auth_group_access')->insert($groupAccess);
        }else{
             db('auth_group_access')->where(array('uid'=>$data['id']))->update(['group_id'=>$data['group_id']]);
        }
        return $this->save(['name'=>$data['name'],'password'=>$data['password']],['id'=>$data['id']]);
    }

    //删除admin数据
    public function deladmin($id){
        if($this::destroy($id)){
            return true;
        }else{
            return false;
        }
    }
    //登陆 查询传过来的用户名，如果有，则核对密码，不存在则返回不存在该用户
    public function login($data){
        $admin=Admin::getByName($data['name']);
        if($admin){
            if($admin['password']==md5($data['password'])){
                session('id',$admin['id']);
                session('name',$admin['name']);
                return 3;//正确情况返回3
            }else{
                return 2;//密码不正确返回2
            }
        }else{
            return 1;//用户不存在的情况
        }
    }
}
