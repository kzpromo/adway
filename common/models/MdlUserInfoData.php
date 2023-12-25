<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "mdl_user_info_data".
 *
 * @property int $id
 * @property int $userid
 * @property int $fieldid
 * @property string $data
 * @property int $dataformat
 */
class MdlUserInfoData extends \yii\db\ActiveRecord
{
    
    
    public $prof_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mdl_user_info_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'fieldid', 'dataformat', 'prof_id'], 'integer'],
            [['data'], 'required'],
            [['data'], 'string'],
            [['userid', 'fieldid'], 'unique', 'targetAttribute' => ['userid', 'fieldid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Пользователь',
            'fieldid' => 'Поле',
            'data' => 'Данные',
            'dataformat' => 'Dataformat',
            'prof_id' => 'Профессия',
        ];
    }
    
    public function getUsers(){
        return ArrayHelper::map(MdlUserInfoData::find()->where(['data' => $this->data])->all(), 'userid', 'fio');
    }
    
    private function getUsersObj(){
        return MdlUserInfoData::find()->where(['data' => $this->data])->all();
    }

    /**
     * {@inheritdoc}
     * @return \common\models\queries\MdlUserInfoDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\MdlUserInfoDataQuery(get_called_class());
    }
    
    public function getField()
    {
        return $this->hasOne(MdlUserInfoField::className(), ['id' => 'fieldid']);
    }
    
    public function getUser()
    {
        return $this->hasOne(MdlUser::className(), ['id' => 'userid']);
    }
    
    
    public function getFio(){
        return $this->user->fio;
    }
    
    public function getUsersProf(){
        $out = [];
        
        $users = $this->getUsersObj();
        if($users){
            foreach($users as $user){
                $out[] = $user->user->prof->id;
            }
        }
        return $out;
    }
    
    public function getProfs(){
        $out = [];
        
        $users = $this->getUsersObj();
        if($users){
            foreach($users as $user){
                if(!empty($user->user->prof->id)){
                    $out[] = [
                        'title' => $user->user->prof->title,
                        'id' => $user->user->prof->id,
                    ];
                }
            }
        }
        return $out;
    }
}
