<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "mdl_user_enrolments".
 *
 * @property int $id
 * @property int $status
 * @property int $enrolid
 * @property int $userid
 * @property int $timestart
 * @property int $timeend
 * @property int $modifierid
 * @property int $timecreated
 * @property int $timemodified
 */
class MdlUserEnrolments extends \yii\db\ActiveRecord
{
    
    public $role_name, $role_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mdl_user_enrolments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'enrolid', 'userid', 'timestart', 'timeend', 'modifierid', 'timecreated', 'timemodified', 'role_id'], 'integer'],
            [['enrolid', 'userid'], 'required'],
            [['enrolid', 'userid'], 'unique', 'targetAttribute' => ['enrolid', 'userid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'enrolid' => 'Enrolid',
            'userid' => 'Userid',
            'timestart' => 'Timestart',
            'timeend' => 'Timeend',
            'modifierid' => 'Modifierid',
            'timecreated' => 'Timecreated',
            'timemodified' => 'Timemodified',
            'role' => 'Роль',
            'role_name' => 'Роль',
            'role_id' => 'Роль',
            'course' => 'Course',
            'course_name' => 'Название курса',
            'user_fio' => 'ФИО',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\queries\MdlUserEnrolmentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\MdlUserEnrolmentsQuery(get_called_class());
    }
    
    public function getUser()
    {
        return $this->hasOne(MdlUser::className(), ['id' => 'userid']);
    }
    
    public function getEnrol()
    {
        return $this->hasOne(MdlEnrol::className(), ['id' => 'enrolid']);
    }
    
    public static function roles(){
        $roles = MdlRole::find()->all();
        return ArrayHelper::map($roles, 'id', 'shortname');
    }
    
    public static function roles_shortname(){
        $roles = MdlRole::find()->all();
        return ArrayHelper::map($roles, 'shortname', 'shortname');
    }
    
    
    public function getCourse(){
        if($this->enrolid){
            return $this->enrol->course;
        }
        return false;
    }
    
    public function getCourseid(){
        if($this->enrolid){
            return $this->enrol->courseid;
        }
        return false;
    }
    
    public function getRole(){
        $course_id = $this->courseid;
        $context = new MdlContext();
        $context->courseid = $course_id;
        $context_id = $context->course_context();
        if($context_id){
            $role_assign = MdlRoleAssignments::find()->where(['contextid' => $context_id, 'userid' => $this->userid])->one();
            if($role_assign){
                $roles = self::roles();
                return $roles[$role_assign->roleid];
            }
        }
        return false;
    }
    
    public function getRoleId(){
        $course_id = $this->courseid;
        $context = new MdlContext();
        $context->courseid = $course_id;
        $context_id = $context->course_context();
        if($context_id){
            $role_assign = MdlRoleAssignments::find()->where(['contextid' => $context_id, 'userid' => $this->userid])->one();
            if($role_assign){
                return $role_assign->roleid;
            }
        }
        return false;
    }
    
    
    public static function findRole($user_id, $enrol_id){
        $enrol = MdlEnrol::findOne($enrol_id);
        if($enrol){
            $course_id = $enrol->courseid;
            $context = new MdlContext();
            $context->courseid = $course_id;
            $context_id = $context->course_context();
            if($context_id){
                $role_assign = MdlRoleAssignments::find()->where(['contextid' => $context_id, 'userid' => $this->userid])->one();
                if($role_assign){
                    $roles = self::roles();
                    return $roles[$role_assign->roleid];
                }
            }
        }
        return false;
    }
}
