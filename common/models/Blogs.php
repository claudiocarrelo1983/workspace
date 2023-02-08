<?php

namespace common\models;
use common\Helpers\Helpers;
use yii\base\Modl;
use Yii;
use yii\db\Query;
use yii\web\UploadedFile;


/**
 * This is the model class for table "blogs".
 *
 * @property int $id
 * @property string $image
 * @property string $title
 * @property string $subtitle
 * @property string $alt
 * @property string $url
 * @property string $text
 * @property string|null $date
 * @property string $username
 * @property string $tags
 * @property string|null $created_date
 */
class Blogs extends \yii\db\ActiveRecord
{

    public $imageFile;

    public $imageFile2;

    public $generate;

    public $tagsArr;

 

      /**
     *
     * @var UploadedFile
     */


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

     /*
    public function rules()
    {     

        return [    
            [['imageFile','imageFile2'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['title', 'subtitle', 'alt', 'text', 'tags','active', 'text_pt', 'text_es', 'text_en', 'text_it', 'text_fr', 'text_de','title_pt', 'title_es', 'title_en', 'title_it', 'title_fr', 'title_de','subtitle_pt', 'subtitle_es', 'subtitle_en', 'subtitle_it', 'subtitle_fr', 'subtitle_de'], 'required'],
            [['created_date'], 'safe'],
            [['title', 'subtitle', 'generate','alt', 'image', 'username','tags'], 'string', 'max' => 255],
            [['text'], 'string'],
        ];

        
    }
    */

    public function rules()
    {
        return [
            [['tagsArr','text','page_code_title', 'page_code_subtitle', 'page_code_text','title', 'tags', 'title_pt', 'title_en','text_pt','text_en','subtitle_pt','subtitle_en'], 'required'],
            [['text','url'], 'string'],
            [['active'], 'integer'],
            [['created_date'], 'safe'],
            [['page_code_title', 'page_code_subtitle', 'page_code_text', 'image', 'image_instagram', 'title', 'alt', 'tags','subtitle', 'title_pt','title_en','text_pt','text_en','subtitle_pt','subtitle_en','username'], 'string'],
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
            'imageFile' => 'Image2',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'alt' => 'Alt',      
            'text' => 'Text',    
            'generate' => 'Generate',    
            'username' => 'Username',
            'tags' => 'Tags',
            'created_date' => 'Created Date',
        ];
    }

    public function imgUrl(){
        return '/images/blog/';
    }

    public function upload()
    {      
        $model = new Model();
  
        if ($model->validate()) {   
         
            if(isset($this->imageFile)){

                Helpers::upload(
                    '@frontend/web/images/blog/'.$this->imageFile->baseName, 
                    900, 
                    500, 
                    'center', 
                    70, 
                    $this->imageFile->baseName
                );

               
                /*
                $fileName = $this->imageFile->baseName. date('YmdHis');;      

                $this->image = $this->imgUrl() .$fileName.'.'.$this->imageFile->extension;                

                $this->imageFile->saveAs('@frontend/web/images/blog/' . $fileName . '.' . $this->imageFile->extension, false);
                */
                $this->created_date = date('Y-m-d H:i:s');
                
                return true;
            }else{
                return false;
            }       

        } else {
            return false;
        }
    }

    public function validate($attributeNames = null, $clearErrors = true)
    {
        if ($clearErrors) {
            $this->clearErrors();
        }

        if (!$this->beforeValidate()) {
            return false;
        }

        $scenarios = $this->scenarios();
        $scenario = $this->getScenario();
        if (!isset($scenarios[$scenario])) {
            throw new InvalidArgumentException("Unknown scenario: $scenario");
        }

        if ($attributeNames === null) {
            $attributeNames = $this->activeAttributes();
        }

        $attributeNames = (array)$attributeNames;

        foreach ($this->getActiveValidators() as $validator) {
            $validator->validateAttributes($this, $attributeNames);
        }
        $this->afterValidate();

        return !$this->hasErrors();
    }

    public static function getWords($sentence, $count = 190) {
        return substr($sentence,0, $count);      
    }

    public static function blogTags($arrTags){

        $arr =  array();

        foreach($arrTags as $values){

            if(empty($values['tag_parent_id'])){    
                $values['submenu'] = Blogs::blogTagsHelper($arrTags, $values);   
                $arr[] = $values;
            }         
        }
  
        return  $arr;

    }

    public static function blogTagsHelper($arrTags, $values){

        $arr =  array();  
     
        foreach($arrTags as $tag){             
    
            if(!empty($tag['tag_parent_id'])){
                if(trim($tag['tag_parent_id']) == trim($values['tag'])){
                    $arr[] =  $tag;
                }      
            }      
             
        }    
    
        return  $arr;
    }
    
    public static function saveBlogs($page, $model){
        

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach($countries as $val){

            $title = 'title_'.$val['country_code'];
            $subtitle = 'subtitle_'.$val['country_code'];
            $text = 'text_'.$val['country_code'];

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_title,
                'text' => $model->$title,
                'active' => $model->active,
            ])->execute();

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_subtitle,
                'text' => $model->$subtitle,
                'active' => $model->active,
            ])->execute();
        
            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_text,
                'text' => $model->$text,
                'active' => $model->active,
            ])->execute();
        }

        return true;    
    }


    public static function updateBlogs($page, $model){

        $connection = new Query;

        $countries = $connection->select([
            'country_code' 
            ])
        ->from('countries')    
        ->all();

        foreach ($countries as $val) {

            $title = 'title_'.$val['country_code'];
            $subtitle = 'subtitle_'.$val['country_code'];
            $text = 'text_'.$val['country_code'];   
            
            $connection->createCommand()->delete('translations',
            [   
                'country_code' => $val['country_code'],               
                'page_code' => $model->page_code_title                        
            ])->execute();

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_title,
                'text' => $model->$title,
                'active' => 1,
            ])->execute();

                
            $connection->createCommand()->delete('translations',
            [   
                'country_code' => $val['country_code'],               
                'page_code' => $model->page_code_subtitle                        
            ])->execute();

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_subtitle,
                'text' => $model->$subtitle,
                'active' => 1,
            ])->execute();

            $connection->createCommand()->delete('translations',
            [   
                'country_code' => $val['country_code'],               
                'page_code' => $model->page_code_text                        
            ])->execute();

            $connection->createCommand()->insert('translations', [      
                'country_code' => $val['country_code'],  
                'page' => $page,
                'page_code' => $model->page_code_text,
                'text' => $model->$text,
                'active' => 1,
            ])->execute();          

        }
    }

}
