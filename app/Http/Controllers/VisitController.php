<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Donnors;
use App\Models\DonnorVisits;
use Illuminate\Http\Request;

class VisitController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        return view('visits.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['donnors'] = Donnors::get();
        return view('visits.add_visit' , compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all() , [
            'donnor_visit' => 'required|date',
            'visit_donnors' => 'required'
        ]);

        if($validator->fails()){
            return $this->jsonErrorResponse($data, trans('validation.validate_fields' , [':attribute' => 123]), 422);
        }

    
        $donnor = Donnors::where('donnor_id' , $request->visit_donnors)->first();
        $donnor->last_blood_donation = date('Y-m-d' , strtotime($request->donnor_visit));
        $donnor->donnor_visits++;
        $donnor->save();
        // Add Record In Visits Table
        $donnor = new DonnorVisits();
        $donnor->donnor_id = $request->visit_donnors;
        $donnor->visit_note = $request->visit_note ?? '';
        $donnor->visit_date = date('Y-m-d' , strtotime($request->donnor_visit));
        $donnor->save();
        
        return $this->jsonSuccessResponse([] , 'Successfully Added Visits!' , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(isset($id)){
            $visit = DonnorVisits::where('id' , $id);
            if($visit->exists()){
                $data = [];
                $data['visit_id'] = $id;
                $data['current'] = Donnors::get();
                $data['visit'] = DonnorVisits::where('id', $id)->with('donnors')->get();
                return view('visits.edit_visit' , compact('data'));
            }
            abort('404');
        }
        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Return the Donnors List
     *
     * @return json
     */
    public function getList(Request $request){
        $list = DonnorVisits::select('donnor_visits.id','donnor_visits.visit_date','donnors.donnor_name')
        ->join('donnors' , 'donnors.donnor_id' , '=' , 'donnor_visits.donnor_id')
        ->orderBy('donnor_visits.created_at');

        if (isset($request['query']['generalSearch']) && !empty($request['query']['generalSearch'])) {
            $keyword = $request['query']['generalSearch'];
            $list->where(function($query) use ($keyword){
                $query->orWhere('donnors.donnor_name' ,'LIKE', '%'.$keyword.'%');
            });           
        } 

        $list = $list->get();
        foreach ($list as $detail) {
            $detail->visit_ago = $this->timeAgo(strtotime($detail->visit_date));
        }
        return response()->json($list);
    }
}
