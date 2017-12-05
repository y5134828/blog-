<?php
namespace app\admin\validate;
use think\Validate;

class Link extends Validate
{
	protected $rule=[
		'title'=>'require',
	];

	protected $message=[
		'title.require'=>'标题不能为空',
	];
}