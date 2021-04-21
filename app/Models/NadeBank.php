<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NadeBank extends Model
{
    protected $table = 'videos';
    protected $fillable = ['video_name', 'video_description', 'embed_link', 'situation', 'enemy_actions', 'video_url', 'location_id'];

    public function getMaps(){
        return DB::table('maps')->get();
    }

    public function getMap($slug){
        return DB::table('maps')->where('url', $slug)->first();
    }

    public function getNades(){
        return DB::table('nades')->get();
    }

    public function getNade($slug){
        return DB::table('nades')->where('nade_url', $slug)->first();
    }

    public function getLocations($slug, $slug2){
        return DB::table('locations')
            ->join('maps', 'locations.map_id','=', 'maps.map_id')
            ->join('nades', 'locations.nade_id', '=', 'nades.nade_id')
            ->where([['maps.url', $slug],['nades.nade_url', $slug2]])->get();
    }

    public function getAllLocations(){
        return DB::table('locations')
            ->join('maps', 'locations.map_id','=', 'maps.map_id')->get();
    }

    public function getVideos($slug, $slug2, $slug3){
        return DB::table('videos')
            ->join('locations', 'videos.location_id', '=', 'locations.location_id')
            ->join('maps', 'locations.map_id', '=', 'maps.map_id')
            ->join('nades', 'locations.nade_id', '=', 'nades.nade_id')
            ->where([['location_url', $slug3], ['url', $slug], ['nade_url', $slug2]])->get();
    }

    public function getVideoByID($id){
        return DB::table('videos')->where('video_id', $id)->get();
    }

    public function getVideoByLocation($location_id){
        return DB::table('videos')->where('location_id', $location_id)->get();
    }
}




