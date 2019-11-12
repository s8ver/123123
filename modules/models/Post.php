<?php

namespace app\modules\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $file
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['title', 'description','predmet'], 'string', 'max' => 255],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Препод',
            'predmet' => 'Предмет',
            'description' => 'Описание',
            'file' => 'Файл',
        ];
    }
     public function saveFile($filename)
    {
        $this->file = $filename;
        return $this->save(false);
    }
    
}
