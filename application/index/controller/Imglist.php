<?php
namespace app\index\controller;

class Imglist extends Base
{
    public function index()
    {
    	//title显示当前栏目
        $catemodel=new \app\index\model\Cate();
        $cateInfo=$catemodel->getCateInfo(input('cateid'));
        $this->assign('cateInfo',$cateInfo);
        //查找显示当前页面数据
    	$imgRes=db('article')->where('cateid',input('cateid'))->paginate(9);
    	$this->assign('imgRes',$imgRes);
        return $this->fetch('imglist');
    }
}
