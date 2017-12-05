<?php
namespace app\admin\controller;
use app\admin\model\Link as LinkModel;
class Link extends Base
{
    //友情链接列表页显示
    public function lst()
    {
        
        $linkres=LinkModel::paginate(2);
        $this->assign('linkres',$linkres);
        return $this->fetch('lst');
    }
    //添加友情链接
    public function add(){
        
        if(request()->isPost()){
            $link=new LinkModel();
            $data=input('post.');
            //验证器验证接受的数据 在validate中写验证规则
            $validate = \think\Loader::validate('Link');
            if($validate->check($data)){
                if(db('link')->insert($data)){
                $this->success('添加成功',url('lst'),'',1);
                }else{
                    $this->error('添加失败');
                }
            }else{
                $this->error($validate->getError());
            }
           

            return;
        }
        return $this->fetch('add');

    }
    public function edit()
    {
        $links=db('link')->where('id','=',input('id'))->find();
        $this->assign('links',$links);

        if(request()->isPost()){
            $data=input('post.');
            if(db('link')->update($data)){
                $this->success('更新数据成功',url('lst'),'',1);
            }else{
                $this->error('更新数据失败');
            }
            return;
        }
        return $this->fetch('edit');
    }
    public function del(){
        if(db('link')->delete(input('id'))){
          $this->success('删除数据成功',url('lst'),'',1);
            }else{
                $this->error('删除数据失败');
            }
    }
}
