<?php
namespace app\index\controller;

class Index extends Base
{
    public function index()
    {
    	$articleModel=new \app\index\model\Article();
        //首页显示的文章
    	$articleRes=$articleModel->getNewArticle();
        //热门文章
    	$articles=$articleModel->getsiteHot();
        //推荐的文章
        $recArts=$articleModel->getRecArt();
        //获取推荐栏目
        $cateModel= new \app\index\model\Cate();
        $recIndex=$cateModel->getRecIndex();
        
    	$links=db('link')->select();
    	$this->assign(array(
    		'articleRes'=>$articleRes,
    		'articles'=>$articles,
    		'links'=>$links,
            'recArts'=>$recArts,
            'recIndex'=>$recIndex,
    		));
        return $this->fetch();
    }
}
