@extends('layouts.master')

@section('stylesheet')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection

@section('script')
<script src="//code.jquery.com/jquery.min.js"></script>
<script>

</script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script src="{{ asset('/js/summernote-ko-KR.js') }}"></script>
@endsection

<style>

    .title{
    margin: 40px 0 20px; padding-bottom: 9px;
    display:block; padding-bottom:12px;
    border-bottom: 1px solid #eee;
    }
    .file{margin:10px 30px 0 0; width:250px; float:left; }
    .saveBtn{margin:10px 0 100px 0; float:right;}
    .note-toolbar{height: 58px;}
    .m_notice{display:none;}
    @media screen and (max-width:960px) {

        .m_notice {
            width:100%; padding:4.5vw 0;
            background-color:white;
            box-shadow: 0 1px 7px 0 rgba(0,0,0,.15);
            display:block;  margin-bottom:5vw;
        }
        .m_notice span{
            margin-left:5vw; font-size:4.5vw;
            font-weight:bold;
         }
    }
</style>

@section('content')
    <div class="m_notice">
        <span>글 작성하기</span>
    </div>

<div class="container">
    <h2 class="title"><small>글 작성하기</small></h2>

    @include('posts.partial.postCreateForm')
</div>
@endsection
