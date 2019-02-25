<?php
/**
 * Created by PhpStorm.
 * User: darkb
 * Date: 5/23/2018
 * Time: 6:50 PM
 */

namespace APPLICATION_HOME\Http\Controllers;

use APPLICATION_HOME\Models\GeneratorModel;
use Illuminate\Http\Request;
use STALKER_CMS\Core\Galleries\Models\Gallery;

class AdminGenerator extends Controller
{
    public static $types = [
       'Video'
    ];

    public function __construct()
    {
        \PermissionsController::allowPermission('application', 'application');
    }

    public static function actions(){
        $actions = [];
        /** @var GeneratorModel $class */
        foreach (self::$types as $type){
            $class = "APPLICATION_HOME\\Models\\$type";
            if($class::$need_menu){
                $actions[$type] = [
                    'title' => ['ru' => $class::$rus_title],
                    'enabled' => false,
                    'icon' => 'zmdi zmdi-circle-o'
                ];
            }
        }
        return $actions;
    }

    public static function menu(){
        $menu = [];
        /** @var GeneratorModel $class */
        foreach (self::$types as $type){
            $class = "APPLICATION_HOME\\Models\\$type";
            if($class::$need_menu){
                $menu[$type] = [
                    'title' => ['ru' => $class::$rus_title],
                    'route' => 'admin.generator.index',
                    'route_params' =>  $type,
                    'icon' => 'zmdi zmdi-collection-text'
                ];
            }
        }
        return $menu;
    }

    public function index(Request $request, $type){
        /** @var GeneratorModel $class */
        $class = "APPLICATION_HOME\\Models\\$type";
        $items = $class::query();
        if($class::$multi_language) $items = $items->whereLocale(\App::getLocale());
        if($request->has('search')){
            $items = $items->where('title', 'like', '%'.$request->get('search').'%');
        }
        $items = $items
            ->orderBy($request->get('sort_field', 'created_at'), $request->get('sort_direction', 'desc'))
            ->paginate(15)
        ;
        return view('admin.generator.index', compact('class', 'items', 'type'));
    }

    public function related_index(Request $request,$parent_type, $parent_id, $type){
        /** @var GeneratorModel $class */
        $class = "APPLICATION_HOME\\Models\\$type";
        $parent = "APPLICATION_HOME\\Models\\$parent_type";
        $parent = $parent::whereId($parent_id)->first();
        $items = $parent->{mb_strtolower($type)."s"}();
        if($request->has('search')){
            $items = $items->where('title', 'like', '%'.$request->get('search').'%');
        }
        $items = $items
            //->orderBy($request->get('sort_field', 'created_at'), $request->get('sort_direction', 'desc'))
            ->paginate(15)
        ;
        return view('admin.generator.index', compact('class', 'items', 'type', 'parent_type', 'parent_id'));
    }


    public function create($type){
        /** @var GeneratorModel $class */
        $class = "APPLICATION_HOME\\Models\\$type";
        $fields = $class::formBuilder();
        return view('admin.generator.create', compact('type', 'class', 'fields'));
    }

    public function related_create($parent_type, $parent_id, $type){
        /** @var GeneratorModel $class */
        $class = "APPLICATION_HOME\\Models\\$type";
        $fields = $class::formBuilder();
        return view('admin.generator.create', compact('type', 'class', 'fields', 'parent_type', 'parent_id'));
    }

    public function store(Request $request, $type){
        /** @var GeneratorModel $class */
        $class = "APPLICATION_HOME\\Models\\$type";
        $fields = $class::formBuilder();
        /** @var GeneratorModel $item */
        $item = new $class();
        $item->beforeCreate($request);
        $item->fill($request->all());
        if($class::$multi_language) $item->locale = \App::getLocale();
        foreach ($class::$files as $file){
            $item->$file = $this->uploadImage($request, $file);
        }
        if($class::$need_gallery){
            $gallery = new Gallery();
            $gallery->title = $item->title;
            $gallery->locale = \App::getLocale();
            $gallery->save();
            $item->gallery_id = $gallery->id;
        }
        $item->save();
        $item->afterCreate($request);
        if(!empty($class::$relations_list)){
            foreach ($class::$relations_list as $relation){
                $item->$relation()->sync($request->get($relation, []));
            }
        }
        return \ResponseController::success(200)->redirect(route('admin.generator.edit', [$type, $item->id]))->json();
    }

    public function edit($type, $id){
        /** @var GeneratorModel $class */
        $class = "APPLICATION_HOME\\Models\\$type";
        $fields = $class::formBuilder();
        /** @var GeneratorModel $item */
        $item = $class::find($id);
        return view('admin.generator.edit', compact('type', 'class', 'fields', 'item'));

    }

    public function update(Request $request, $type, $id){
        /** @var GeneratorModel $class */
        $class = "APPLICATION_HOME\\Models\\$type";
        $fields = $class::formBuilder();
        /** @var GeneratorModel $item */
        $item = $class::find($id);
        $item->beforeUpdate($request);
        $item->fill($request->all());
        foreach ($class::$files as $file){
            $item->$file = $this->uploadImage($request, $file, $item);
        }
        $item->save();
        $item->afterUpdate($request);
        if(!empty($class::$relations_list)){
            foreach ($class::$relations_list as $relation){
                $item->{$relation}()->sync($request->get($relation, []));
            }
        }
        return \ResponseController::success(200)->redirect(route('admin.generator.edit', [$type, $item->id]))->json();
    }

    public function delete($type, $id){
        /** @var GeneratorModel $class */
        $class = "APPLICATION_HOME\\Models\\$type";
        /** @var GeneratorModel $item */
        $item = $class::whereId($id)->first();
        if(!empty($item)){
            if(\Storage::exists($item->{$class::$image_field})){
                \Storage::delete($item->{$class::$image_field});
            }
            $item->delete();
        }
        return \ResponseController::success(1203)->redirect(route('admin.generator.index', $type))->json();
    }


    private function uploadImage(Request $request, $field, $item = NULL) {
        $image = null;
        if($request->get($field.'_delete') == 1) {
            if (!empty($item) and !empty($item->$field) and \Storage::exists($item->$field)) {
                \Storage::delete($item->$field);
            }
        } elseif (!empty($item) and !empty($item->$field) and \Storage::exists($item->$field)) {
            $image = $item->$field;
        }
        if($request->hasFile($field)){
            $fileName = time()."_".rand(1000, 1999).'.'.$request->file($field)->getClientOriginalExtension();
            $mainPhotoPath = 'content/'.$field;
            $request->file($field)->move('uploads/'.$mainPhotoPath, $fileName);
            if(!empty($item) and !empty($item->$field) and \Storage::exists($item->$field)){
                \Storage::delete($item->$field);
            }
            $image = add_first_slash($mainPhotoPath.'/'.$fileName);
        }
        return $image;
    }


}