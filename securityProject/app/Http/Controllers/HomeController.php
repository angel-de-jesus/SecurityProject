<?php

namespace App\Http\Controllers;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Home;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $gmap;
    protected $show;
    protected $user;
    protected $lat;
    public function __construct(GMaps $gmap)
    {
        $this->middleware('auth');
        $this->gmap = $gmap;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $coords = Home::all();              

        $config = array();
        $config['center'] = 'auto';
        //showMarkers;
        foreach ($coords as $coordinate) {
            $marker = array();
            $marker['position'] = $coordinate->lat.','.$coordinate->ing;
            $marker['title']=$coordinate->name;
            $coordinate->user;
            $marker['infowindow_content']=$coordinate->coment;
            $marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=SP|9999FF|000000';
            $marker['animation'] = 'DROP';
            $this->gmap->add_marker($marker);
        }
        //searchPlaces;
        $config['places'] = TRUE;
        $config['placesAutocompleteInputID'] = 'bsc';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
        $config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';
       
        $config['onclick'] = 'coordenadas(event.latLng.lat()), coordenadas2(event.latLng.lng())'; 
      
        $config['geocodeCaching'] = TRUE;
        $this->gmap->initialize($config);

        $map = $this->gmap->create_map();
        
        return view('home', ['map' => $map]);
        
        return view('Home.index',compact('coords')); 
    }
    public function index2()
    {
        $coords = Home::all();

        $config = array();
        $config['center'] = 'auto';
        //showMarkers;
        foreach ($coords as $coordinate) {
            $marker = array();
            $marker['position'] = $coordinate->lat.','.$coordinate->ing;
            $marker['title']=$coordinate->name;
            $coordinate->user;
            $marker['infowindow_content']=$coordinate->coment;
            $marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=SP|9999FF|000000';
            $marker['animation'] = 'DROP';
            $this->gmap->add_marker($marker);
        }
        //searchPlaces;
        $config['places'] = TRUE;
        $config['placesAutocompleteInputID'] = 'bsc';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
        $config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';
       
        $config['onclick'] = 'coordenadas(event.latLng.lat()), coordenadas2(event.latLng.lng())'; 
      
        $config['geocodeCaching'] = TRUE;
        $this->gmap->initialize($config);

        $map = $this->gmap->create_map();
        
        return view('admin', ['map' => $map]);
        
        return view('Home.index',compact('coords')); 
    }
     public function create()
    {
        return view('Home.create');
    }

 

    public function store(Request $request){
        $this->validate($request,[ 'lat'=>'required', 'ing'=>'required', 'coment'=>'required', 'name'=>'required']);
        $request['user']=Auth::user()->email;
        Home::create($request->all());
        if(Auth::user()->is_admin){
            return redirect()->route('admin')->with('success','Marcador agregado satisfactoriamente');
        }else {
            return redirect()->route('home.index')->with('success','Marcador agregado satisfactoriamente');
        }
    }



    public function show($id){
        $coords=Home::find($id);
        return  view('home.show',compact('coords'));
    }

    public function update(Request $request, $id)
    {
        $coord = Home::find($id);
        $coord->coment = $request->input('coment');
        $coord->name = $request->input('name');
        $coord->save();
        return redirect()->route('admin')->with('success','editado satisfactoriamente');
    }

    public function edit($id)
    {
        $coord=Home::find($id);
        return view('edit',compact('coord'));
    }

    public function destroy($id)
    {
         Home::find($id)->delete();
        return redirect()->route('admin')->with('success','Registro eliminado satisfactoriamente');
    }

    public function getCoords(){
        $coords=Home::all();
        return response()->json($coords);
    }

}
