<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mdl_sessions".
 *
 * @property int $id
 * @property int $state
 * @property string $sid
 * @property int $userid
 * @property string|null $sessdata
 * @property int $timecreated
 * @property int $timemodified
 * @property string|null $firstip
 * @property string|null $lastip
 */
class MdlSessions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mdl_sessions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state', 'userid', 'timecreated', 'timemodified'], 'integer'],
            [['userid', 'timecreated', 'timemodified'], 'required'],
            [['sessdata'], 'string'],
            [['sid'], 'string', 'max' => 128],
            [['firstip', 'lastip'], 'string', 'max' => 45],
            [['sid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state' => 'State',
            'sid' => 'Sid',
            'userid' => 'Userid',
            'sessdata' => 'Sessdata',
            'timecreated' => 'Timecreated',
            'timemodified' => 'Timemodified',
            'firstip' => 'Firstip',
            'lastip' => 'Lastip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\queries\MdlSessionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\MdlSessionsQuery(get_called_class());
    }


    public static function unserializesession($serializedstring) {
        $variables = array();

        $index = 0;

        // Find next delimiter after current index. It's key being the characters between those points.
        while ($delimiterpos = strpos($serializedstring, '|', $index)) {
            $key = substr($serializedstring, $index, $delimiterpos - $index);

            // Start unserializing immediately after the delimiter. PHP will read as much valid data as possible.
            $value = unserialize(substr($serializedstring, $delimiterpos + 1),
                ['allowed_classes' => ['stdClass']]);
            $variables[$key] = $value;

            // Advance index beyond the length of the previously captured serialized value.
            $index = $delimiterpos + 1 + strlen(serialize($value));
        }

        return $variables;
    }
}
