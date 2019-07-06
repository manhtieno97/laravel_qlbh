    @extends('backend.layout.master')
    @section('title','Edit sản phẩm')
    @section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Sửa sản phẩm</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control" value="{{ $product->pro_name }}">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="text" id="autonumberic" name="price" class="form-control" value="{{ $product->price }}">
									</div>
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="{{ asset('avatar/'.$product->img) }}">
									</div>
									<div class="form-group" >
										<label>Phụ kiện</label>
										<div>
											<label>
													<input type="checkbox" name="Sạc dự phòng" value="Sạc dự phòng" 
													@if ($product->accessories=='Sạc dự phòng') Checked @endif>
													Sạc dự phòng
											</label>
											<label>
													<input type="checkbox" name="Tai nghe" value="Tai nghe"
													@if ($product->accessories=='Tai nghe') Checked @endif>
													Tai nghe
											</label>
											<label>
													<input type="checkbox" name="accessories" value="Balo"
													@if ($product->accessories=='Balo') Checked @endif>
													Balo
											</label>
										</div>
									</div>
									<div class="form-group" >
										<label>Bảo hành</label>
										<input required type="date" name="warranty" class="form-control" value="{{ $product->warranty }}">
									</div>
									<div class="form-group" >
										<label>Khuyến mãi</label>
										<input required type="text" name="promotion" class="form-control" value="{{ $product->promotion }}">
									</div>
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="status" class="form-control">
											<option value="1" @if ($product->pro_status==1)checked @endif>Còn hàng</option>
											<option value="0" @if ($product->pro_status==0)checked @endif>Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Miêu tả</label>
										<textarea class="ckeditor" required name="description">{{ $product->description }}</textarea>
									</div>
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="cat_id" class="form-control">
											@foreach ($category as $cat)
											<option @if ($product->cat_id==$cat->id)selected @endif value="{{ $cat->id }}">{{ $cat->name }}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="featured" value="1" @if ($product->featured==1)selected @endif>
										Không: <input type="radio" checked name="featured" value="0" @if ($product->featured==0)selected @endif>
									</div>
									<input type="submit" name="submit" value="Update" class="btn btn-primary">
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
	@stop()