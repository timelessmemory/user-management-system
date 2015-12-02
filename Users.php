<?php

namespace app\models;

use yii\mongodb\ActiveRecord;

class Users extends ActiveRecord
{
	public function attributes()
    {
       return ['_id', 'name', 'password', 'description'];
    }

    public static function collectionName()
    {
        return 'users';
    }
}

?>