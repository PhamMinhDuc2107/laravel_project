@extends("admin.layout")
@section("data-view")
	<div class="container-fluid">
		<div class="col-md-12">  
	    <div class="panel panel-primary">
	        <div class="panel-heading">Add edit</div>
	        <div class="panel-body">
	        <form method="post" enctype="multipart/form-data" action="{{ $action }}">
	        	@csrf
	            <div class="row" style="margin-top:5px;">
	                <div class="col-md-2">Name</div>
	                <div class="col-md-10">
	                    <input type="text" required value="{{ isset($record->name)?$record->name:'' }}" name="name" class="form-control" required>
	                </div>
	            </div>
							<div class="row" style="margin-top:5px;">
								<div class="col-md-2">Date</div>
								<div class="col-md-10">
										<input type="date" required value="{{ isset($record->date)?$record->date:'' }}" name="date" class="form-control" required>
								</div>
						</div>
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
	            <div class="row" style="margin-top:5px;">
	                <div class="col-md-2">Photo</div>
	                <div class="col-md-10">
	                    <input type="file" name="photo">
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