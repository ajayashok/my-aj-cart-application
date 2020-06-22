{{-- Code Written By Ajay (category details page) --}}
@extends('admin')
@section('style')

<style type="text/css" media="screen">
 
.form-group{
  margin-bottom: 2rem !important;
}
.view{
  text-align: center !important;
}
</style>
@endsection
@section('content')
<div class="container dt-all">
<h2 class="">{{ $category->category_name }}</h2>
<div class="clear"></div>
</div>
<div class="container mt-3 dt-all">
  <div class="mb-3 view">  
    <div class="card" style="width: 30rem;background: darkseagreen;">
      <img class="card-img-top"
       src="{{ '/Items/'.$category->id.'/'.$category->photo }}" alt="Image Category" style="height: 260px;">
       <badge class="badge badge-success">{{ $category->categoryType->category_type }}</badge>
      <div class="card-body p-3">
        <h5 class="">Title:{{ $category->category_title }}</h5>
        <p class="card-text">Notes:{{ $category->description }}</p>
      </div>
    </div>
</div>
</div>

@section('script')
 <script type="text/javascript">

@endsection

@endsection
