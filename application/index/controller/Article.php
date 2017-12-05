<?php
namespace app\index\controller;

class Article extends Base
{
    public function index()
    {
        //查找显示对应的文章
    	$artid=input('articleid');
    	db('article')->where(array('id'=>$artid))->setInc('click');
    	$articles=db('article')->find($artid);

    	//实例化model对象查找点击量最高的文章
    	$article=new \app\index\model\Article();
    	$hotRes=$article->getHotRes($articles['cateid']);
    	$this->assign('hotRes',$hotRes);

    	$this->assign('articles',$articles);
        return $this->fetch('article');
    }
}
