+@extends('template.homepage.main')

<div>
  {{-- data nya disini --}}
  @php
  $id = session('idbarang');
  $barang = DB::table('barang')->where('id', '=', $id)->get();
  @endphp

  <h1>{{$barang}}</h1>
</div>






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
    height: 200px;
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