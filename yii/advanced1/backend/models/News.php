<?php 
/**
 *@author    Mr wangpanlong
 *
 *@param  News Model
 *
 *@email   915752851@qq.com
 */
namespace backend\models;

use yii\db\ActiveRecord;

class News extends ActiveRecord
{
	public $keywords;
	public $keywords1;
	public $ids;
	public $titles;
	public $catelist;
	public $contents;

	public function rules()
	{
		return [];
	}
	public function attributeLabels()
	{
		return [
			'keywords'=>'',
			'keywords1'=>'',
			'ids'=>'',
			'titles'=>'标题:',
			'catelist'=>'分类:',
			'contents'=>'内容:',
		];
	}	
	public static function tableName()
	{
		return "news";
	}
	//关联表
	public function getCate()
	{
		return $this->hasOne(Cate::className(),['c_id'=>'c_id']);
	}
	//添加
	public function getAdd($post)
	{
		$titles=$post['News']['titles'];
		$catelist=$post['News']['catelist'];
		$contents=$post['News']['contents'];
		$this->id='';
		$this->title=$titles;
		$this->content=$contents;
		$this->c_id=$catelist;
		return $this->save();
	}
	//获得总条数
	public function getCount($where)
	{
		$count = News::find()
				->where($where)
		    	->count();		
		 return $count;
	}
	// 展示
	public function getList($where,$limit,$pageSize)
	{
		$list=News::find()
				  ->joinWith('cate')
		          ->select('news.*,cate.c_name')
		          ->where($where)
		          ->offset($limit)
		          ->limit($pageSize)
		          ->asArray()
		          ->all();
		          // $res= clone $list;
		          // echo $res->createCommand()->getRawSql();die;
		return $list;	          
	}
	//删除
	public function getDel($id)
	{
		$news=$this->findOne($id);
		return  $news->delete();
	}
	//修改查询
	public function getUpdate($id)
	{
		$news=$this->findOne($id);
		return $news;		
	}
	//执行修改
	public function getUpdateok($post)
	{
		$ids=$post['News']['ids'];
		$titles=$post['News']['titles'];
		$contents=$post['News']['contents'];
		$catelist=$post['News']['catelist'];
		$news=$this->findOne($ids);
		$news->title=$titles;
		$news->content=$contents;
		$news->c_id=$catelist;
		return $news->save();
	}
}







 ?>