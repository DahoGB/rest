<?php

namespace backend\modules\api\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property int $age
 * @property string $gender
 */
class Employee extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'age', 'gender'], 'required'],
            [['name'], 'string'],
            [['age'], 'integer'],
            [['gender'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'age' => 'Age',
            'gender' => 'Gender',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['name', 'age', 'gender'];
        return $scenarios;
    }
}
