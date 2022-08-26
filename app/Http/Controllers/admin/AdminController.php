<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\answer;
use App\Models\Exam;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Integer;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/panel');
    }

    public function user()
    {
        return view('admin/user', ['user' => User::all()]);
    }
    public function userDelete($id){
        User::destroy($id);
        return redirect()->back();
    }
    public function userAdmin($id){
        $user=User::find($id);
        $user->update([
            'role'=>'admin'
        ]);
        return redirect()->back();
    }

    public function Exam()
    {

        return view('admin/examPanel', ['Exam' => Test::all()]);
    }

    public function testCreate()
    {
        return view('admin/creatTest');

    }

    public function testUpdateCreate()
    {

        $user = new User();

        $validate = \request()->validate([
            'title' => 'required'
        ]);
        redirect()->back()->withErrors($validate);
        Test::create([
            'title' => \request('title'),
            'exam' => \request('exam'),
            'user_id' => Auth::id(),
        ]);
        return redirect('/admin/exam');
    }

    public function examShow($id)
    {
        $r = Exam::where('test_id', $id)->get();
        return \view('admin/exam', ['id' => $id, 'Exam' => $r]);
    }

    public function examCreate($id)
    {
        $r = Test::where('id', $id)->first()['exam'];
        return \view('admin/examCreate', ['id' => $id, 'r' => $r]);
    }

    public function examStore($id)
    {
        $r = Test::where('id', $id)->first()['exam'];
//        return $r;
        if (!Exam::where('test_id', $id)->get() || count(Exam::where('test_id', $id)->get()) == 0) {
            for ($x = 1; $x <= $r; $x++) {
                $validate = \request()->validate([
                    "title_{$x}" => 'required',
                    "answer_{$x}" => 'required',
                ]);
                redirect()->back()->withErrors($validate);
                Exam::create([
                    'qu' => \request("title_{$x}"),
                    "answer" => \request("answer_{$x}"),
                    'test_id' => $id,
                ]);
            }
        } else {
            for ($x = 1; $x <= $r; $x++) {
                $validate = \request()->validate([
                    "title_{$x}" => 'required',
                    "answer_{$x}" => 'required',
                ]);
                $up = Exam::find(Exam::where('test_id', $id)->get('id')[$x - 1]->id);
                redirect()->back()->withErrors($validate);
                $up->update([
                    'qu' => \request("title_{$x}"),
                    "answer" => \request("answer_{$x}"),
                    'test_id' => $id,
                ]);
            }
        }


        return redirect("/admin/exam");
    }

    public function examDelete($id)
    {
        Exam::destroy(Exam::where('test_id', $id)->get('id'));
        answer::destroy(answer::where('test', $id)->get('id'));
        return redirect()->back();
    }

    public function testDelete($id)
    {
        Test::destroy($id);
        return redirect()->back();
    }
}
