  {{-- Code Written By Ajay (category add page) --}}
@extends('admin')
@section('style')

<style type="text/css" media="screen">
 
.form-group{
  margin-bottom: 2rem !important;
}
</style>
@endsection
@section('content') 


<div class="container"> 
<div class="row">
  <div class="col-md-5 dt-all pt-3">
   <h3 class="">Add New:Category</h3>  
      {!! Form::open(['route' => 'category.store','files'=>true,'id' => 'form-prop']) !!}
            <br>
          {{-- {{ dd($errors) }}   --}}
          <div class="form-group">
             {!! Form::select('category_type', $type ,null,['placeholder' => '--Select Category Type--','class' => 'form-control','required']); !!}
            <span class="text-danger error">{{ $errors->first('category_type') }}</span>
          </div>  
          <div class="form-group">
            <input type="text" class="form-control rounded-0" name="category_name" placeholder="Category Name" value="{{ old('category_name') }}" required>
            <span class="text-danger error">{{ $errors->first('category_name') }}</span>
          </div>
          <div class="form-group">
            <input type="text" class="form-control rounded-0" name="category_title" placeholder="Category Title" value="{{ old('category_title') }}" required="">
            <span class="text-danger error">{{ $errors->first('category_title') }}</span>
          </div>
          <div class="form-group">
            <textarea class="form-control description" name="description" placeholder="Notes...." required=""></textarea>
            <span class="text-danger error">{{ $errors->first('description') }}</span>
          </div>
         <div class="form-group">
            <input type="file" id="file" class="file-img" name="photo" size="40" required>
            <span class="text-danger error">{{ $errors->first('photo') }}</span>
          </div>
          <div class="mb-4">
            <button type="submit" class="btn btn-warning save-tb">Save Category</button>
            &nbsp; &nbsp; &nbsp;
            <button type="button" class="btn btn-default " onclick="window.history.back();">Cancel</button>
          </div>
     {!! Form::close() !!}
    </div>
</div>
</div>

@section('script')
 <script type="text/javascript">

 </script>
 
@endsection

@endsection



