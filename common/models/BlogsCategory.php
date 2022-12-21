<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blogs_category".
 *
 * @property int $id
 * @property string $tag
 * @property string|null $url
 * @property string $description
 * @property string|null $created_date
 */
class BlogsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogs_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag', 'description'], 'required'],
            [['created_date'], 'safe'],
            [['tag_parent_id','tag',  'description'], 'string', 'max' => 255],
            [['tag'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag' => 'Tag', 
            'tag_parent_id' => 'Tag Parent Id',        
            'description' => 'Description',
            'created_date' => 'Created Date',
        ];
    }
}
