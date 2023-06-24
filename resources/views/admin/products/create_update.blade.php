@extends("admin.layout")
@section("data-view")
<div class="container-fluid">
	<div class="col-md-12">  
		<div class="panel panel-primary">
				<h3 class="panel-heading">Add Products</h3>
				<div class="panel-body">
				<form method="post" enctype="multipart/form-data" action="{{ $action }}">
					@csrf
						<div class="row" style="margin-top:5px;">
								<div class="col-md-2">Name</div>
								<div class="col-md-10">
										<input type="text" required value="{{ isset($record->name)?$record->name:'' }}" name="name" class="form-control" required>
								</div>
						</div>
						<!-- end rows -->
						<!-- rows -->
						<div class="row" style="margin-top:5px;">
								<div class="col-md-2">Price</div>
								<div class="col-md-10">
										<input type="text" required value="{{ isset($record->price)?$record->price:'' }}" name="price" class="form-control" required>
								</div>
						</div>
						<!-- end rows -->
						<!-- rows -->
						<div class="row" style="margin-top:5px;">
								<div class="col-md-2">Discount</div>
								<div class="col-md-10">
										<input type="number" required min="0" value="{{ isset($record->discount)?$record->discount:'' }}" name="discount" class="form-control" required>
								</div>
						</div>
						<!-- end rows -->
						<!-- rows -->
						<div class="row" style="margin-top:5px;">
								<div class="col-md-2">Category</div>
								<div class="col-md-10">
										<select class="form-control" name="category_id" style="width:250px;">
										@if(isset($category))
											@foreach($category as $row)	                    
												<option @if(isset($record->category_id)&&$record->category_id==$row->id) selected 	@endif value="{{ $row->id }}">{{ $row->name }}</option>	
											@endforeach
										@endif
										</select>
								</div>
						</div>
						<!-- end rows -->
						 <!-- rows -->
						 <div class="row" style="margin-top:5px;">
							<div class="col-md-2">Brand</div>
							<div class="col-md-10">
									<select class="form-control" name="brand_id" style="width:250px;">
									@foreach($brand as $row)	                    
										<option @if(isset($record->brand_id)&&$record->brand_id==$row->id) selected @endif value="{{ $row->id }}">{{ $row->name }}</option>	
									@endforeach
									</select>
							</div>
					</div>
					<!-- end rows -->
						<style>
							.ck-editor__editable{
								max-height: 350px;
								min-height: 350px;
								overflow: scroll;
							}
						</style>
						<!-- rows -->
						<div class="row" style="margin-top:5px;">
								<div class="col-md-2">Description</div>
								<div class="col-md-10">
										<textarea name="description" id="description">{{ isset($record->description)?$record->description:'' }}</textarea>
										<script type="text/javascript">
											ClassicEditor.create(document.querySelector("#description"));
										</script>
								</div>
						</div>
						<!-- end rows -->
						<!-- rows -->
						<div class="row" style="margin-top:5px;">
								<div class="col-md-2">Content</div>
								<div class="col-md-10">
										<textarea name="content" id="content">{{ isset($record->content)?$record->content:'' }}</textarea>
										<script type="text/javascript">
											ClassicEditor.create(document.querySelector("#content"));
										</script>
								</div>
						</div>
						<!-- end rows -->
						<!-- rows -->
						<div class="row" style="margin-top:5px;">
								<div class="col-md-2"></div>
								<div class="col-md-10">
										<input type="checkbox" @if(isset($record->hot) && $record->hot == 1) checked @endif name="hot" id="hot"> <label for="hot">Hot</label>
								</div>
						</div>
						<!-- end rows -->
						<!-- rows -->
						<div class="row" style="margin-top:10px;">
								<div class="col-md-2">Photo</div>
								<div class="col-md-10">
										<input type="file" name="photo">
								</div>
						</div>
						<!-- end rows -->
						<!-- rows -->
						<div class="row" style="margin-top:10px;">
							<div class="col-md-2">Photo detail</div>
							<div class="col-md-10">
									<input type="file" name="photo_detail[]" multiple>
							</div>
					</div>
					<!-- end rows -->
						<!-- rows -->
						<div class="row" style="margin-top:5px;">
								<div class="col-md-2"></div>
								<div class="col-md-10">
										<input type="submit" value="Process" class="btn btn-primary">
								</div>
						</div>
						<!-- end rows -->
				</form>
				</div>
		</div>
</div>
</div>
@endsection