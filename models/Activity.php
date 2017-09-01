<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aub_activities".
 *
 * @property integer $id
 * @property integer $id_category
 * @property string $name
 * @property string $description
 * @property string $link
 *
 * @property AubCategories $idCategory
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aub_activities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'name', 'description', 'link'], 'required'],
            [['id_category'], 'integer'],
            [['description'], 'string'],
            [['name', 'link'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => AubCategories::className(), 'targetAttribute' => ['id_category' => 'id_categorie']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Id Category',
            'name' => 'Name',
            'description' => 'Description',
            'link' => 'Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(AubCategories::className(), ['id_categorie' => 'id_category']);
    }
}
