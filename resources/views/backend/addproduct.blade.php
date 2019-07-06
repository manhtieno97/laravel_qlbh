    @extends('backend.layout.master')
    @section('title','Thêm mới sản phẩm')
    @section('main')
    <script src="https://unpkg.com/autonumeric"></script>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Thêm sản phẩm</div>
					<div class="panel-body">
						<form method="post" action="{{ asset('admin/product/add') }}" enctype="multipart/form-data">
							@include('errors.note')
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" value="{{ old('name') }}" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="text" id="autonumberic" value="" name="price" class="form-control">
									</div>
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
									</div>
									<div class="form-group" >
										<label>Phụ kiện</label>
										
										<div>
											<label>
													<input type="checkbox" name="sac" value="Sạc dự phòng">
													Sạc dự phòng
											</label>
											<label>
													<input type="checkbox" name="tainghe" value="Tai nghe">
													Tai nghe
											</label>
											<label>
													<input type="checkbox" name="accessories" value="Balo">
													Balo
											</label>
										</div>
									</div>
									<div class="form-group" >
										<label>Bảo hành</label>
										<input required type="date" value="{{ old('warranty') }}" name="warranty" class="form-control">
									</div>
									<div class="form-group" >
										<label>Khuyến mãi</label>
										<input required type="number" max="99" min="0" name="promotion" class="form-control" value="{{ old('promotion') }}">
									</div>

									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="status" class="form-control">
											<option value="1">Còn hàng</option>
											<option value="0">Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Miêu tả</label>
										<textarea class="ckeditor" required name="description">{{ old('description') }}</textarea>
									</div>
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="cat_id" class="form-control">
											@foreach ($catlist as $cat)
											<option value="{{$cat->id}}">{{$cat->name}}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="featured" value="1">
										Không: <input type="radio" checked name="featured" value="0">
									</div>
									
									<button type="submit" class="btn btn-primary">Thêm</button>
									<a href="{{ asset('admin/product') }}" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
   <script type="text/javascript">

   </script>
	@stop()