<?
namespace app\models;
use yii\db\ActiveRecord;

class Users extends ActiveRecord {

    public static function tableName() {
        return 'users';
    }

    public function getActivities() {
        return $this->hasMany(Activities::className(), [ 'user_id' => 'id_user']);
    }

}