<?
namespace app\models;
use yii\db\ActiveRecord;

class Activities extends ActiveRecord {

    public static function tableName() {
        return 'activities';
    }

    public function getUsers() {
        return $this->hasOne(Users::className(), [ 'id_user' => 'user_id']);
    }

}