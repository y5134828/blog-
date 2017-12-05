<?php
namespace app\admin\model;
use \think\Model;

class AuthRule extends Model
{
    public function authRuleTree(){
        $cateres=$this->order('sort asc')->select();
        return $this->sort($cateres);
    }
    //通过递归实现无限极分类添加到数组
    public function sort($data,$pid=0){
        static $arr=array();
        foreach ($data as $k => $v) {
            if($v['pid']==$pid){//第一次先获取到顶级分类，也就是pid为0的数据
                $v['dataid']=$this->getparentid($v['id']);
                $arr[]=$v;
                $this->sort($data,$v['id']);
            }
        }
        return $arr;
    }

        //删除栏目操作时先获得其子类的id
    public function getchildrenid($autnRuleid){
        $autnRuleres=$this->select();
        return $this->_getchildrenid($autnRuleres,$autnRuleid);
    }
    public function _getchildrenid($autnRuleres,$autnRuleid){
        static $arr=array();
        foreach ($autnRuleres as $k => $v) {
            if($v['pid']==$autnRuleid){
                $arr[]=$v['id'];
                $this->_getchildrenid($autnRuleres,$v['id']);
            }
        }
        return $arr;
    }

    public function getparentid($autnRuleid){
        $autnRuleres=$this->select();
        return $this->_getparentid($autnRuleres,$autnRuleid,true);
    }
    public function _getparentid($autnRuleres,$autnRuleid,$clear=false){
        static $arr=array();
        if($clear){
            $arr=array();
        }
        foreach ($autnRuleres as $k => $v) {
            if($v['id']==$autnRuleid){
                $arr[]=$v['id'];
                $this->_getparentid($autnRuleres,$v['pid'],false);
            }
        }
        asort($arr);
        $arrstr=implode('-', $arr);
        return $arrstr;
    }
}
