<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blogs_comments".
 *
 * @property int $id
 * @property string $blog_id
 * @property string $parent_id
 * @property string $username
 * @property string $comment
 * @property string|null $created_date
 */
class BlogsComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogs_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'parent_id', 'username', 'comment'], 'required'],
            [['created_date'], 'safe'],
            [['blog_id', 'parent_id', 'username', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blog_id' => 'Blog ID',
            'parent_id' => 'Parent ID',
            'username' => 'Username',
            'comment' => 'Comment',
            'created_date' => 'Created Date',
        ];
    }
}
