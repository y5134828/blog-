<?php
namespace app\admin\model;
use \think\Model;

class Article extends Model
{
	protected static function init(){
			Article::event('before_update',function($article){
			if($_FILES['pic']['tmp_name']){
				$file=request()->file('pic');
				$info=$file->move(ROOT_PATH.'public'.DS.'/static/uploads');
				if($info){
                    //获得图片存入的文件路径
                    $data='/static/uploads/'.date('Ymd').'/'.$info->getFilename() ;
                    $article['pic']=$data;  
                }
                $arts=Article::find($article->id);
                $picpath=ROOT_PATH.'public'.$arts['pic'];
                if(file_exists($picpath)){
                	@unlink($picpath);
                }
			}
		});

			Article::event('before_delete',function($article){
                $arts=Article::find($article->id);
                $picpath=ROOT_PATH.'public'.$arts['pic'];
                if(file_exists($picpath)){
                	@unlink($picpath);
                }
			
		});

	}
	
}
