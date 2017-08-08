<?php 
namespace backend\models;

use yii\db\ActiveRecord;

class Newss extends ActiveRecord
{
	public $n_ids;
	public $c_names;
	public $n_titles;
	public $catelist;
	public $n_contents;
	public function rules()
	{
		return [];
	}
	public function attributeLabels()
	{
		return [
			'n_ids'=>'',
			'c_names'=>'',
			'n_titles'=>'新闻名称',
			'catelist'=>'新闻分类',
			'n_contents'=>'新闻内容',
		];
	}
	public static function  tableName()
	{
		return "newss";
	}
	public function getCates()
    {
        return $this->hasOne(Cates::className(),['c_id' => 'c_id']);
    }	
    public function getAdd($post)
    {
    	$n_titles=$post['Newss']['n_titles'];
    	$catelist=$post['Newss']['catelist'];
    	$n_contents=$post['Newss']['n_contents'];
    	$model=new Newss();
    	$model->n_title=$n_titles;
    	$model->n_content=$n_contents;
    	$model->c_id=$catelist;
    	return $model->save();
    }
    public function getCount($where)
    {
		$count = Newss::find()
					->where($where)
					->count();
		return $count;    	
    }
	public function getList($limit,$pageSize,$where)
	{
		$list = Newss::find()
					->joinWith('cates')
					->select('newss.*,cates.c_name')
					->where($where)
					->offset($limit)
					->limit($pageSize)
					->asArray()
					->all();
		return $list;
	}
	public function getdel($id)
	{
		$res=Newss::findOne($id);
		return $res->delete();
	}
	public function getUpdate($id)
	{
		$res=Newss::findOne($id);
		return $res;		
	}
	public function getUpdateok($post)
	{
		$n_ids=$post['Newss']['n_ids'];
		$n_titles=$post['Newss']['n_titles'];
		$catelist=$post['Newss']['catelist'];
		$n_contents=$post['Newss']['n_contents'];
		$res=Newss::findOne($n_ids);
		$res->n_title=$n_titles;		
		$res->n_content=$n_contents;		
		$res->c_id=$catelist;	
		return $res->save();	
	}
	public function getShow($id)
	{
		$list = Newss::find()
					->joinWith('cates')
					->select('newss.*,cates.c_name')
					->where("newss.id=$id")
					->asArray()
					->One();
		return $list;		
	}
}