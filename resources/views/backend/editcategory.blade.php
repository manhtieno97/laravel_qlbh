    @extends('backend.layout.master')
    @section('title','Danh mục sản phẩm')
    @section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Update danh mục</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Update danh mục
						</div>
						@include('errors.note')
						<div class="panel-body">
							<form method="post" >
								<div class="form-group">
									<label for="">Tên danh mục</label>
									<input type="text" class="form-control" name="name" id="" placeholder="Nhập tên danh mục.." value="{{ $catEdit->name }}">
									@if ($errors->has('name'))
				                     <p class="text-danger">{{ $errors->first('name') }}</p>
				                    @endif
								</div>
								<div>
									<label for="">Status</label>
									<div class="radio">
										@php
											$check0=$catEdit->status==0 ? 'checked' :'';
											$check1=$catEdit->status==1 ? 'checked' :'';
										@endphp
										<label>
											<input type="radio" name="status" id="input" value="0" {{$check0  }}>
											Hidden
										</label>
										<label>
											<input type="radio" name="status" id="input" value="1" {{$check1  }}>
											Show
										</label>
								    </div>
								</div>
								<button type="submit" class="btn btn-primary">Update</button>
								{{csrf_field()}}
							</form>
						</div>
					</div>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách danh mục</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Tên danh mục</th>
					                  <th>Status</th>
					                  <th style="width:30%">Tùy chọn</th>
					                </tr>
				              	</thead>
				              	<tbody>
				              	@foreach ($catlist as $cat)	
				              	@php
				              		$status=$cat->status==1?'Show':'Hidden';
				              	@endphp
								<tr>
									<td>{{$cat->name}}</td>
									<td>{{$status}}</td>
									<td>
			                    		<a href="{{ asset('admin/category/edit/'.$cat->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
			                    		<a href="{{ asset('admin/category/delete/'.$cat->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
			                  		</td>
			                  	</tr>
			                     @endforeach
				                </tbody>
				            </table>
				            {!! $catlist->links() !!}
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	@stop()
	