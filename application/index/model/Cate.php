<?php
namespace app\index\model;
use think\Model;

class Cate extends Model
{
    //递归获得子级的id
	public function getchildrenid($cateid){
        $cateres=$this->select();
        $arr=$this->_getchildrenid($cateres,$cateid);
        $arr[]=$cateid;
        $strID=implode(',',$arr);
        return $strID;
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
    //递归获得上级分类
     public function getparents($cateid){
        $cateres=$this->field('id,pid,cate_name')->select();
        $cates=db('cate')->field('id,pid,cate_name')->find($cateid);
        $pid=$cates['pid'];
        if($pid){
          $arr=$this->_getparentsid($cateres,$pid);  
        }
        $arr[]=$cates;
        return $arr;
    }
    public function _getparentsid($cateres,$pid){
        static $arr=array();
        foreach ($cateres as $k => $v) {
            if($v['id']==$pid){
                $arr[]=$v;
                $this->_getparentsid($cateres,$v['pid']);
            }
        }
        return $arr;
    }

    //获得首页推荐栏目
    public function getRecIndex(){
        $recIndex=$this->order('id asc')->where('rec_index',1)->select();
        return $recIndex;
    }
    //获得底部推荐栏目
    public function getRecBottom(){
         $recBottom=$this->order('id asc')->where('rec_bottom',1)->select();
        return $recBottom;
    }
    //在title动态显示当前栏目
    public function getCateInfo($cateid){
        $cateInfo=$this->field('cate_name,desc,keywords')->find($cateid);
        return $cateInfo;
    }
}