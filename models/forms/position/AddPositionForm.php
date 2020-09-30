<?php


namespace app\models\forms\position;

use app\models\Position;
use yii\base\Model;

class AddPositionForm extends Model
{
    public $position;


    public function rules()
    {
        return [
            [['position'], 'required'],
            [['position'], 'trim'],
            [['position'], 'unique', 'targetClass' => Position::class],
            [['position'], 'string','length' => [2,15] ],
        ];
    }


    public function save()
    {
        if ($this->validate())
        {
            $position = new Position();
            $position->position = $this->position;
            if ($position->save()) {
                return true;
            }

            return false;

        }
    }


    public function value()
    {
        $array = Position::find()->orderBy('id desc')->all();

        $value = '';

        foreach($array as $item) {
            $value .= '<option value="'.$item->id.'">'.$item->position.'</option>';
        }

        return $value;
    }

}