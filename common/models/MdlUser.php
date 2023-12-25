<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\Cookie;
/**
 * This is the model class for table "mdl_user".
 *
 * @property int $id
 * @property string $auth
 * @property int $confirmed
 * @property int $policyagreed
 * @property int $deleted
 * @property int $suspended
 * @property int $mnethostid
 * @property string $username
 * @property string $password
 * @property string $idnumber
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property int $emailstop
 * @property string $icq
 * @property string $skype
 * @property string $yahoo
 * @property string $aim
 * @property string $msn
 * @property string $phone1
 * @property string $phone2
 * @property string $institution
 * @property string $department
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $lang
 * @property string $calendartype
 * @property string $theme
 * @property string $timezone
 * @property int $firstaccess
 * @property int $lastaccess
 * @property int $lastlogin
 * @property int $currentlogin
 * @property string $lastip
 * @property string $secret
 * @property int $picture
 * @property string $description
 * @property int $descriptionformat
 * @property int $mailformat
 * @property int $maildigest
 * @property int $maildisplay
 * @property int $autosubscribe
 * @property int $trackforums
 * @property int $timecreated
 * @property int $timemodified
 * @property int $trustbitmask
 * @property string $imagealt
 * @property string $lastnamephonetic
 * @property string $firstnamephonetic
 * @property string $middlename
 * @property string $alternatename
 *
 * @property MdlYiiLead[] $mdlYiiLeads
 */
class MdlUser extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mdl_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['confirmed', 'policyagreed', 'deleted', 'suspended', 'mnethostid', 'emailstop', 'firstaccess', 'lastaccess', 'lastlogin', 'currentlogin', 'picture', 'descriptionformat', 'mailformat', 'maildigest', 'maildisplay', 'autosubscribe', 'trackforums', 'timecreated', 'timemodified', 'trustbitmask'], 'integer'],
            [['description', 'fio'], 'string'],
            [['auth', 'phone1', 'phone2'], 'string', 'max' => 20],
            [['username', 'firstname', 'lastname', 'email', 'timezone'], 'string', 'max' => 100],
            [['password', 'idnumber', 'institution', 'department', 'address', 'imagealt', 'lastnamephonetic', 'firstnamephonetic', 'middlename', 'alternatename'], 'string', 'max' => 255],
            [['secret'], 'string', 'max' => 15],
            [['theme'], 'string', 'max' => 50],
            [['city'], 'string', 'max' => 120],
            [['country'], 'string', 'max' => 2],
            [['lang', 'calendartype'], 'string', 'max' => 30],
            [['lastip'], 'string', 'max' => 45],
            [['mnethostid', 'username'], 'unique', 'targetAttribute' => ['mnethostid', 'username']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth' => 'Авторизация',
            'confirmed' => 'Подтвержденный',
            'policyagreed' => 'Согласие с правилами',
            'deleted' => 'Удален',
            'suspended' => 'Заблокирован',
            'mnethostid' => 'Внешний доступ',
            'username' => 'Логин',
            'password' => 'Пароль',
            'fio' => 'ФИО',
            'idnumber' => 'Внешний ID',
            'firstname' => 'Имя',
            'lastname' => "Фамилия",
            'email' => 'Email',
            'emailstop' => 'Emailstop',
            'icq' => 'Icq',
            'skype' => 'Skype',
            'yahoo' => 'Yahoo',
            'aim' => 'Aim',
            'msn' => 'Msn',
            'phone1' => "Номер телефона (основной)",
            'phone2' => "Номер телефона (дополнительный)",
            'institution' => 'Institution',
            'department' => 'Отдел',
            'address' => 'Адрес',
            'city' => 'Город',
            'country' => 'Страна',
            'lang' => 'Язык',
            'calendartype' => 'Calendartype',
            'theme' => 'Theme',
            'timezone' => 'Часовой пояс',
            'firstaccess' => 'Дата первого входа',
            'lastaccess' => 'Дата последнего входа',
            'lastlogin' => 'Дата последней авторизации',
            'currentlogin' => 'Currentlogin',
            'lastip' => 'Вход с IP',
            'secret' => 'Secret',
            'picture' => 'Аватар',
            'url' => 'Url',
            'description' => 'Описание',
            'descriptionformat' => 'Descriptionformat',
            'mailformat' => 'Mailformat',
            'maildigest' => 'Maildigest',
            'maildisplay' => 'Maildisplay',
            'autosubscribe' => 'Autosubscribe',
            'trackforums' => 'Trackforums',
            
            'timemodified' => 'Timemodified',
            'trustbitmask' => 'Trustbitmask',
            'imagealt' => 'Imagealt',
            'lastnamephonetic' => 'Lastnamephonetic',
            'firstnamephonetic' => 'Firstnamephonetic',
            'middlename' => 'Отчество',
            'alternatename' => 'ФИО',
            'profession' => \common\models\Lang::translate('profession'),
			'iin' => 'ИИН',
			'sex' => 'Пол',
			'oked' => 'Основной ОКЭД',
			'place' => 'Планируемое место реализации бизнеса',
			'social_status' => 'Социальный статус',
			'timecreated' => 'Дата регистрации',
        ];
    }
   
    /**
     * {@inheritdoc}
     * @return \common\models\queries\MdlUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\MdlUserQuery(get_called_class());
    }
    
    public function getFio(){
        return @implode(" ", [$this->lastname, $this->firstname, $this->middlename]);
    }
    
    public function getFio_email(){
        return $this->fio." (".$this->email.")";
    }


   
    
    public function getFields(){
        return $this->hasMany(MdlUserInfoData::className(), ['userid' => 'id']);
    }
    
    public function getFieldByName($name){
        $fields = $this->fields;
        if($fields){
            foreach($fields as $field){
                if($field->field->shortname==$name){
                    return $field->data;
                }
            }
        }
        return false;
    }
	
	public static function getFieldValues($name){
		$field = MdlUserInfoField::findOne(['shortname' => $name]);
		if($field){
			$values = explode("\n", $field->param1);
			if($values){
				$out = [];
				foreach($values as $value){
					$out[$value] = $value;
				}
				return $out;
			}
		}
		return false;
	}

	public static function logout(){
        $sid = @$_COOKIE['MoodleSession'];
        if(isset($sid) && !empty($sid)){
            $mdl_session = \common\models\MdlSessions::find()->where(['sid' => $sid])->one();
            if($mdl_session){
                $mdl_session->delete();
                unset($_COOKIE['MoodleSession']);
                setcookie('MoodleSession', '', time() - 3600, '/');

                Yii::$app->user->logout();
            }
        }
    }
	
	public static function getFieldIds(){
		$fields = MdlUserInfoField::find()->all();
		if($fields){
			return yii\helpers\ArrayHelper::map($fields, 'shortname', 'id');
		}
		return false;
	}
    
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'deleted' => 0]);
    }
    
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'deleted' => 0]);
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->password;
    }
    
    public static function login($id){
        $_id = static::findIdentity($id);
        static::switchIdentity($_id);
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    public static function switchIdentity($identity, $duration = 0)
    {
        Yii::$app->user->setIdentity($identity);

        if (!Yii::$app->user->enableSession) {
            return;
        }

        /* Ensure any existing identity cookies are removed. */  
        if (Yii::$app->user->enableAutoLogin) {
            Yii::$app->getResponse()->getCookies()->remove(new Cookie(Yii::$app->user->identityCookie));  
        }

        $session = Yii::$app->getSession();
        

        if ($identity) {
            $session->set(Yii::$app->user->idParam, $identity->getId());
            if (Yii::$app->user->authTimeout !== null) {
                $session->set(Yii::$app->user->authTimeoutParam, time() + Yii::$app->user->authTimeout);
            }
            if (Yii::$app->user->absoluteAuthTimeout !== null) {
                $session->set(Yii::$app->user->absoluteAuthTimeoutParam, time() + Yii::$app->user->absoluteAuthTimeout);
            }
            if ($duration > 0 && Yii::$app->user->enableAutoLogin) {
                Yii::$app->user->sendIdentityCookie($identity, $duration);
            }
        }
    }
}
