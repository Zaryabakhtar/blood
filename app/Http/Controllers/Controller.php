<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function jsonSuccessResponse( $data, $message, $statusCode = 200 )
    {
        return response()->json(['status'=>'success', 'data'=>$data, 'message'=>$message], $statusCode);
    }

    protected function jsonErrorResponse( $data, $message,  $statusCode = 200)
    {
        return response()->json(['status'=>'error', 'data'=>$data, 'message'=>$message], $statusCode);
    }

    public static function getSqlWithBindings($query)
    {
        return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());
    }

    public static function timeAgo($timestamp){
        
        //$time_now = mktime(date('h')+0,date('i')+30,date('s'));
        $datetime1=new DateTime("now");
        $datetime2=date_create("@$timestamp");

        $diff=date_diff($datetime1, $datetime2);
        $timemsg='';
        if($diff->y > 0){
            $timemsg = $diff->y .' '. ($diff->y > 1?'Years':'Year');
        }
        else if($diff->m > 0){
            $timemsg = $diff->m .' '. ($diff->m > 1?'Months':'Month');
        }
        else if($diff->d > 0){
            $timemsg = $diff->d .' '. ($diff->d > 1?'Days':'Day');
        }
        else if($diff->h > 0){
            $timemsg = $diff->h .' '. ($diff->h > 1 ? 'Hours':'Hour');
        }
        else if($diff->i > 0){
            $timemsg = $diff->i .' '. ($diff->i > 1?'Minutes':'Minute');
        }
        else if($diff->s > 0){
            $timemsg = $diff->s .' '. ($diff->s > 1?'Seconds':'Seconds');
        }
        if($timemsg == ""){
            $timemsg = 'Just Now';
        }
        else{
            if($timestamp > time()){
                $timemsg = $timemsg.' Afterward';
            }else{
                $timemsg = $timemsg.' Ago';
            }
        }
    
        return $timemsg;
    }

}
