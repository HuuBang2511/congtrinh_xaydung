<?php

namespace app\modules\quanly\models;

use Yii;

/**
 * This is the model class for table "coquan_thamdinh".
 *
 * @property int $id 
 * @property string|null $ten Tên cơ quan thẩm định
 */
class CoquanThamdinh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coquan_thamdinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id ' => 'Id',
            'ten' => 'Ten',
        ];
    }
}
