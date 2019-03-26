@extends('layouts.master')


<!DOCTYPE html>
@section('stylesheet')
    
@endsection
@section('script')
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
    </script>
@endsection
@section('style')
    .alert-info{
        z-index: 1;    position:absolute;
        width: 240px; left:0%;
        margin-top:365px; font-size:12px;
        padding:14px;
    }
    .boardSetting{ width:150px;
    
    }

@endsection

@section('content')
  <style>
      html, body { height:100%; }

    .container{ 
        width:100%; height:600px; 
        background-image:url("/images/background.jpg"); background-position:bottom;
        background-repeat: no-repeat; background-size:cover;
      }
      .main1, .main2{
        width:1140px; height:190px; margin:0 auto;
      }
      .main1 ul li, .main2 ul li {
        float:left; width:360px;
        height:195px; margin-right:30px;
        background-position:bottom;
        background-repeat: no-repeat; background-size:cover;
          
      }
      .main1{ margin-top:120px;}
      .main2{ margin-bottom:140px; height:30px; }
      .main2 ul li{
          text-align:left; font-size:24px;
          font-weight: bold; height:30px;
          margin-top:5px;
      }
      .main2 ul a{color:darkgray;}
      .main2 ul a:hover{color:cornflowerblue;}
      .main1 ul a:first-child li{
            background-image:url("/images/main2-3.jpg"); 
      }
      .main1 ul a:nth-child(2) li{
           background-image:url("/images/main2-2.jpg"); 
      }
      .main1 a:last-child li{
          background-image:url("/images/main2-1.jpg"); 
          margin-right:0;
      }
      .main2 ul li:last-child{
          margin-right:0;
      }
      .main3{
        width:1140px; height:140px; margin:0 auto;
        background-image:url("/images/main3.jpg"); background-position:center;
        background-repeat: no-repeat; background-size:cover;
        margin-bottom:80px;
      }
      .main4{
        width:1140px; height:620px; margin:0 auto;
        background-image:url("/images/erd.jpg"); background-position:center;
        background-repeat: no-repeat; background-size:cover;
        margin-bottom:100px; box-shadow: 0 1px 7px 0 rgba(0,0,0,.15);
      }
</style>

<div class="container"></div>   
<div class="main1">
    <ul>
        <a href="http://dynamite156.dothome.co.kr/"target="_blank"><li></li></a>
        <a href="http://user3763.dothome.co.kr/"target="_blank"><li></li></a>
        <a href="http://user156.dothome.co.kr/html/"target="_blank"><li></li></a>
    </ul>
</div>
<div class="main2">
    <ul>
        <li><a href="http://user3763.dothome.co.kr/"target="_blank">참치집 Web</a></li>
        <li><a href="http://dynamite156.dothome.co.kr/"target="_blank">피규어 Web</a></li>
        <li><a href="http://user156.dothome.co.kr/html/"target="_blank">채식 Web</a></li>
    </ul>
    
</div>

<div class="main3"></div>
<div class="main4"></div>
@endsection
