<?php 
namespace frontend\models;
use yii;
use yii\base\Model;
use yii\widgets\ActiveForm;
use yii\helpers\Html;


header("content-type:text/html;charset=utf-8");

class Upload extends Model
{
	public $imageFile;
	public function rules()
	{
		return [
		 [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
		];
	}
	public function attributeLabels()
	{
		return [
			'imageFile'=>'上传文件',
		];
	}
    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFile as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }        	
            // $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            // print_r($filepath);die;
            return true;
        } else {
            return false;
        }
    }
}







 ?>