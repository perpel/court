<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Common extends Model{

    public static function years( $start_date, $end_date ){

        $startDate =  intval( $start_date );
        $endDate = intval( $end_date );
        $dateArr = [];
        while( $startDate >=  $endDate ){
            $dateArr[ $startDate ] = $startDate;
            $startDate--;
        }
        return $dateArr;
    }

     public static function selectedMode(){
        return [
            ""=>"选择方式",
            "随机"=>"随机",
            "指定"=>"指定",
            "招标"=>"招标",
        ];
    }

    

}