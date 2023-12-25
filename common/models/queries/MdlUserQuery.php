<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\MdlUser]].
 *
 * @see \common\models\MdlUser
 */
class MdlUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/
	public function defaultOrder(){
		$this->orderBy([
			'id' => SORT_DESC,
		]);
		
		return $this;
	}
    /**
     * {@inheritdoc}
     * @return \common\models\MdlUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\MdlUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
