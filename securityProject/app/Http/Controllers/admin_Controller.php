<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use FarhanWazir\GoogleMaps\GMaps;
use App\Http\Requests;
use App\Home;
use App\User;
use Auth;



class admin_Controller extends Controller
{
    protected $gmap;
    protected $user;
    protected $lat;
    public function __construct(GMaps $gmap)
    {
        $this->middleware('auth');
        $this->gmap = $gmap;
    }
    public function index()
    {
        $coords = Home::all();              

        $config = array();
        $config['center'] = '16.625240416029357,-93.09953677744954';
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
        $config['placesAutocompleteInputID'] = 'myPlaceTextBox';
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
        return view('Admin.create');
    }



    public function store(Request $request){
        $this->validate($request,[ 'lat'=>'required', 'ing'=>'required', 'coment'=>'required', 'name'=>'required']);
        $request['user']=Auth::user()->email;
        Home::create($request->all());
        return redirect()->route('admin.index')->with('success','Marcador agregado satisfactoriamente');
    }

  
    public function show($id){
        $coords=Home::find($id);
        return  view('admin.show',compact('coords'));
    }

    
    public function update(Request $request, $id)
    {
        $coord = Home::find($id);
        $coord->coment = $request->input('coment');
        $coord->name = $request->input('name');
        $coord->save();
        return redirect()->route('admin.index')->with('success','editado satisfactoriamente');
    }

    public function edit($id)
    {
        $coord=Home::find($id);
        return view('edit',compact('coord'));
    }

    public function destroy($id)
    {
         Home::find($id)->delete();
        return redirect()->route('admin.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function getCoords(){
        $coords=Home::all();
        return response()->json($coords);
    }

}
