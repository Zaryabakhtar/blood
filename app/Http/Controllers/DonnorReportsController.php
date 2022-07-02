<?php

namespace App\Http\Controllers;

use App\Models\Donnors;
use Illuminate\Http\Request;
use App\Models\TblBloodGroups;

class DonnorReportsController extends Controller
{
    public function index(Request $request){
        $data['searchName'] = $request->query('searchName') ?? '';
        $data['searchPhoneNo'] = $request->query('searchPhoneNo') ?? '';
        $data['searchBloodGroup'] = $request->query('searchBloodGroup') ?? '';
        $data['searchGender'] = $request->query('searchGender') ?? '';
        $data['searchStartDate'] = $request->query('searchStartDate') ?? '';
        $data['searchEndDate'] = $request->query('searchEndDate') ?? '';
        $data['searchAddress'] = $request->query('searchAddress') ?? '';

        $data['blood_group'] = TblBloodGroups::get();

        $list = Donnors::select('donnors.*','blood_groups.blood_group_code')
        ->join('blood_groups' , 'blood_groups.blood_group_id' , '=', 'donnors.blood_group_id')
        ->orderBy('created_at');

        if(!empty($data['searchName'])){
            $list->where('donnors.donnor_name' , 'LIKE' , '%'.$data['searchName'].'%');
        }
        if(!empty($data['searchPhoneNo'])){
            $list->where('donnors.donnor_phone' , 'LIKE' , '%'.$data['searchPhoneNo'].'%');
        }
        if(!empty($data['searchBloodGroup'])){
            $list->where('donnors.blood_group_id', $data['searchBloodGroup']);
        }
        if(!empty($data['searchGender'])){
            $list->where('donnors.donnor_gender', $data['searchGender']);
        }
        if(!empty($data['searchStartDate']) && !empty($data['searchEndDate'])){
            $list->whereBetween('donnors.last_blood_donation', [$data['searchStartDate'],$data['searchEndDate']]);
        }
        if(!empty($data['searchAddress'])){
            $list->where('donnors.donnor_address', 'LIKE' , '%'. $data['searchAddress'].'%');
        }

        $data['current'] = $list->get();
        foreach ($data['current'] as $detail) {
            $detail->visit_ago = $this->timeAgo(strtotime($detail->created_at));
        }
        
        return view('reports.donnor_report' , compact('data'));
    }
}