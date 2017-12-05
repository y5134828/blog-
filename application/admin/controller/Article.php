<?php
namespace app\admin\controller;
use app\admin\model\Cate as Catemodel;
use app\admin\model\Article as Articlemodel;
class Article extends Base
{
    //显示文章列表 
    public function lst(){
        $articleres=\think\Db::name('article')->alias('a')->join('cate c','a.cateid=c.id','left')->field('a.id,a.title,a.desc,a.pic,a.author,c.cate_name,rec')->order('id desc')->paginate(10);
        $this->assign('articleres',$articleres);
        return $this->fetch('lst');
    }
    //添加文章 
    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            $data['creat_time']=time();
            $article=new Articlemodel();
            if($_FILES['pic']['tmp_name']){
                $file=request()->file('pic');
                
                $info= $file->move(ROOT_PATH . 'public' .DS . '/static/uploads');
                if($info){
                    //获得图片存入的文件路径
                    $data['pic']='/static/uploads/'.date('Ymd').'/'.$info->getFilename() ;
                    //echo $info->getFilename();die;
                }else{
                   return $this->error( $info->getError());
                }
                //用下边的方法会使浏览器无法读取文件 浏览器错误：not allowed to load local resource
                // $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
                // if($info){
                //     $fileadress=ROOT_PATH.'public'.DS.'uploads'.'/'.$info->getSaveName();
                //     $data['pic']=$fileadress;
                //}

            }
            if($article->save($data)){
               $this->success('添加文章成功',url('lst'),'',1); 
            }else{
                $this->error('添加文章失败');
            }

            return;
        }

        //实例化Catemodel类,调用cate无限极分类显示分类
        $catemodel=new Catemodel();
        $cateres=$catemodel->catetree();
        $this->assign('cateres',$cateres);
        return $this->fetch('add');
    }
   

    //修改栏目
    public function edit(){
        //查找要修改的数据显示
        $articles=db('article')->where('id','=',input('id'))->find();
        $this->assign('articles',$articles);
        //有修改提交时进行更新操作
        if(request()->isPost()){
            $article=new Articlemodel();
            if($article->update(input('post.'))){
                $this->success('修改文章成功',url('lst'),'',1);
            }else{
                $this->error('文章修改失败');
            }
        }

        //引入分类树显示分类
        $catemodel=new Catemodel();
        $cateres=$catemodel->catetree();
        $this->assign('cateres',$cateres);
        return $this->fetch('edit');
    }

    public function del(){
        if(Articlemodel::destroy(input('id'))){
            $this->success('删除文章成功','lst','',1);
        }else{
            $this->error('删除文章失败');
        }
    }
}
