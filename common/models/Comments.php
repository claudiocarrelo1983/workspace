<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $page
 * @property string $comment_id
 * @property string $parent_id
 * @property string $full_name
 * @property string $email
 * @property string $comment
 * @property int|null $validation
 * @property string $created_date
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page', 'full_name', 'comment'], 'required'],         
            [['validation'], 'integer'],
            [['created_date'], 'safe'],
            [['page', 'comment_id', 'parent_id', 'full_name', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page' => 'Page',
            'comment_id' => 'Comment ID',
            'parent_id' => 'Parent ID',
            'full_name' => 'Full Name',
            'email' => 'Email',
            'comment' => 'Comment',
            'validation' => 'Validation',
            'created_date' => 'Created Date',
        ];
    }
}
