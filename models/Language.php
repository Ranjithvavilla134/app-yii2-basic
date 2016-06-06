<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property string $intLanguageID
 * @property string $varCode
 * @property string $varName
 * @property integer $isDefault
 * @property integer $isActive
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['varCode', 'varName'], 'required'],
            [['isDefault', 'isActive'], 'integer'],
            [['varCode'], 'string', 'max' => 2],
            [['varName'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'intLanguageID' => Yii::t('admin', 'ID'),
            'varCode'       => Yii::t('admin', 'Code'),
            'varName'       => Yii::t('admin', 'Name'),
            'isDefault'     => Yii::t('admin', 'Is default'),
            'isActive'      => Yii::t('admin', 'Is active'),
        ];
    }
}
