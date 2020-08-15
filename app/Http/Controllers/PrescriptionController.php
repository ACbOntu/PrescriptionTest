<?php

namespace App\Http\Controllers;

use App\Prescription;
use Auth;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{

    public function index(Request $request)
    {
      $prescription = array();
     // Filter data according to range
      if(request()->get('from_date') && request()->get('to_date')) {
        $start = $request->from_date;
        $end = $request->to_date;
        $prescription = Prescription::whereBetween('date',[$start,$end])->get();
          }
        elseif(request()->get('all')){   /////All prescriptions data
          $prescription = Prescription::all()->get();
        }
        else{                            /////// Prescriptions of current month
          $currentDate = \Carbon\Carbon::now()->format('m');
          $prescription = Prescription::whereMonth('date',$currentDate)->get();
        }
          return view('home')->with('prescriptions',$prescription);
    }

///// Showing add page
    public function add()
    {
        return view('add');
    }
/////////All data
    public function all()
    {
      $prescription = Prescription::all();
      return view('home')->with('prescriptions',$prescription);
    }
    ///// Saving a new prescription to database
    public function store(Request $request)
    {

        $this->validate($request, [
          'date'  => 'required',
          'name'  => 'required',
          'age'  => 'required',
          'gender'  => 'required',
          'diagnosis'  => 'required',
          'medicines'  => 'required',
        ]);

        $prescription = new Prescription;
        $prescription->date = $request->date;
        $prescription->patient_name = $request->name;
        $prescription->patient_age = $request->age;
        $prescription->gender = $request->gender;
        $prescription->diagnosis = $request->diagnosis;
        $prescription->medicines = $request->medicines;
        $prescription->user_id = Auth::user()->id;
        $prescription->next_visit = $request->nextVisit;
        $prescription->save();
        return redirect()->route('home');
    }
////// Updating the given prescriptionn information
    public function update(Request $request,$id)
    {
        $this->validate($request,[
          'date'  => 'required',
          'name'  => 'required',
          'age'  => 'required',
          'gender'  => 'required',
          'diagnosis'  => 'required',
          'medicines'  => 'required',
        ]);
        $prescription = Prescription::find($id);
        $prescription->date = $request->date;
        $prescription->patient_name = $request->name;
        $prescription->patient_age = $request->age;
        $prescription->gender = $request->gender;
        $prescription->diagnosis = $request->diagnosis;
        $prescription->medicines = $request->medicines;
        $prescription->user_id = Auth::user()->id;
        $prescription->next_visit = $request->nextVisit;
        $prescription->save();
        return redirect()->route('home');
    }
    ////// Delete Prescription
      public function delete($id)
      {
        $prescription = Prescription::find($id);
        $prescription->delete();
        return redirect()->route('home');
      }

///// Report data
    public function report(Request $request)
    {
      $prescription = array();
      if(request()->get('date') ) {
        $date = $request->date;
        $prescription = Prescription::where('date',$date)->get();
          }
        return view('report')->with('prescriptions',$prescription);
    }
///// find the prescription which need to be edited
    public function edit($id)
    {

        $prescription = Prescription::where('id',$id)->first();

        return view('edit')->with('prescription',$prescription);
    }
////// JSON prescription list
    public function getAllPrescription()
    {
        $prescription = Prescription::all();
        return response()->json($prescription);
    }
////// Data from given API
    public function getDataFromApi()
    {
      $client = new \GuzzleHttp\Client();
      $response =  $client->request('GET', 'https://rxnav.nlm.nih.gov/REST/interaction/interaction.json?rxcui=341248');
      $response = (string) $response->getBody()->getContents();
      $response = json_decode($response);
      return view('apiData')->with('response',$response);
    }

}
