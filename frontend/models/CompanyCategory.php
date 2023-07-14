<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "company_category".
 *
 * @property int $id
 * @property string $company_code
 * @property string $category_code
 * @property string $page_code_title
 * @property string $title
 * @property string $title_pt
 * @property string $title_en
 * @property int|null $order
 * @property int|null $active
 * @property string $created_date
 */
class CompanyCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_code', 'category_code', 'page_code_title', 'title', 'title_pt', 'title_en'], 'required'],
            [['order', 'active'], 'integer'],
            [['created_date'], 'safe'],
            [['company_code', 'category_code', 'page_code_title', 'title', 'title_pt', 'title_en'], 'string', 'max' => 255],
            [['page_code_title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_code' => 'Company Code',
            'category_code' => 'Category Code',
            'page_code_title' => 'Page Code Title',
            'title' => 'Title',
            'title_pt' => 'Title Pt',
            'title_en' => 'Title En',
            'order' => 'Order',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }
}
