<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_permissions".
 *
 * @property int $id
 * @property string|null $company_code
 * @property string|null $company_level
 * @property string|null $role
 * @property string|null $name
 * @property string|null $created_date
 */
class CompanyPermissions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_permissions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_date'], 'safe'],
            [['company_code', 'company_level', 'role', 'name'], 'string', 'max' => 255],
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
            'company_level' => 'Company Level',
            'role' => 'Role',
            'name' => 'Name',
            'created_date' => 'Created Date',
        ];
    }
}
