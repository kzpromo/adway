<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mdl_user_info_category".
 *
 * @property int $id
 * @property string $name
 * @property int $sortorder
 */
class MdlUserInfoCategory extends \yii\db\ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mdl_user_info_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sortorder'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sortorder' => 'Sortorder',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\queries\MdlUserInfoCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\MdlUserInfoCategoryQuery(get_called_class());
    }
}
