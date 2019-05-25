@extends('layouts.app')
<link href="{{ asset('/css/Product.css') }}" rel="stylesheet" type="text/css" >
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <ul>
                        <li>API 주소 <a href="http://115.68.220.209:8080/api/products">바로가기</a>(JSON Formatter 확장프로그램 필요)</li>
                        <li><a href="{{ route('tokenShow') }}">OAuth 토큰내역</a></li>
                        <li><a href="{{ route('restfulShow') }}">RESTful 사용하기</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
