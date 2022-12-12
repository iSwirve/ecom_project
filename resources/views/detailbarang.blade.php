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
    <img src="{{URL::asset('dummy.png')}}" style="width:20%; height:60%; margin:10px; border-radius:10px;float:left">
    <div style="float: left; width: 50vw; margin-left: 30px">
        <h1>{{$barang->nama_barang}}</h1>
        <h3>Rp. {{number_format($barang->harga,2,',','.')}}</h3>
        <br>
        <h4>Deskripsi:</h4>
        <h4>{{$barang->deskripsi}}</h4>
        <button class="btn btn-success" style="float: right;margin-top: 20vh">Masukkan ke Keranjang</button>
    </div>
</div>
<br>
@endsection

@section('secondContent')
<button class="open-button" onclick="openForm()">Chat</button>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h4>Chat Penjual</h4>
    <div class="container">
      <h4 alt="name"> Penjual </h2>
      <p>Hello. How are you today?</p>
      <span class="time-right">11:00</span>
    </div>
    <div class="container darker">
      <h4 alt="name" class="right"> Pembeli </h2>
      <p>Hey! I'm fine. Thanks for asking!</p>
      <span class="time-left">11:01</span>
    </div>
    <label for="msg"><b>Message</b></label>
    <input type="TEXT" placeholder="Type message" name="msg">
    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
  </script>
@endsection

@section('customStyle')
<style>
 {box-sizing: border-box;}
  .container {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 5px;
    margin: 10px 0;
  }

  input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .darker {
    border-color: #ccc;
    background-color: #ddd;
  }

  .container::after {
    content: "";
    clear: both;
    display: table;
  }

  .container.name{
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
  }

  .container .name.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
  }

  .time-right {
    float: right;
    color: #aaa;
  }

  .time-left {
    float: left;
    color: #999;
  }
  
  .open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
    width: 280px;
  }

  /* The popup chat - hidden by default */
  .form-popup {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 20px;
    border: 3px solid #f1f1f1;
    z-index: 9;
  }

  /* Add styles to the form container */
  .form-container {
    max-width: 500px;
    max-height: 500px;
    padding: 10px;
    background-color: white;
  }

  /* Full-width textarea */
  .form-container textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    resize: none;
    min-height: 200px;
  }

  /* When the textarea gets focus, do something */
  .form-container textarea:focus {
    background-color: #ddd;
    outline: none;
  }

  /* Set a style for the submit/login button */
  .form-container .btn {
    background-color: #04AA6D;
    color: white;
    padding: 5px 5px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }

  /* Add a red background color to the cancel button */
  .form-container .cancel {
    background-color: red;
  }

  /* Add some hover effects to buttons */
  .form-container .btn:hover, .open-button:hover {
    opacity: 1;
  }

  .mySlides {
    margin-top: 30px;
    border-radius: 10px;
    background-color: teal;
    height: 25vw;
    padding: 20px;
  }

  .box {
    width: 100vw;
    height: 35vw;
    background-color: white;
    padding: 10px;
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
  }

  a:hover {
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
