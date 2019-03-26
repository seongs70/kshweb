@extends('layouts.master')
@section('content')
<div class="container">   
    <div class="page-header">
        <h4>포럼 <small> /글 삭제 / {{ $post->postName }}</small></h4>
    </div>
    
    <form action="{{ route('posts.destroy', $post->postNumber) }}" method="post">
        {!! csrf_field() !!}
        {!! method_field('put') !!}
        
        @include('posts.partial.postForm')
        
        <div class="form-group"><button>수정하기</button></div>
        
    </form>
</div>    
@stop