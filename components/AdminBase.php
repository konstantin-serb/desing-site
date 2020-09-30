<?php


namespace app\components;

use app\models\Employee;
use Yii;
use app\models\Clients;

abstract class AdminBase
{
    const ADMIN = 1;
    const CUSTOMER = 9;
    const EMPLOYEE = 8;


    public static function isAdmin()
    {
        $user = Yii::$app->user->identity;
        if (!empty($user)) {
            if ($user->admin_status == self::ADMIN) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }


    public static function isCustomer()
    {
        $user = Yii::$app->user->identity;

        if (!empty($user)) {
            if ($user->status == self::CUSTOMER) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public static function getCustomerId()
    {
        $user = Yii::$app->user->identity;
        if ($user) {
            $customer = Clients::find()->where(['user_id' => $user->id])->one();
            $customerId = $customer->id;
        } else {
            $customerId = null;
        }
        return $customerId;
    }


    public static function isEmployee()
    {
        $user = Yii::$app->user->identity;

        if (!empty($user)) {
            if ($user->status == self::EMPLOYEE) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public static function getEmployeeId()
    {
        $user = Yii::$app->user->identity;
        if ($user) {
            $employee = Employee::find()->where(['user_id' => $user->id])->one();
            $employeeId = $employee->id;
        } else {
            $employeeId = null;
        }
        return $employeeId;
    }

}