<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\MdlRoleAssignments]].
 *
 * @see \common\models\MdlRoleAssignments
 */
class MdlRoleAssignmentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\MdlRoleAssignments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\MdlRoleAssignments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
