<?php


namespace App\Http\Controllers;


use App\Models\NadeBank;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class NadeBankController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //takes to index view
    public function index(){
        $model = new NadeBank();
        $maps = $model->getMaps();
        return view('index', compact('maps'));
    }

    public function nades($slug){
        $model = new NadeBank();
        $nades = $model->getNades();
        $map = $model->getMap($slug);
        return view('nades', compact('nades'), compact('map'));
    }

    public function location($slug, $slug2){
        $model = new NadeBank();
        $locations = $model->getLocations($slug, $slug2);
        return view('location', compact('locations'));
    }

    public function video($slug, $slug2, $slug3){
        $model = new NadeBank();
        $videos = $model->getVideos($slug, $slug2, $slug3);
        return view('video', compact('videos'));
    }

    public function add(){
        $model = new NadeBank();
        $locations = $model->getAllLocations();
        return view('add', compact('locations'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'video_name' => 'required',
            'video_description'=>'nullable',
            'embed_link' => 'required',
            'situation' => 'nullable',
            'enemy_actions' => 'nullable',
            'location_id' => 'required'
        ]);
        $model = new NadeBank();
        $validated['video_url'] = strtolower(preg_replace('/[^A-Z0-9]+/i', '-', $validated['video_name']));
        $model->fill($validated);
        $model->save();
        redirect('/add');
    }

    public function edit(){
        $model = new NadeBank();
        $locations = $model->getAllLocations();
        return view('update', compact('locations'));
    }

    public function update(Request $request){
        $id = $request->id;
        $model = new NadeBank();
        $post = $model->getVideoByID($id);
        $validated = $request->validate([
            'video_name' => 'required',
            'video_description'=>'nullable',
            'embed_link' => 'required',
            'situation' => 'nullable',
            'enemy_actions' => 'nullable',
            'location_id' => 'required'
        ]);
        $validated['video_url'] = strtolower(preg_replace('/[^A-Z0-9]+/i', '-', $validated['video_name']));
        $post[0]->fill($validated);
        $post[0]->update();
        redirect('/update');
    }

    public function delete(Request $request){
        $id = $request->id;
        $model = new NadeBank();
        $post = $model->getVideoByID($id);
        $post[0]->delete();
        redirect('/update');
    }

    public function dropdownPop($location_id){
        $model = new NadeBank();
        $data['data'] = $model->getVideoByLocation($location_id);
        return response()->json($data);
    }

    public function textAreaPop($video_id){
        $model = new NadeBank();
        $data['data'] = $model->getVideoByID($video_id);
        return response()->json($data);
    }
}
