<?php

namespace App\Http\Controllers;

use Validator;
use App\Library\Utilities;
use App\Models\Donnors;
use App\Models\TblBloodGroups;
use Exception;
use Illuminate\Http\Request;


class DonnorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        return view('donnors.list' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = [];
        $data['bloodGroups'] = TblBloodGroups::get();
        $data['barcode'] = Utilities::uuid();
        return view('donnors.add' , compact('data'));
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
            'donnor_name' => 'required',
            'donnor_email' => 'required',
            'donnor_dob' => 'required|date',
            'donnor_gender' => 'required',
            'donnor_phone' => 'required',
            'donnor_address' => 'required',
            'donnor_blood_group' => 'required',
            'donnor_age' => 'required|integer',
            'last_donation' => 'required|date',
        ]);

        if($validator->fails()){
            return $this->jsonErrorResponse($data, trans('validation.validate_fields' , [':attribute' => 123]), 422);
        }
        
        try {
            $id = Utilities::uuid();

            if (!file_exists(public_path('/uploads/donnors-profile/'))) {
                mkdir(public_path('/uploads/donnors-profile/'), 0777, true);
            }

            if($request->hasFile('donnor_avatar')){
                $imageName = time().'.'.$request->donnor_avatar->extension();  
                $request->donnor_avatar->move(public_path('/uploads/donnors-profile/'), $imageName);
                $profile = $imageName;
            }else{
                $profile = 'default.jpg';
            }

            $donnor = new Donnors();
            $donnor->donnor_id = $id;
            $donnor->sr_no = Donnors::max('sr_no') + 1;
            $donnor->donnor_picture = $profile;
            $donnor->donnor_name = $request->donnor_name;
            $donnor->donnor_email = $request->donnor_email ?? '';
            $donnor->donnor_address = $request->donnor_address;
            $donnor->last_blood_donation = date('Y-m-d' , strtotime($request->last_donation));
            $donnor->donnor_phone  = $request->donnor_phone;
            $donnor->donnor_visits = 1;
            $donnor->donnor_gender  = $request->donnor_gender;
            $donnor->donnor_dob  = date('Y-m-d' , strtotime($request->donnor_dob));
            $donnor->donnor_age  = $request->donnor_age;
            $donnor->donnor_barcode  = $id;
            $donnor->blood_group_id  = $request->donnor_blood_group;
            $donnor->hospital_id  = 1;
            $donnor->save();

            return $this->jsonSuccessResponse([] , 'Donor Added Successfully!');
        } catch (Exception $e) {
            return $this->jsonSuccessResponse([] , $e->getMessage() , 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donnors  $donnors
     * @return \Illuminate\Http\Response
     */
    public function show(Donnors $donnors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donnors  $donnors
     * @return \Illuminate\Http\Response
     */
    public function edit(Donnors $donnors , $id = null)
    {
        $data = [];
        if(isset($id)){
            if($donnors->where('donnor_id' , $id)->exists()){
                $data['bloodGroups'] = TblBloodGroups::get();
                $data['barcode'] = Utilities::uuid();
                $data['donnor'] = $donnors->where('donnor_id' , $id)->first();               
                return view('donnors.edit' , compact('data'));
            }   
        }
        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donnors  $donnors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donnors $donnors , $id = null)
    {
        $data = [];
        if(!isset($id)){
            abort('404');
        }

        $validator = Validator::make($request->all() , [
            'donnor_name' => 'required',
            'donnor_email' => 'required',
            'donnor_dob' => 'required|date',
            'donnor_gender' => 'required',
            'donnor_phone' => 'required',
            'donnor_address' => 'required',
            'donnor_blood_group' => 'required',
            'donnor_age' => 'required|integer',
            'last_donation' => 'required|date',
        ]);

        if($validator->fails()){
            return $this->jsonErrorResponse($data, trans('validation.validate_fields' , [':attribute' => 123]), 422);
        }
        
        try {
            $id = Utilities::uuid();

            if (!file_exists(public_path('/uploads/donnors-profile/'))) {
                mkdir(public_path('/uploads/donnors-profile/'), 0777, true);
            }

            if($request->hasFile('donnor_avatar')){
                $imageName = time().'.'.$request->donnor_avatar->extension();  
                $request->donnor_avatar->move(public_path('/uploads/donnors-profile/'), $imageName);
                $profile = $imageName;
            }else{
                $profile = 'default.jpg';
            }

            $donnor = $donnors::where('donnor_id' , $id)->toSql();
            $donnor->donnor_picture = $profile;
            $donnor->donnor_name = $request->donnor_name;
            $donnor->donnor_email = $request->donnor_email ?? '';
            $donnor->donnor_address = $request->donnor_address;
            $donnor->last_blood_donation = date('Y-m-d' , strtotime($request->last_donation));
            $donnor->donnor_phone  = $request->donnor_phone;
            $donnor->donnor_gender  = $request->donnor_gender;
            $donnor->donnor_dob  = date('Y-m-d' , strtotime($request->donnor_dob));
            $donnor->donnor_age  = $request->donnor_age;
            $donnor->blood_group_id  = $request->donnor_blood_group;
            $donnor->hospital_id  = 1;
            $donnor->save();

            return $this->jsonSuccessResponse([] , 'Donor Added Successfully!');
        } catch (Exception $e) {
            return $this->jsonSuccessResponse([] , $e->getMessage() , 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donnors  $donnors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donnors $donnors)
    {
        //
    }

    /**
     * Return the Donnors List
     *
     * @return void
     */
    public function getList(){
        $list = Donnors::orderBy('donnor_id')->get();

        return response()->json($list);
    }
}
