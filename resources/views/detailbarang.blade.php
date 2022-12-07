@extends('template.homepage.main')

@section('mainContent')

{{-- data nya disini --}}
@php
$id = request()->query('barang');
$barang = DB::table('barang')->where('id', '=', $id)->first();
@endphp

{{-- <h1>{{$barang}}</h1> --}}
{{-- <img src="{{URL::asset('dummy.png')}}" style="width:90%; height:90%; margin:10px; border-radius:10px;"> --}}

<div class="box">
  <div style="background-color: white">
    <img src="{{URL::asset('dummy.png')}}" style="width:30%; height:50%; margin:10px; border-radius:10px;float:left">
    <div style="float: left;width: 50vw">
      <h1>{{$barang->nama_barang}}</h1>
      <h3>Rp. {{number_format($barang->harga,2,',','.')}}</h3>
      <br>
      <h4>Deskripsi:</h4>
      <h4>{{$barang->deskripsi}}</h4>
      <button class="btn btn-success" style="float: right;margin-top: 20vh">Masukkan ke Keranjang</button>
    </div>
  </div>

</div>





<br>

@endsection

@section('secondContent')

@endsection

@section('customStyle')
<style>
  .mySlides {
    margin-top: 30px;
    border-radius: 10px;
    background-color: teal;
    height: 25vw;
    padding: 20px;
  }

  .box {
    width: 100vw;
    height: 100vh;
    background-color: white;
    padding: 10px;
    border-bottom-left-radius: 75px;
    border-bottom-right-radius: 75px;
  }

  .card {
    width: 250px;
    height: 300px;
    background-color: white;
    padding: 5px;
    margin: 20px;
    margin-left: 32px;
    float: left;
  }

  .main {
    width: 90%;
    margin: 0 auto;
    margin-top: 200px;
    height: auto;
  }

  h2 {
    border-bottom: 1px solid gray;
  }

  a {
    text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
  }

  a:hover {
    background-color: #ddd;
    color: black;
  }

  .previous {
    margin-top: 7vw;
    background-color: #f1f1f1;
    position: absolute;
    font-weight: 900;
    color: black;
  }

  .next {
    margin-top: 7vw;
    float: right;
    background-color: #f1f1f1;
    font-weight: 900;
    color: black;
  }

  .round {
    border-radius: 50%;
  }

  @media screen and (max-width: 600px) {

    .col-25,
    .col-75,
    input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
  }
</style>
@endsection