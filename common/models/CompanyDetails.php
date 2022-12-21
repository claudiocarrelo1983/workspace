<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_details".
 *
 * @property int $id
 * @property string|null $company_code
 * @property string|null $logo
 * @property string|null $url_code
 * @property string|null $text
 * @property string|null $extternal_url
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $twitter
 * @property string|null $linkedin
 * @property string|null $youtube
 * @property string|null $created_date
 */
class CompanyDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['created_date'], 'safe'],
            [['company_code', 'logo', 'url_code', 'extternal_url', 'facebook', 'instagram', 'twitter', 'linkedin', 'youtube'], 'string', 'max' => 255],
            [['url_code'], 'unique'],
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
            'logo' => 'Logo',
            'url_code' => 'Url Code',
            'text' => 'Text',
            'extternal_url' => 'Extternal Url',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'linkedin' => 'Linkedin',
            'youtube' => 'Youtube',
            'created_date' => 'Created Date',
        ];
    }
}
