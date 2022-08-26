<?php

namespace App\Http\Controllers;

use App\Mail\mailNew;
use App\Models\answer;
use App\Models\Exam;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ExamController extends Controller
{
    public function index($id){
//        dd($id);
        $r=Exam::where('test_id',$id)->get();
        if (count($r)!=0){
            $check=answer::where('user',Auth::id())->where('test',$id)->get();

            if (count(\App\Models\answer::where('user',\Illuminate\Support\Facades\Auth::id())->where('test',$id)->get())!=0){
                $ture=count(json_decode(\App\Models\answer::where('user',\Illuminate\Support\Facades\Auth::id())->where('test',$id)->first('ture')['ture']));
                $false=count(json_decode(\App\Models\answer::where('user',\Illuminate\Support\Facades\Auth::id())->where('test',$id)->first('false')['false']));
                $dont=count(json_decode(\App\Models\answer::where('user',\Illuminate\Support\Facades\Auth::id())->where('test',$id)->first('dont')['dont']));
                $all=\App\Models\Test::where('id',$id)->first('exam')['exam'];
                $status=\App\Models\answer::where('user',\Illuminate\Support\Facades\Auth::id())->where('test',$id)->first('status')['status'];
                return   view('exam.exam',['exam'=>$r,'id'=>$id,'ture'=>$ture,'false'=>$false,'dont'=>$dont,'all'=>$all,'status'=>$status,'check'=>$check]);

            }
            return   view('exam.exam',['exam'=>$r,'id'=>$id,'check'=>$check]);

        }else{
            return   view('exam.exam',['exam'=>$r,'id'=>$id]);

        }
    }
    public function store($id){
        $ture=[];
        $false=[];
        $dont=[];
        $status='';
        foreach (Exam::where('test_id',$id)->get() as $kay=>$answer){
            if ($answer->answer == \request("test-{$kay}")){
                array_push($ture,$answer->id);
            }elseif (\request("test-{$kay}")=='dont'){
                array_push($dont,$answer->id);

            }else{
                array_push($false,$answer->id);

            }
        }
        if (count($ture) >= count($false)*2+count($dont)){
            Mail::to(User::where('id',Test::where('id',$id)->first('user_id')['user_id'])->first('email')['email'])->send(new mailNew('Accept',"user accept ",User::where('id',Auth::id())->first('name')['name']));
            $status='Accept';
        }else{
            Mail::to(User::where('id',Test::where('id',$id)->first('user_id')['user_id'])->first('email')['email'])->send(new mailNew('Reject','user Reject',User::where('id',Auth::id())->first('name')['name']));

            $status='Reject';

        }
        answer::create([
            'test'=>$id,
            'user'=>Auth::id(),
            'ture'=>json_encode($ture),
            'false'=>json_encode($false),
            'dont'=>json_encode($dont),
            'status'=>$status
        ]);
        return redirect("/exam/{$id}")->with('status',$status);
    }
}
