<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\MdlUserEnrolments]].
 *
 * @see \common\models\MdlUserEnrolments
 */
class MdlUserEnrolmentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\MdlUserEnrolments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\MdlUserEnrolments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
