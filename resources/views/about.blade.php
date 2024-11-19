@extends('layout')
@section('title','เกี่ยวกับเรา')
@section('content')
    <h2>เกี่ยวกับเรา</h2>
    <hr>
    <p>ผู้พัฒนา : {{$name}}</p> {{-- นำข้อมูลจาก Route about มาใช้ --}}
    <p>วันที่เริ่มต้นพัฒนา : {{$date}}</p>
@endsection
