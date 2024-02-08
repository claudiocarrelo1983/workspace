<?php

use yii\db\Migration;

/**
 * Class m230620_133908_company
 */
class m230620_133908_company extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230620_133908_company cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),      
            'company_code' => $this->string()->unique(),    
            'company_code_url' => $this->string(),            
            'company_name' => $this->string(),
            'path' => $this->string(),
            'image_logo' => $this->string(),    
            'image_banner' => $this->string(),   
            'page_code_text' => $this->string()->notNull()->unique(),
            'page_code_subtitle' => $this->string()->notNull()->unique(),            
            'page_code_team_title' => $this->string()->notNull()->unique(),
            'page_code_team_text' => $this->string()->notNull()->unique(),
            'page_code_manteinance' => $this->string()->notNull()->unique(),
            'page_code_banner' => $this->string()->notNull()->unique(),            
            'text' => $this->text(),
            'subtitle' => $this->text(),
            'text_pt' => $this->text()->defaultValue(Yii::t('app', 'default_text', [],'pt')),           
            'subtitle_pt' => $this->text()->defaultValue(Yii::t('app', 'default_subtitle', [],'pt')),
            'team_title_pt' => $this->string()->defaultValue(Yii::t('app', 'default_team_title', [],'pt')),
            'team_text_pt' => $this->text()->defaultValue(Yii::t('app', 'default_team_text', [],'pt')),   
            'text_en' => $this->text()->defaultValue(Yii::t('app', 'default_text', [],'en')),
            'subtitle_en' => $this->text()->defaultValue(Yii::t('app', 'default_subtitle', [],'en')),
            'team_title_en' => $this->string()->defaultValue(Yii::t('app', 'default_team_title', [],'en')), 
            'team_text_en' => $this->text()->defaultValue(Yii::t('app', 'default_team_text', [],'en')), 
            'nif' => $this->string(),
            'cae' => $this->string(),   
            'email_1' => $this->string(),
            'email_2' => $this->string(),        
            'contact_number_1' => $this->string(),
            'contact_number_2' => $this->string(),
            'contact_number_3' => $this->string(),
            'address_line_1' => $this->string(),    
            'address_line_2' => $this->string(),  
            'website' => $this->string(),
            'facebook' => $this->string(),
            'pinterest' => $this->string(),
            'instagram' => $this->string(),
            'twitter' => $this->string(),
            'tiktok' => $this->string(),
            'linkedin' => $this->string(),
            'youtube' => $this->string(),                     
            'city' => $this->string(),  
            'postcode' => $this->string(),
            'location' => $this->string(),
            'country' => $this->string(), 
            'sheddule_array' => $this->text()->defaultValue('{"monday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"tuesday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"wednesday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"thursday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"friday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"saturday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"false"},"sunday":{"start":"09:00","end":"18:00","break_start":"12:00","break_end":"13:00","closed":"true"}}'),                    
            'color' => $this->string()->defaultValue('#0088CC'),          
            'template' => $this->string(),    
            'coin' => $this->string(),  
            'cancelation_time' => $this->integer()->defaultValue(0), 
            'timespan' => $this->integer()->defaultValue(0), 
            'opt_sms' => $this->boolean()->defaultValue(0), 
            'opt_email' => $this->boolean()->defaultValue(0),  
            'login_required' => $this->boolean()->defaultValue(0),  
            'publish' => $this->boolean()->defaultValue(0),       
            'banner_pt' => $this->text()->defaultValue('banner_default_text'), 
            'banner_en' => $this->text()->defaultValue('banner_default_text'),       
            'manteinance' => $this->boolean()->defaultValue(0), 
            'manteinance_pt' => $this->text()->defaultValue('manteinance_default_text'), 
            'manteinance_en' => $this->text()->defaultValue('manteinance_default_text'), 
            'active' => $this->boolean()->defaultValue(1), 
            'created_date' => $this->timestamp()
             
        ], $tableOptions);
        
    }

    public function down()
    {
        $this->dropTable('{{%company}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230620_133908_company cannot be reverted.\n";

        return false;
    }
    */
}
