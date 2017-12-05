<?php
namespace app\index\controller;
use app\index\model\Article;

class Artlist extends Base
{
    public function index()
    {
    	$article= new Article();
    	//文章列表
    	$artRes=$article->getAllArticle(input('cateid'));
    	$this->assign('artRes',$artRes);
        //title显示当前栏目
        $catemodel=new \app\index\model\Cate();
        $cateInfo=$catemodel->getCateInfo(input('cateid'));
        $this->assign('cateInfo',$cateInfo);
    	//热门推荐
    	$hotRes=$article->getHotRes(input('cateid'));
    	$this->assign('hotRes',$hotRes);
        return $this->fetch('artlist');
    }
}
