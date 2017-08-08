<?php 
namespace backend\models;

use yii\db\ActiveRecord;

class News extends ActiveRecord
{
	public $id1;
	public $title1;
	public $content1;
	public $catelist;
	public function rules()
	{
		return [];
	}
	public function attributeLabels()
	{
		return [
			'id1'=>'',
			'catelist'=>'分类',
			'title1'=>'标题',
			'content1'=>'内容',
		];
	}	
	public static function tableName()
	{
		return 'news';
	}	
	// 查询分类表
	public function getCate()
	{
        /** 
        * 第一个参数为要关联的子表模型类名称， 
        * 第二个参数指定通过子表的 id 去关联主表的 article_class 字段 
        */  
       return $this->hasOne(Cate::className(),['c_id'=>'c_id']);
	}
	//添加
	public function getAdd($post)
	{
		$title=$post['News']['title1'];
		$catelist=$post['News']['catelist'];
		$content=$post['News']['content1'];
		// return $title;die;
		$this->id='';
		$this->title=$title;
		$this->content=$content;
		$this->c_id=$catelist;
		return $this->save();
	}
	//删除
	public function getDel($id)
	{
		$res=News::findOne($id);
		return $res->delete();		
	}
	//展示
	public function getlist($keywords)
	{
		// $where=array();
		// $where=[ 1=>1];
		// if($keywords){
		// 	$where[]=" and title like '%$keywords%'";
		// }
     	$data= News::find()  
                    ->joinWith('cate')  
                    ->select('news.*,cate.c_name')
                    // ->where($where)
                    ->asArray()
                    ->all(); 
        return $data;		
	}
	//修改
	public function getUpdateok($post)
	{
		$id=$post['News']['id1'];
		$title=$post['News']['title1'];
		$catelist=$post['News']['catelist'];
		$content=$post['News']['content1'];
		// return $title;die;
		$res=$this->findOne($id);
		$res->title=$title;
		$res->content=$content;
		$res->c_id=$catelist;
		return $res->save();	 
	}

}







 ?>