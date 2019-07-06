
@extends('layout/index')
@section('content')

    <div class="panel panel-primary panel-category">
    	@include('error/404')
    	<!-- Default panel contents -->
    	<div class="panel-heading">Category</div>
    	<div class="panel-body">
    		<form action="{{ url('category') }}" method="POST" role="form" class="col-md-4">
    		{{ csrf_field()}}
    		<legend>Add_Category</legend>
    	
	    		<div class="form-group">
	    			<label for="">Name</label>
	    			<input type="text" class="form-control" name="name" id="" placeholder="Nhập tên danh mục">
                    @if ($errors->has('name'))
                     <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
	    		</div>
	    		<div class="form-group">
	    			<label for="">Status</label>
	    			<div class="radio">
	    				<label>
	    					<input type="radio" name="status" id="inputStatus" value="0" checked="checked">
	    					Hidden
	    				</label>
	    				<label>
	    					<input tdype="radio" name="status" id="inputStatus" value="1" >
	    					Show
	    				</label>
	    			</div>
	    		</div>

	    		<button type="submit" class="btn btn-primary">Submit</button>
    	    </form>

    	    @if (count($cats)>0)
    	    	<div class="col-md-8">
    	    	<table class="table table-hover">
    	    		<thead>
    	    			<tr>
    	    				<th>STT</th>
    	    				<th>Name</th>
    	    				<th>Status</th>
    	    				<th>Action</th>
    	    			</tr>
    	    		</thead>
    	    		<tbody>
    	    			@foreach ($cats as $key=> $cat)
    	    			<tr>
    	    				<td>{{ ++$key }}</td>
    	    				<td>{{ $cat->name }}</td>
    	    				<td>{{ $cat->status }}</td>
    	    				<td>
    	    					<a href="{{ route('edit_category',['id'=>$cat->id]) }}" title="" class="btn btn-primary">Sửa</a>
    	    					<a href="{{ route('delete_cat',['id'=>$cat->id]) }}" title="" class="btn btn-danger">Xóa</a>
    	    					
    	    				</td>
    	    			</tr>
    	    			@endforeach
    	    		</tbody>
    	    	</table>
    	    </div>
    	    @endif
    	</div>
    
    	
    </div>

@stop
