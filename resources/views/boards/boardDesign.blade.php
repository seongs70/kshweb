@extends('layouts.master')

<!DOCTYPE html>

@section('script')
	<script type="text/javascript" src="{!! asset('js/publish.js') !!}"></script>
	<link href="{{ asset('/css/publish.css') }}" rel="stylesheet" type="text/css" >
@endsection

@section('content')
<section>
<article id="a4">
	<div class="m_notice">
		<span>편집 디자인</span>
	</div>
    <div class="rope">
    </div>
    <div class="gallery_frame">
        <div class="gallery_tap_title_wrap">
            <ul>
                <li class="gallery_tap_title is2"><a href="#"># 편집디자인</a></li>
                <li class="gallery_tap_title is3"><a href="#"># 리플렛, 북커버</a></li>
            </ul>
       </div>
       <div class="gallery_tap_wrap">
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
       </div>
       <div class="gallery_popup">
            <a href="#" class="gallery_close"><img src="/images/popup_close.png" alt="close"></a>
            <a href="#" class="gallery_left1"><img src="/images/arrow-left.png" alt="left"></a>
            <a href="#" class="gallery_left2"><img src="/images/arrow-left.png" alt="left"></a>
            <a href="#" class="gallery_right1"><img src="/images/arrow-right.png" alt="right"></a>
            <a href="#" class="gallery_right2"><img src="/images/arrow-right.png" alt="right"></a>
            <div class="gallery_popupImage">
            </div>
       </div>
    </div>
	<div id="m_gallery_tap" class="gallery_tap_title_wrap">
		<ul>
			<li class="gallery_tap_title is2 m_gallery_tap_title"><a href="#"># 편집디자인</a></li>
			<li class="gallery_tap_title is3 m_gallery_tap_title"><a href="#"># 리플렛, 북커버</a></li>
		</ul>
	</div>
</article>

	<div class="m_design">
		<ul>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<ul>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</section>
<script>

</script>
@endsection
