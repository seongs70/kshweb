@extends('layouts.app')

<link href="{{ asset('/css/Product.css') }}" rel="stylesheet" type="text/css" >
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>
$(document).ready(function(e) {
    $('.click').click(function(){
        $('.productCreate').show();
    });
    $('#can').click(function(){
        $('.productCreate').css('display', 'none');
    });
    $('#update').click(function(){
        $('.pro').hide();

        $('.productEdit').show();
    });
    $('#can2').click(function(){
        $('.productEdit').css('display', 'none');
        $('.pro').show();
    });

    $('.reviewEdit').hide();

    $('.Review > ul').click(function(){
       var reviewBtnEdit=$(this).index();
        // alert(reviewBtnEdit);
        $('.Review > ul').each(function(){
            var reviewUl = $('.Review > ul').index(this);

            if(reviewBtnEdit == reviewUl){
                $(this).find('.pro').css("display","none");

                $(this).find('.reviewBtnEdit').hide();
                $(this).find('.reviewBtnDelete').hide();
                $(this).find('.reviewEdit').show();
                $(".dele").unbind();

            }
        });
    });
});

</script>
@section('content')
<div class="container">
    <div class="navbar col-md-4 navbar-laravel" id="http" style="margin-left:214px;">HTTP상태 : {{$res['status']}}</div>
        <div class="col-md-12" style="margin-left:200px;">
                <a href="{{ route('Products.show', ['id' => $res['id'], 'request' => $res['bike']]) }}"><button type="button" class="btn btn-primary">뒤로가기</button></a>
                <ul id="btnList" style="padding-left: 20px;">
                    <li>
                    <a href="{{ route("ReviewIndex",['id' => $res['id'], 'request' => $res['bike']])}}"><button type="button" class="btn btn-primary">새로고침</button></a>
                    </li>
                </ul>
                <button class="btn btn-primary click">리뷰생성</button>
        </div>
        <div class="productCreate" style=" margin-left:126px;">
            <form method="post" class="postIndex_name" action="{{ route('ReviewStore', ['id' => $res['id']]) }}">
                {!! csrf_field() !!}
                <ul>
                    <li style="width:299px;"><h5 style="width:50px;">성함</h5><input type="text" name="name" ></li>
                    <li><h5 style="width:50px;">평점</h5><input type="number" name="star" placeholder="0~5 숫자만" min="0" max="5" value={{old('star')}}></li>
                    <input type="hidden" name="productId" value={{$res['id']}}>
                    <li style="float:none; width:1000px;"><h5 style="clear:both; width:50px;">내용</h5><textarea name="description" rows="4" >{{old('description')}}</textarea></li>
                    <li style="float:left; margin-left:49px; "><button type="submit" class="btn btn-primary" style="margin-right:20px;">전 송</button><button type="button" id="can" class="btn btn-primary">취 소</button></li>
                </ul>
            </form>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger" style="margin-left: 55px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="Review">
    @foreach ($res['body']['data'] as $key )
        <ul class="free">
            <li class="reviewForm">
                <ul>
                    <li><img src="/images/profileIcon.jpg" alt=""/></li>
                    <div class="pro">
                    <li>일련번호 : {{$key['id']}}</li>
                    <li>이름 : {{$key['customer']}}</li>
                    <li>설명 : {{$key['body']}}</li>
                    <li>평점 : {{$key['star']}}점</li>
                    </div>
                </ul>
            </li>
            <li class="reviewBtnEdit">
                <button type="button" class="btn btn-default" style="margin-right:20px; margin-top:0;">수정</button>
            </li>
            <li class="reviewEdit">
                <form method="post" class="postIndex_name" action="{{ route('ReviewUpdate', ['productId' => $key['product_id'], 'reviewId' => $key['id']]) }}">
                    {!! csrf_field() !!}
                    <ul class="reviewEditUl">
                        <li style="width:299px;"><h5 style="width:50px;">이름</h5><input type="text" name="name" value="{{$key['customer']}}" required/></li>
                        <li style="float:none; width:1000px;"><h5 style="clear:both; width:50px;">설명</h5><textarea name="description" rows="3" required/>{{$key['body']}}</textarea></li>
                        <li><h5 style="width:50px;">평점</h5><input type="number" name="star" value={{$key['star']}} min="0" max="5" required/></li>
                        <li style="float:left; margin-left: 50px;">
                            <button type="submit" class="btn btn-primary" style="margin:10px 20px 10px 0;">전 송</button>
                            <a href="{{route("ReviewIndex",['id' => $res['id'], 'request' => $res['bike']])}}"><button type="button" class="btn btn-primary cancle">취소</button></a></li>
                        <input type="hidden" name="productId" value={{$key['product_id']}}>
                        <input type="hidden" name="reviewId" value={{$key['id']}}>
                        <input type="hidden" name="update" value={{'update'}}>
                    </ul>
                </form>
            </li>

            <form method="post" class="dele" action="{{ route('ReviewDelete', ['productId' => $key['product_id'], 'reviewId' => $key['id']]) }}">
                {!! csrf_field() !!}
                <input type="hidden" name="productId" value={{$key['product_id']}}>
                <input type="hidden" name="reviewId" value={{$key['id']}}>
                <button type="submit" class="btn btn-default">삭제</button>
            </form>

        </ul>

        @endforeach
    </div>
</div>

@if($res['body']['data'] == null)
    리뷰가 없습니다.
@else
@endif
@endsection
