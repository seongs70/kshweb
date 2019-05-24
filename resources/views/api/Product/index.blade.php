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
});
</script>

@section('content')

<div class="container">
    <div class="navbar col-md-4 navbar-laravel" id="http">HTTP상태 : {{$res['status']}}</div>

        <div class="col-md-12">
                <ul id="btnList">
                    <li>
                    <a href="{{route('Products.index')}}">
                        <button type="button" class="btn btn-primary">
                            @isset($res['code'])
                                뒤로가기
                            @endisset
                            @empty($res['code'])
                            새로고침
                            @endempty
                        </button>
                    </a>
                </ul>
                <button class="btn btn-primary click">상품 생성</button>
        </div>
        <div class="productCreate">
            <form method="post" class="postIndex_name" action="{{ route('Products.store') }}">
                {!! csrf_field() !!}
                <ul>
                    <li><h5>상품명</h5><input type="text" name="name"></li>
                    <li><h5>가격</h5><input type="number" name="price" placeholder="숫자"></li>
                    <li><h5>재고</h5><input type="number" name="stock" placeholder="숫자"></li>
                    <li><h5>할인율</h5><input type="number" name="discount" placeholder="1~100사이 숫자"></li>
                    <input type="hidden" name="user_id" value=6>
                    {{-- <li><h5>회원 일련번호</h5><input type="text" name="user_id" value=6 style="width:100px;"></li> --}}
                    <li style="float:none; width:1000px;"><h5 style="clear:both;">설명</h5><textarea name="description" rows="4" ></textarea></li>
                    <li style="float:left;"><button type="submit" class="btn btn-primary" style="margin-right:20px;">전 송</button><button type="button" id="can" class="btn btn-primary">취 소</button></li>
                </ul>
            </form>
        </div>
        <div class="Product_wrap">
                @foreach($res['body']['data'] as $key => $value)
                    <?php $length = (int)$key+1?>
            <div class="Product">

                <ul>
                    @isset($res['code'])
                        <li><img src="/images/bike/bike{{$bike}}.jpg" alt=""/></li>
                    @endisset
                    @empty($res['code'])
                    <li><a href="{{ route('Products.show', ['id' => $value['id'], 'request' => $length]) }}"><img src="/images/bike/bike{{$length}}.jpg" alt=""/></a></li>
                    @endempty
                    <div class="pro" style="padding-top:0;">
                    <li>일련번호 : <?= $value['id'] ?? $res['body']['data']['id'] ; ?></li>
                    <li>상품명 : <?= $value['name'] ?? $res['body']['data']['name'] ; ?></li>
                    @isset($res['code'])
                        <li>설명 : {{$res['body']['data']['description']}}</li>
                        <li>재고 : {{$res['body']['data']['stock']}}개</li>
                        <li>본래 가격 : {{$res['body']['data']['price']}}개</li>

                    @endisset
                    <li>할인율 : <?= $value['discount'] ?? $res['body']['data']['discount']; ?>%</li>
                    <li id="price">가격 : <?= $value['totalPrice'] ?? $res['body']['data']['totalPrice']; ?>원</li>
                    <li class="rating">평점(5점) : <?= $value['rating'] ?? $res['body']['data']['rating']; ?></li>
                    @isset($value['id'])
                        <li><a href="{{ route('Products.show', ['id' => $value['id'], 'request' => $length]) }}">상세보기</a></li>
                    @endisset

                    @isset($res['code'])
                        <li><a href="{{route("ReviewIndex",['id' => $res['body']['data']['id'], 'request' => $bike ])}}">리뷰보기</a></li>
                        <li><button href="#" id="update" class="btn" style="margin-top:15px;">업데이트</button></li>
                        <li>
                            <form method="post" action="{{ route('productDelete', ['id' => $res['body']['data']['id']]) }}">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn" style="margin-top:15px;">삭제</button>
                            </form>

                        </li>
                    @endisset
                    </div>
                </ul>

                @isset($res['code'])
                    <div class="productEdit">
                        <form method="post" action="{{ route('productUpdate', ['id' => $res['body']['data']['id']]) }}">
                            {!! csrf_field() !!}
                            <ul>
                                <li><h5>상품명</h5><input type="text" name="name" value={{$res['body']['data']['name']}}></li>
                                <li><h5>재고</h5><input type="number" name="stock" value={{$res['body']['data']['stock']}}></li>
                                <li><h5>가격</h5><input type="number" name="price" value={{$res['body']['data']['price']}}></li>
                                <li><h5>할인율</h5><input type="number" name="discount" value={{$res['body']['data']['discount']}}></li>
                                {{-- <input type="hidden" name="id" value={{$res['body']['data']['id']}}> --}}
                                {{-- <li><h5>회원 일련번호</h5><input type="text" name="user_id" value=6 style="width:100px;"></li> --}}
                                <li style="float:none; width:1000px;"><h5 style="clear:both;">설명</h5><textarea name="description" rows="4" style="width:600px;">{{$res['body']['data']['description']}}</textarea></li>
                                <li style="float:left;"><button type="submit" class="btn btn-primary" style="margin-right:20px;">전 송</button><button type="button" id="can2" class="btn btn-primary">취 소</button></li>
                            </ul>
                        </form>
                    </div>
                @endisset
            </div>
                @break(@isset($res['code']))
                @endforeach
        </div>
</div>
@endsection
