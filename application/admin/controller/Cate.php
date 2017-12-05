<?php
namespace app\admin\controller;
use app\admin\model\Cate as Catemodel;
use app\admin\model\Article as ArticleModel;
class Cate extends Base
{
    //再删除操作之前执行delsoncate函数，如果删除的cate中有子类，则delsoncate方法会删除子类
    protected $beforeActionList=[
        'delsoncate'=>['only'=>'del'],
    ];
    //栏目列表页显示
    public function lst()
    {
        //实例化Catemodel类
        $catemodel=new Catemodel();
        //通过排序传入的值进行更新数据表后排序
        if(request()->isPost()){
            $sorts=input('post.');
            foreach ($sorts as $k => $v) {
                \think\Db::name('cate')->where('id',$k)->update(['sort'=>$v]);
            }
            $this->success('更新排序成功',url('cate/lst'),'',1);
            return;
        }
        //调用无限极分类方法来实现排序输出
        $cateres=$catemodel->catetree();
        $this->assign('cateres',$cateres);
        return $this->fetch('lst');
    }
    //添加栏目
    public function add(){
        if(request()->isPost()){
            if (\think\Db::name('cate')->insert(input('post.'))) {
                $this->success('添加分类成功','lst','',1);
            }else{
                $this->error('添加分类失败');
            }
        }
        $catemodel=new Catemodel();
        //调用无限极分类方法来实现排序输出
        $cateres=$catemodel->catetree();
        $this->assign('cateres',$cateres);
        return $this->fetch('add');
    }
    public function del($id){
        if(db('cate')->delete($id)){
            $this->success('删除栏目成功',url('cate/lst'),'',1);
        }else{
        $this->error('删除失败');
        }
    }
    //删除前置函数 delsoncate 可以接收传递的id值
    public function delsoncate(){
        $cateid=input('id');
        $catemodel=new Catemodel();
        $sonids=$catemodel->getchildrenid($cateid);
        //删除本栏木下所有的文章，包括子栏目的文章一起删除
        $allcateid=$sonids;
        $allcateid[]= $cateid;
        foreach ($allcateid as $key => $value) {
            $article=new ArticleModel();
            $article->where(array('cateid'=>$value))->delete();
        }
        if($sonids){
            db('cate')->delete($sonids);
        }
    }

    //修改栏目
    public function edit(){
        $catemodel=new Catemodel();
        if(request()->isPost()){
            if(db('cate')->update(input('post.'))){
                $this->success('修改成功成功',url('cate/lst'),'',1);
            }else{
                $this->error('修改栏目失败');
            }
        }

        $cates=$catemodel->find(input('id'));//获得要修改的栏目内容并分配到修改页面
        $cateres=$catemodel->catetree();
        $this->assign(array(
            'cateres'=>$cateres,
            'cates'=>$cates,
            ));
        return $this->fetch('edit');
    }
}
