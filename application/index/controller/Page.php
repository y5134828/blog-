<?php
namespace app\index\controller;

class Page extends Base
{
    public function index()
    {
    	//title显示当前栏目
        $catemodel=new \app\index\model\Cate();
        $cateInfo=$catemodel->getCateInfo(input('cateid'));
        $this->assign('cateInfo',$cateInfo);
        //显示当前id的页面
    	$cates=db('cate')->find(input('cateid'));
    	$this->assign('cates',$cates);
        return $this->fetch('page');
    }
}
