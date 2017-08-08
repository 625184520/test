<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property integer $b_id
 * @property string $user_name
 * @property string $b_content
 * @property integer $add_time
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['add_time'], 'integer'],
            [['user_name'], 'string', 'max' => 50],
            [['b_content'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'b_id' => 'B ID',
            'user_name' => 'User Name',
            'b_content' => 'B Content',
            'add_time' => 'Add Time',
        ];
    }
}
