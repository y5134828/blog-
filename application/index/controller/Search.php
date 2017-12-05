<?php
namespace app\index\controller;
use app\index\model\Article;

class Search extends Base
{
    public function index()
    {
    	//得到查询的数据并显示,通过paginate分页第三个参数['query'=>array('keywords'=>$keywords)]传递参数
    	$keywords=input('search');
    		$searRes=db('article')->order('id desc')->where('content','like','%'.$keywords.'%')->paginate(3,false,['query'=>array('search'=>$keywords)]);
	    	$this->assign([
	    		'searRes'=>$searRes,
	    		'keywords'=>$keywords,
	   		]);
	   	//调用ArticleModel层的方法查找点击量最多的文章
	   	$articleModel=new Article();
	   	$artHot=$articleModel->getsiteHot();
	   	$this->assign('artHot',$artHot);
			
        return $this->fetch('search');
    }
}
