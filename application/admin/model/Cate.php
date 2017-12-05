<?php
namespace app\admin\model;
use \think\Model;

class Cate extends Model
{
    public function catetree(){
        $cateres=$this->order('sort asc')->select();
        return $this->sort($cateres);
    }
    //通过递归实现无限极分类添加到数组
    public function sort($data,$pid=0,$level=0){
        static $arr=array();
        foreach ($data as $k => $v) {
            if($v['pid']==$pid){//第一次先获取到顶级分类，也就是pid为0的数据
                $v['level']=$level;
                $arr[]=$v;
                $this->sort($data,$v['id'],$level+1);
            }
        }
        return $arr;
    }

    //删除栏目操作时先获得其子类的id
    public function getchildrenid($cateid){
        $cateres=$this->select();
        return $this->_getchildrenid($cateres,$cateid);
    }
    public function _getchildrenid($cateres,$cateid){
        static $arr=array();
        foreach ($cateres as $k => $v) {
            if($v['pid']==$cateid){
                $arr[]=$v['id'];
                $this->_getchildrenid($cateres,$v['id']);
            }
        }
        return $arr;
    }
}
