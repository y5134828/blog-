<?php
namespace app\index\controller;
use \think\Controller;
use app\index\model\Conf as ConfModel;

class Base extends Controller
{
	public function _initialize(){
		//查找父级id获得当前位置
		if(input('cateid')){
			$this->getPos(input('cateid'));
		}
		if(input('articleid')){
			$article=db('article')->field('cateid')->find(input('articleid'));
			$artid=$article['cateid'];
			$this->getPos($artid);
		}
		//网站底部推荐
        $cateModel= new \app\index\model\Cate();
		$recBottom= $cateModel->getRecBottom();
		$this->assign('recBottom',$recBottom);
		//网站配置项
		$this->getConf();
		//网站栏目导航
		$this->getAllCates();
	}

	public function getAllCates(){
		$cateres=\think\Db::name('cate')->order('sort asc')->where('pid',0)->select();
		foreach ($cateres as $k => $v) {
			$children=db('cate')->where(array('pid'=>$v['id']))->select();
			if($children){
				$cateres[$k]['children']=$children;
			}else{
				$cateres[$k]['children']=0;
			}
		}
		$this->assign('cateres',$cateres);
	}
	//获得配置项
	//循环得到的二维数组，并组成一个一维数组返回
	public function getConf(){
		$conf=new ConfModel();
		$_confres=$conf->getAllConf();

		$confres=array();
		foreach ($_confres as $k => $v) {
			$confres[$v['enname']]=$v['cnname'];
		}
		$this->assign('confres',$confres);
	}
	//执行model层方法获得父类的id，显示面包屑路径
	public function getPos($cateid){
		$cate= new  \app\index\model\Cate();
		$posArr=$cate->getparents($cateid);
		$this->assign('posArr',$posArr);
	}
}

