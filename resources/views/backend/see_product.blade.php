@extends('backend.layout.master')
@section('title','Chi tiết sản phẩm')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="panel panel-primary ">
			<!-- Default panel contents -->
			<div class="panel-heading">Chi tiết sản phẩm</div>
			<div class="panel-body">
				<H2> Tên sản phẩm: {{ $product->pro_name }}</H2>
				<div>
					<h3>Ảnh sản phẩm</h3>
	                <div>
	                	<img  class="thumbnail" width="300px" src="{{ asset('avatar/'.$product->img) }}">
	                </div>
				</div>
				<div>
					<h3>Giá sản phẩm:{{number_format($product->price,0,'.',',')}}</h3>
				</div>
				<div>
					<h3>Thời gian bảo hành đến ngày:{{$product->warranty}}</h3>
				</div>
				<div>
					<h3>Khuyến mãi:{{$product->promotion}}%</h3>
				</div>
				<div>
					@php
						$status=$product->pro_status==1?'Còn hàng':'Hết hàng';
					@endphp
					<h3>Trạng thái:{{$status}}</h3>
				</div>
				<div>
					<h3 style="white-space: pre">Miêu tả:{{$product->description}}</h3>
				</div>
			</div>
		
			<!-- Table -->
			
		</div>
</div>
@stop()