@extends('template.homepage.main')

@section('mainContent')
@php
  $kontak = DB::table('kontak')->get();
  $chat = DB::table('chatdata')->get();
  $emailuser = Auth::user()->email;
@endphp
<div class="split left">
<meta name="csrf-token" content="{{ csrf_token() }}">
{!! csrf_field() !!}
  @foreach ($kontak as $kontak)
    @if ($kontak->email == Auth::user()->email )
      @php
          $user = \App\Models\User::where('email', $kontak->pemilik)->first();
      @endphp
      <button class="button button2" id="{{$kontak->id}}" onclick="showchat('{{$kontak->id}}')" value="{{Auth::user()->fname." ".Auth::user()->lname}}"><img src="dummy.png" alt="Avatar" class="avatar" id="avatarmenu"><div class="account">{{$user->fname}} {{$user->lname}}</div></button>
    @elseif ($kontak->pemilik == Auth::user()->email)
      @php
          $user = \App\Models\User::where('email', $kontak->email)->first();
      @endphp
      <button class="button button2" id="{{$kontak->id}}" onclick="showchat('{{$kontak->id}}')" value="{{Auth::user()->fname." ".Auth::user()->lname}}"><img src="dummy.png" alt="Avatar" class="avatar" id="avatarmenu"><div class="account">{{$user->fname}} {{$user->lname}}</div></button>
    @endif
  @endforeach
</div>

<div class="split right" id="formchat">
    <div class="boxchat" id="boxchat"></div>
    <input type="text" id="message" name="message" placeholder="type message here..">
    <input type="submit" id="send" name="send">
</div>

@endsection

@section('secondContent')
  <script>
    var idchat;
    function showchat($idchat)
    {
      $("#boxchat").empty();
      var email = document.getElementById(`${$idchat}`).value;
      document.getElementById('formchat').style.visibility = "visible";
      idchat = $idchat;
      var chat = JSON.parse('<?= $chat ?>');
      for (let index = 0; index < chat.length; index++) {
        if(chat[index]['id_chat'] == $idchat)
        {
            if(chat[index]['nama'] == '<?= $emailuser ?>')
            {
                $("#boxchat").append(
                    "<div class=\"container darker\">" +
                        "<h4>" + chat[index]['nama'] + "</h4>" +
                        "<p>" + chat[index]['message'] + "</p>"+
                    "</div>"
                );
            }
            else
            {
                $("#boxchat").append(
                    "<div class=\"container\">" +
                        "<h4>" + chat[index]['nama'] + "</h4>" +
                        "<p>" + chat[index]['message'] + "</p>"+
                    "</div>"
                );
            }
        }
      }

    }

    $(document).on('click', '#send', function(e) {
        var message = document.getElementById('message').value;
        var nama = document.getElementById(`${idchat}`).value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "addchat",
            type: "post",
            data: {
                'idchat':idchat,
                'message':message,
            },
            success:function(data){
                $("#boxchat").append(
                    "<div class=\"container darker\">" +
                        "<h4>" + nama + "</h4>" +
                        "<p>" + message + "</p>"+
                    "</div>"
                );
            }
        })
    });
  </script>
@endsection

@section('customStyle')
<style>

.button {
  border: none;
  color: white;
  padding: 5px 20px;
  width: 300px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 10px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button2 {
  background-color: white;
  color: black;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.account{
    padding: 10px;
    float: left;
    font-size: 20px;
    font-weight: 500;
}

.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  float: left;
}

input[type=text], select {
  width: 87%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  float: left;
}

input[type=submit] {
  width: 10%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 7px 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.boxchat{
    height: 500px;
    overflow: auto;
}

.split {
  height: 100%;
  position: fixed;
  z-index: 1;
  overflow-x: hidden;
  padding: 10px;

}

/* Control the left side */
.left {
  left: 0;
  width: 30%;
  background-color: rgb(255, 255, 255) ;
}

/* Control the right side */
.right {
  right: 0;
  width: 70%;
  background-color: rgb(243, 243, 243);
  visibility: hidden;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding-left: 10px;
  padding-bottom: 10px;
  margin-top: 10px;
  float: left;
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

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
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

</style>
@endsection
