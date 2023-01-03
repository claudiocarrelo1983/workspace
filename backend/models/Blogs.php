<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blogs".
 *
 * @property int $id
 * @property string $page_code_title
 * @property string $page_code_subtitle
 * @property string $page_code_text
 * @property string $image
 * @property string|null $image_instagram
 * @property string $title
 * @property string|null $alt
 * @property string|null $text
 * @property string $tags
 * @property string|null $subtitle
 * @property string $title_pt
 * @property string $title_es
 * @property string $title_en
 * @property string $title_it
 * @property string $title_fr
 * @property string $title_de
 * @property string $text_pt
 * @property string $text_es
 * @property string $text_en
 * @property string $text_it
 * @property string $text_fr
 * @property string $text_de
 * @property string $subtitle_pt
 * @property string $subtitle_es
 * @property string $subtitle_en
 * @property string $subtitle_it
 * @property string $subtitle_fr
 * @property string $subtitle_de
 * @property string|null $username
 * @property int|null $active
 * @property string $created_date
 */
class Blogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_code_title', 'page_code_subtitle', 'page_code_text', 'image', 'title', 'tags', 'title_pt', 'title_es', 'title_en', 'title_it', 'title_fr', 'title_de', 'text_pt', 'text_es', 'text_en', 'text_it', 'text_fr', 'text_de', 'subtitle_pt', 'subtitle_es', 'subtitle_en', 'subtitle_it', 'subtitle_fr', 'subtitle_de'], 'required'],
            [['text'], 'string'],
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['page_code_title', 'page_code_subtitle', 'page_code_text', 'image', 'image_instagram', 'title', 'alt', 'tags', 'subtitle', 'title_pt', 'title_es', 'title_en', 'title_it', 'title_fr', 'title_de', 'text_pt', 'text_es', 'text_en', 'text_it', 'text_fr', 'text_de', 'subtitle_pt', 'subtitle_es', 'subtitle_en', 'subtitle_it', 'subtitle_fr', 'subtitle_de', 'username'], 'string', 'max' => 255],
            [['page_code_title'], 'unique'],
            [['page_code_subtitle'], 'unique'],
            [['page_code_text'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_code_title' => 'Page Code Title',
            'page_code_subtitle' => 'Page Code Subtitle',
            'page_code_text' => 'Page Code Text',
            'image' => 'Image',
            'image_instagram' => 'Image Instagram',
            'title' => 'Title',
            'alt' => 'Alt',
            'text' => 'Text',
            'tags' => 'Tags',
            'subtitle' => 'Subtitle',
            'title_pt' => 'Title Pt',
            'title_es' => 'Title Es',
            'title_en' => 'Title En',
            'title_it' => 'Title It',
            'title_fr' => 'Title Fr',
            'title_de' => 'Title De',
            'text_pt' => 'Text Pt',
            'text_es' => 'Text Es',
            'text_en' => 'Text En',
            'text_it' => 'Text It',
            'text_fr' => 'Text Fr',
            'text_de' => 'Text De',
            'subtitle_pt' => 'Subtitle Pt',
            'subtitle_es' => 'Subtitle Es',
            'subtitle_en' => 'Subtitle En',
            'subtitle_it' => 'Subtitle It',
            'subtitle_fr' => 'Subtitle Fr',
            'subtitle_de' => 'Subtitle De',
            'username' => 'Username',
            'active' => 'Active',
            'created_date' => 'Created Date',
        ];
    }
}
