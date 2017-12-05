<?php
namespace app\index\model;
use think\Model;
use app\index\model\Cate;

class Article extends Model
{
	  public function getAllArticle($cateid){
       $cate=new Cate();
       $allCateId=$cate->getchildrenid($cateid);
       $artRes=db('article')->where("cateid IN($allCateId)")->order('id desc')->paginate(8);
       return $artRes;
    }
    //查找本栏目下的热点文章
    public function getHotRes($cateid){
       $cate=new Cate();
       $allCateId=$cate->getchildrenid($cateid);
       $artRes=db('article')->where("cateid IN($allCateId)")->order('click desc')->limit(5)->select();
       return $artRes;
    }
    //首页获得点击量最多文章
    public function getsiteHot(){
      $siteHotArt=$this->order('click desc')->field('id,title,pic')->limit(5)->select();
      return $siteHotArt;
    }
    //获得最新文章
    public function getNewArticle(){
      // $newArticleRes=$this->order('id desc')->limit(10)->select();
      $newArticleRes=db('article')->alias('a')->join('bk_cate c','a.cateid=c.id')->field('a.id,a.title,a.desc,a.pic,a.click,a.creat_time,a.content,a.zan,c.cate_name')->order('a.id desc')->limit(10)->select();
      return $newArticleRes;
    }
    //获得首页轮播推荐文章
    public function getRecArt(){
      $recArt=$this->where('rec','=',1)->field('id,title,pic')->order('id desc')->limit(4)->select();
      return $recArt;
    }
}