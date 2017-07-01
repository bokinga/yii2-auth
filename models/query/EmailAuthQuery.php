<?php
namespace app\models\query;

use yii\db\ActiveQuery;

/**
 * Class EmailAuthQuery
 * @author Denis Kison
 * @date 01.07.2017
 */
class EmailAuthQuery extends ActiveQuery {

    /**
     * Add where condition for email field
     * @param string $email - user email
     * @return $this
     */
    public function email($email) {
        return $this->andWhere(['user_email' => $email]);
    }

}