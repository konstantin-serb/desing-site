<?php


namespace app\models\forms\project;

use app\models\Project;
use yii\base\Model;

class CalculateForm extends Model
{
    public $sum;
    public $path1;
    public $path2;
    public $path3;
    public $path4;
    public $path5;
    public $result1;
    public $result2;
    public $result3;
    public $result4;
    public $result5;


    public function calculate()
    {
        if ($this->path1 == '') {
            $this->path1 = 0;
        }
        if ($this->path2 == '') {
            $this->path2 = 0;
        }
        if ($this->path3 == '') {
            $this->path3 = 0;
        }
        if ($this->path4 == '') {
            $this->path4 = 0;
        }
        if ($this->path5 == '') {
            $this->path5 = 0;
        }

        $pathSum = $this->path1 + $this->path2 + $this->path3 + $this->path4 + $this->path5;

        if ($pathSum == 100) {
            $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
        } else {
            if ($pathSum < 100) {
                if ($this->path1 == 0 &&
                $this->path2 == 0 &&
                $this->path3 == 0 &&
                $this->path4 == 0 &&
                $this->path5 == 0
                ) {
                    $this->path1 = $this->path2 =$this->path3 = $this->path4 = $this->path5 = 20;
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 == 0 &&
                    $this->path3 == 0 &&
                    $this->path4 == 0 &&
                    $this->path5 == 0
                ) {
                    $this->path2 = 100 - $this->path1;
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 != 0 &&
                    $this->path3 == 0 &&
                    $this->path4 == 0 &&
                    $this->path5 == 0
                ) {
                    $this->path1 = 100 - $this->path2;
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 == 0 &&
                    $this->path3 != 0 &&
                    $this->path4 == 0 &&
                    $this->path5 == 0
                ) {
                    $this->path1 = 100 - $this->path3;
                    $this->path2 = $this->path3;
                    $this->path3 = 0;
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 == 0 &&
                    $this->path3 == 0 &&
                    $this->path4 != 0 &&
                    $this->path5 == 0
                ) {
                    $this->path1 = 100 - $this->path4;
                    $this->path2 = $this->path4;
                    $this->path4 = 0;
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 == 0 &&
                    $this->path3 == 0 &&
                    $this->path4 == 0 &&
                    $this->path5 != 0
                ) {
                    $this->path1 = 100 - $this->path5;
                    $this->path2 = $this->path5;
                    $this->path5 = 0;
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 != 0 &&
                    $this->path3 == 0 &&
                    $this->path4 == 0 &&
                    $this->path5 == 0
                ) {
                    $this->path3 = 100 - ($this->path1 + $this->path2);
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 == 0 &&
                    $this->path3 != 0 &&
                    $this->path4 == 0 &&
                    $this->path5 == 0
                ) {
                    $this->path2 = $this->path3;
                    $this->path3 = 100 - ($this->path1 + $this->path2);
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 == 0 &&
                    $this->path3 == 0 &&
                    $this->path4 != 0 &&
                    $this->path5 == 0
                ) {
                    $this->path2 = $this->path4;
                    $this->path3 = 100 - ($this->path1 + $this->path2);
                    $this->path4 = 0;
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 == 0 &&
                    $this->path3 == 0 &&
                    $this->path4 == 0 &&
                    $this->path5 != 0
                ) {
                    $this->path2 = $this->path5;
                    $this->path3 = 100 - ($this->path1 + $this->path5);
                    $this->path5 = 0;
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 != 0 &&
                    $this->path3 != 0 &&
                    $this->path4 == 0 &&
                    $this->path5 == 0
                ) {
                    $this->path4 = 100 - ($this->path2 + $this->path3);
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 != 0 &&
                    $this->path3 == 0 &&
                    $this->path4 != 0 &&
                    $this->path5 == 0
                ) {
                    $this->path3 = 100 - ($this->path2 + $this->path4);
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 != 0 &&
                    $this->path3 == 0 &&
                    $this->path4 == 0 &&
                    $this->path5 != 0
                ) {
                    $this->path3 = $this->path5;
                    $this->path5 = 0;
                    $this->path4 = 100 - ($this->path2 + $this->path3);
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 == 0 &&
                    $this->path3 != 0 &&
                    $this->path4 != 0 &&
                    $this->path5 == 0
                ) {
                    $this->path5 = 100 - ($this->path3 + $this->path4);
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 == 0 &&
                    $this->path3 != 0 &&
                    $this->path4 == 0 &&
                    $this->path5 != 0
                ) {
                    $this->path4 = 100 - ($this->path3 + $this->path5);
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 == 0 &&
                    $this->path3 == 0 &&
                    $this->path4 != 0 &&
                    $this->path5 != 0
                ) {
                    $this->path3 = 100 - ($this->path5 + $this->path4);
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 != 0 &&
                    $this->path3 != 0 &&
                    $this->path4 == 0 &&
                    $this->path5 == 0
                ) {
                    $this->path4 = 100 - ($this->path1 + $this->path2 + $this->path3);

                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 != 0 &&
                    $this->path3 == 0 &&
                    $this->path4 != 0 &&
                    $this->path5 == 0
                ) {
                    $this->path3= $this->path4;
                    $this->path4 = 100 - ($this->path1 + $this->path2 + $this->path3);

                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 != 0 &&
                    $this->path3 == 0 &&
                    $this->path4 == 0 &&
                    $this->path5 != 0
                ) {
                    $this->path3= $this->path5;
                    $this->path4 = 100 - ($this->path1 + $this->path2 + $this->path3);
                    $this->path5 = 0;

                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 != 0 &&
                    $this->path3 != 0 &&
                    $this->path4 != 0 &&
                    $this->path5 == 0
                ) {
                    $this->path1 = 100 - ($this->path2 + $this->path3 + $this->path4);
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 != 0 &&
                    $this->path3 != 0 &&
                    $this->path4 != 0 &&
                    $this->path5 != 0
                ) {
                    $this->path1 = 100 - ($this->path2 + $this->path3 + $this->path4 + $this->path5);
                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 != 0 &&
                    $this->path3 != 0 &&
                    $this->path4 != 0 &&
                    $this->path5 == 0
                ) {
                    $this->path5 = 100 - ($this->path1 + $this->path2 + $this->path3 + $this->path4);

                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 == 0 &&
                    $this->path2 != 0 &&
                    $this->path3 != 0 &&
                    $this->path4 != 0 &&
                    $this->path5 != 0
                ) {
                    $this->path1 = 100 - ($this->path5 + $this->path2 + $this->path3 + $this->path4);

                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 == 0 &&
                    $this->path3 != 0 &&
                    $this->path4 != 0 &&
                    $this->path5 != 0
                ) {
                    $this->path2 = 100 - ($this->path5 + $this->path1 + $this->path3 + $this->path4);

                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 != 0 &&
                    $this->path3 == 0 &&
                    $this->path4 != 0 &&
                    $this->path5 != 0
                ) {
                    $this->path3 = 100 - ($this->path5 + $this->path2 + $this->path1 + $this->path4);

                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 != 0 &&
                    $this->path3 != 0 &&
                    $this->path4 == 0 &&
                    $this->path5 != 0
                ) {
                    $this->path4 = 100 - ($this->path5 + $this->path2 + $this->path1 + $this->path3);

                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }

                if ($this->path1 != 0 &&
                    $this->path2 != 0 &&
                    $this->path3 != 0 &&
                    $this->path4 != 0 &&
                    $this->path5 != 0
                ) {
                    $this->path5 = 100 - ($this->path1 + $this->path2 + $this->path3 + $this->path4);

                    $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
                }


            }
            if ($pathSum > 100) {
                $this->path1 = $this->path2 =$this->path3 = $this->path4 = $this->path5 = 20;
                $this->pathCalc($this->path1, $this->path2,$this->path3,$this->path4, $this->path5);
            }

        }

        return [
            'success' => true,
            'result1' => $this->result1,
            'result2' => $this->result2,
            'result3' => $this->result3,
            'result4' => $this->result4,
            'result5' => $this->result5,

            'path1' => $this->path1,
            'path2' => $this->path2,
            'path3' => $this->path3,
            'path4' => $this->path4,
            'path5' => $this->path5,
        ];
    }

    private function calcPath($path)
    {
        $precision = 2;
        if ($path != 0) {
            return round($this->sum / 100 * $path, $precision);
        } else {
            return 0;
        }
    }

    private function pathCalc($p1, $p2, $p3, $p4, $p5)
    {
        return [
        $this->result1 = $this->calcPath($p1),
        $this->result2 = $this->calcPath($p2),
        $this->result3 = $this->calcPath($p3),
        $this->result4 = $this->calcPath($p4),
        $this->result5 = $this->calcPath($p5), ];

    }

}