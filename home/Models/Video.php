<?php
/**
 * Created by PhpStorm.
 * User: darkb
 * Date: 5/23/2018
 * Time: 4:15 PM
 */

namespace APPLICATION_HOME\Models;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class Video extends GeneratorModel
{
    protected $fillable = [
        'title',
        'desc',
        'videoId'

    ];
    protected $guarded = [
        'image'
    ];

    public static $relations_list = [];
    public static $image_field = 'image';
    public static $files = [
        'image'
    ];
    public static $rus_title = 'Список видео';
    public static $need_gallery = 0;
    public static $custom_templates = [
        'right' => [
            'video_votes'
        ]
    ];

    protected $appends = ['views'];
    public static function formBuilder(){
        $params = [
            'title' => [
                'required' => true,
                'rus_title' => 'Название',
                'type' => 'text',
                'column' => 'left'
            ],
            'desc' => [
                'required' => true,
                'rus_title' => 'Краткое описание',
                'type' => 'textarea',
                'column' => 'left'
            ],
            'videoId' => [
                'required' => true,
                'rus_title' => 'ID видео',
                'type' => 'text',
                'column' => 'left'
            ],
            'image' => [
                'required' => false,
                'rus_title' => 'Изображение для шэринга',
                'type' => 'image',
                'column' => 'left'
            ]
        ];
        return (new Collection($params))->map(function ($item, $key) {
            return (object)$item;
        });
    }

    public function voices(){
        return $this->hasMany('APPLICATION_HOME\Models\Vote');
    }

    public function getViewsAttribute(){
        if(!Cache::has($this->id.'_views')){
            Cache::put($this->id.'_views', $this->videoViews(), 10);
        }
        return Cache::get($this->id.'_views');
    }

    public function videoViews(){
        $youtube_view_count = self::youtubeStats($this->videoId);
        try{
            return $youtube_view_count->items[0]->statistics->viewCount;
        }catch (\Exception $e){
            return 0;
        }

    }

    public static function getViewsById($id){
        if(!Cache::has($id.'_views')){
            $youtube_view_count = self::youtubeStats($id);
            try{
                Cache::put($id.'_views', $youtube_view_count->items[0]->statistics->viewCount, 10);
            } catch (\Exception $e){
                Cache::put($id.'_views', 0, 10);
            }
        }
        return Cache::get($id.'_views');

    }

    public static function youtubeStats($video){
        return json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics&id='.$video.'&key=AIzaSyCMSA_wtb9uHhaQGqUwOdc-P1JU7opdVlQ'));
    }
}