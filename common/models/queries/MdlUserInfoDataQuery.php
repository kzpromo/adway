<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\MdlUserInfoData]].
 *
 * @see \common\models\MdlUserInfoData
 */
class MdlUserInfoDataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\MdlUserInfoData[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\MdlUserInfoData|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
