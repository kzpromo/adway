<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\MdlSessions]].
 *
 * @see \common\models\MdlSessions
 */
class MdlSessionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\MdlSessions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\MdlSessions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
