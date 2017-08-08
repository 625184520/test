<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "demos".
 *
 * @property integer $id
 * @property string $name
 * @property string $sex
 * @property string $hobby
 * @property integer $age
 */
class Demos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'demos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['age'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['sex'], 'string', 'max' => 30],
            [['hobby'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sex' => 'Sex',
            'hobby' => 'Hobby',
            'age' => 'Age',
        ];
    }
    public function getage($start,$end)
    {
        $arr=[];
        for($i=$start;$i<=$end;$i++)
        {
            $arr[$i]=$i;
        }
        return $arr;
    }
}
