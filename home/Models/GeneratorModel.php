<?php
/**
 * Created by PhpStorm.
 * User: darkb
 * Date: 5/25/2018
 * Time: 3:34 PM
 */

namespace APPLICATION_HOME\Models;


use Carbon\Carbon;
use Illuminate\Http\Request;
use STALKER_CMS\Vendor\Models\BaseModel;

class GeneratorModel extends BaseModel
{
    public static $relations_list = [];
    public static $image_field = '';
    public static $rus_title = '';
    public static $need_gallery = 0;
    public static $need_menu = 1;
    public static $multi_language = 0;
    public static $sortable = 0;
    public static $files = [];
    public static $custom_templates = [];
    public static $can_create = 1;
    public static $can_delete = 1;
    public static $short_month = [
        1 => "янв",
        2 => "фев",
        3 => "мар",
        4 => "апр",
        5 => "май",
        6 => "июн",
        7 => "июл",
        8 => "авг",
        9 => "сен",
        10 => "окт",
        11 => "ноя",
        12 => "дек"
    ];
    public static $full_month = [
        1 => "января",
        2 => "февраля",
        3 => "марта",
        4 => "апреля",
        5 => "мая",
        6 => "июня",
        7 => "июля",
        8 => "августа",
        9 => "сентября",
        10 => "октября",
        11 => "ноября",
        12 => "декабря"
    ];

    protected function setDates(Request $request){
        foreach ($this->dates as $date){
            if($request->has($date)){
                try{
                    $date_val = Carbon::createFromFormat('d.m.Y H:i', $request->get($date));
                } catch (\Exception $e){
                    try{
                        $date_val = Carbon::createFromFormat('d.m.Y', $request->get($date));
                    } catch (\Exception $e){
                        $date_val = null;
                    }
                }
            } else {
                $date_val = null;
            }
            $this->attributes[$date] = $date_val;
        }
        return $this;
    }

    public function title_field(){
        return $this->title;
    }

    public static function formBuilder(){

    }
    public static function humanDate(Carbon $date, $short = 1){
        $list = $short? self::$short_month : self::$full_month;
        return $date->format('d').' '.$list[intval($date->format('m'))].' '.$date->format('Y');
    }

    public function beforeCreate(Request $request){
        $this->setDates($request);
    }

    public function beforeUpdate(Request $request){
        $this->setDates($request);
    }

    public function afterCreate(Request $request){

    }

    public function afterUpdate(Request $request){

    }
}