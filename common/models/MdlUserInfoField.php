<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mdl_user_info_field".
 *
 * @property int $id
 * @property string $shortname
 * @property string $name
 * @property string $datatype
 * @property string $description
 * @property int $descriptionformat
 * @property int $categoryid
 * @property int $sortorder
 * @property int $required
 * @property int $locked
 * @property int $visible
 * @property int $forceunique
 * @property int $signup
 * @property string $defaultdata
 * @property int $defaultdataformat
 * @property string $param1
 * @property string $param2
 * @property string $param3
 * @property string $param4
 * @property string $param5
 */
class MdlUserInfoField extends \yii\db\ActiveRecord
{
    
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mdl_user_info_field';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description', 'defaultdata', 'param1', 'param2', 'param3', 'param4', 'param5'], 'string'],
            [['descriptionformat', 'categoryid', 'sortorder', 'required', 'locked', 'visible', 'forceunique', 'signup', 'defaultdataformat'], 'integer'],
            [['shortname', 'datatype'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shortname' => 'Shortname',
            'name' => 'Name',
            'datatype' => 'Datatype',
            'description' => 'Description',
            'descriptionformat' => 'Descriptionformat',
            'categoryid' => 'Categoryid',
            'sortorder' => 'Sortorder',
            'required' => 'Required',
            'locked' => 'Locked',
            'visible' => 'Visible',
            'forceunique' => 'Forceunique',
            'signup' => 'Signup',
            'defaultdata' => 'Defaultdata',
            'defaultdataformat' => 'Defaultdataformat',
            'param1' => 'Param1',
            'param2' => 'Param2',
            'param3' => 'Param3',
            'param4' => 'Param4',
            'param5' => 'Param5',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\queries\MdlUserInfoFieldQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\MdlUserInfoFieldQuery(get_called_class());
    }
    
    
}
