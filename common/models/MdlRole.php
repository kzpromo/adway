<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mdl_role".
 *
 * @property int $id
 * @property string $name
 * @property string $shortname
 * @property string $description
 * @property int $sortorder
 * @property string $archetype
 */
class MdlRole extends \yii\db\ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mdl_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string'],
            [['sortorder'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['shortname'], 'string', 'max' => 100],
            [['archetype'], 'string', 'max' => 30],
            [['sortorder'], 'unique'],
            [['shortname'], 'unique'],
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
            'shortname' => 'Shortname',
            'description' => 'Description',
            'sortorder' => 'Sortorder',
            'archetype' => 'Archetype',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\queries\MdlRoleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\MdlRoleQuery(get_called_class());
    }
}
