<?php
namespace App\Http\Controllers;
use App\Sample_data;
use Illuminate\Http\Request;
use DataTables;
use Validator; 
use App\staffdetail;
use App\attendance_report;

class SampleController extends Controller
{
    public function index(Request $request)
    {  
        if($request->ajax())
        {  
            $data =staffdetail::where('deleted', 1)->where('site_name',$request->site)->select('id','employee_no','employee_name','designation')->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="in" id="'.$data->employee_no.'" class="in btn btn-success btn-sm">IN</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="breakout" id="'.$data->employee_no.'" class="breakout btn btn-primary btn-sm">Break Out</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="breakin" id="'.$data->employee_no.'" class="breakin btn btn-primary btn-sm">Break In</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="out" id="'.$data->employee_no.'" class="out btn btn-danger btn-sm">OUT</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('ase');
    }
    public function in($id)
    {
        if(request()->ajax())
        {              
            $users = attendance_report::where('employee_no',$id)->whereDate('created_at', '=', date('Y-m-d'))->get();
            if(isset($users[0]->employee_no)){
                $successmessage ='Allready added';
                return response()->json(['result' => $successmessage]);
            }
            else{
                date_default_timezone_set('Asia/Kolkata');
                $attendance = new attendance_report;
                $attendance->employee_no=$id; 
                $attendance->intime=date("H:i:s");
                if($attendance->save()){
                    $successmessage ='welcome';
                    return response()->json(['result' => $successmessage]);
                }
            }
        }
    }
    public function breakout($id)
    {
        if(request()->ajax())
        {              
            $users = attendance_report::where('employee_no',$id)->whereDate('created_at', '=', date('Y-m-d'))->first();
            if(isset($users->employee_no) && isset($users->breakstart) &&  $users->breakstart >0){
                $successmessage ='Allready added';
                return response()->json(['result' => $successmessage]);                
            }elseif (isset($users->employee_no)) {
               
                 $users->breakstart=date("H:i:s");
                $users->save();
                $successmessage ='breakstart';
                return response()->json(['result' => $successmessage]);
            }
            else{
                $successmessage ='welcome';
                    return response()->json(['result' => $successmessage]);
            }
        }
    }
    public function breakin($id)
    {
        if(request()->ajax())
        {              
            $users = attendance_report::where('employee_no',$id)->whereDate('created_at', '=', date('Y-m-d'))->first();
            if(isset($users->employee_no) && isset($users->breakend) &&  $users->breakend >0){
                $successmessage ='Allready added';
                return response()->json(['result' => $successmessage]);                
            }elseif (isset($users->employee_no)) {
                $users->breakend=date("H:i:s");
                $users->save();
                $successmessage ='breakend';
                return response()->json(['result' => $successmessage]);
            }
            else{
                $successmessage ='welcome';
                    return response()->json(['result' => $successmessage]);
            }
        }
    }
    public function out($id)
    {
        if(request()->ajax())
        {              
            $users = attendance_report::where('employee_no',$id)->whereDate('created_at', '=', date('Y-m-d'))->first();
            if(isset($users->employee_no)){
                  $users->outtime=date("H:i:s");
                $users->save();
                $successmessage ='breakend';
                return response()->json(['result' => $successmessage]);            
            }else{
               date_default_timezone_set('Asia/Kolkata');
                $attendance = new attendance_report;
                $attendance->employee_no=$id; 
                $attendance->intime=date("H:i:s");
                 $attendance->outtime=date("H:i:s");
                if($attendance->save()){
                    $successmessage ='welcome';
                    return response()->json(['result' => $successmessage]);
                }
            }
        }
    }
}
