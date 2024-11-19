<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class AdminContorller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function blog(){
        // array ของข้อมูล
        //$blogs=DB::table('blogs')->paginate(5); // <= ให้แสดงข้อมูล 5 ข้อมูลในหนึ่งหน้า
        $blogs=Blog::paginate(5); // เปลี่ยนจากเชื่อมต่อจาก Data base เป็นโมเดลแทน
        return view('blog',compact('blogs'));
    }

    function about(){
        $name = "Natthapong";   // <== ส่งข้อมูลไปที่หน้า view
        $date = "16/11/2024";
        return view('about',compact('name','date')); // <== รวมข้อมูล
    }

    function create(){
        return view('form');
    }

    function insert(Request $request){
        $request->validate(
            [
            'title'=>'required|max:50',
            'content'=>'required',
            ],
            [
                'title.required'=>'โปรดกรอกชื่อบทความ',
                'title.max'=>'ชื่อบทความไม่ควรเกิน 50 ตัวอักษร',
                'content.required'=>'โปรดกรอกเนื้อหาบทความ'
            ]
        );
        $data=[
            'title'=>$request->title,
            'content'=>$request->content
        ];
        Blog::insert($data);
        return redirect('/author/blog');
    }

    function delete($id){
        Blog::find($id)->delete();
        return redirect()->back();
    }

    function change($id){
        $blog=Blog::find($id);
        $data=[
            'status'=>!$blog->status
        ];
        Blog::find($id)->update($data);
        return redirect()->back();
    }

    function edit($id){
        $blog=Blog::find($id);
        return view('edit',compact('blog'));
    }

    function update(Request $request,$id){
        $request->validate(
            [
            'title'=>'required|max:50',
            'content'=>'required',
            ],
            [
                'title.required'=>'โปรดกรอกชื่อบทความ',
                'title.max'=>'ชื่อบทความไม่ควรเกิน 50 ตัวอักษร',
                'content.required'=>'โปรดกรอกเนื้อหาบทความ'
            ]
        );
        $data=[
            'title'=>$request->title,
            'content'=>$request->content
        ];
        Blog::find($id)->update($data);
        return redirect('/author/blog');
    }
}
