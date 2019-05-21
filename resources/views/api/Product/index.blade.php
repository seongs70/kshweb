{{-- {{dd($res['body']['data'])}} --}}
{{-- {{dd($res['body']['data'])}} --}}
{{-- {{ $res['body']['data']}}; --}}
{{--
@foreach($res['body'] as $key['data'] => $value)
    {{dd($value['name'])}}
@endforeach --}}

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
});
</script>
@section('content')

<div class="container">
        <div class="col-md-12">
                <ul id="btnList">
                    <li>
                    <a href="{{route('Products.index')}}"><button type="submit" class="btn btn-primary">새로 고침</button></a>
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
                </ul>
                <a href="#" id="update">업데이트</a>
                <div class="productEdit">
                    {{-- <form method="post" action="{{ route('') }}"> --}}
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
            </div>

                @break(@isset($res['code']))
                @endforeach
        </div>
</div>
@endsection
