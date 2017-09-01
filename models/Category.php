<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aub_categories".
 *
 * @property integer $id_categorie
 * @property string $nom
 * @property string $description
 * @property string $logo
 *
 * @property Activities[] $Activities
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aub_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nom', 'description', 'logo'], 'required'],
            [['nom', 'logo'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categorie' => 'Id Categorie',
            'nom' => 'Nom',
            'description' => 'Description',
            'logo' => 'Logo',
        ];
    }

    public function fields()
    {
        $fields = parent::fields();
        $fields['activityList'] = function($model){ return $model->activities; };
        return $fields;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['id_category' => 'id_categorie']);
    }
}
