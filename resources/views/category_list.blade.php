{{-- Code Written By Ajay (category list page user) --}}
@extends('admin')
@section('style')

<style type="text/css" media="screen">
 
.form-group{
  margin-bottom: 2rem !important;
}
</style>
@endsection
@section('content')
<div class="container dt-all">
<h2 class="">Welcome to AJ CART</h2>
<div class="position-relative">
<input type="search" name="search" class="search form-control w-25" placeholder="Search Category">
<button class="btn btn-default clear-search">Clear</button>
</div>
<div class="clear"></div>
</div>
<div class="container mt-3 dt-all">
<div class="row fetchData">
 @foreach($category as $item) 
  <div class="col-md-6 col-lg-4 col-12 mb-3">  
    <div class="card" style="width: 18rem;background: darkseagreen;">
      <img class="card-img-top"
       src="{{ '/Items/'.$item->id.'/'.$item->photo }}" alt="Image Category" style="height: 160px;">
       <badge class="badge badge-success">{{ $item->categoryType->category_type }}</badge>
      <div class="card-body p-3">
        <h3 class="">{{ $item->category_name }}</h3>
        <h5 class="">{{ $item->category_title }}</h5>
        <p class="card-text">{{ $item->description }}</p>
        <a href="{{ url('category-view').'/'.$item->slug }}" class="btn btn-primary">View Detail</a>
      </div>
    </div>
  </div>
 @endforeach
</div>
</div>

@section('script')
 <script type="text/javascript">


 $(document).on('click', '.clear-search', function (e) 
        {
          search=null;
          $('.search').val('')
          searchCategory(search)

      });

 $(document).on('keypress', '.search', function (e) 
        {
          if (e.keyCode == 13) {
                 var search = $(this).val(); 
                  searchCategory(search)
        }
    });

// Search category ajax call
 function searchCategory(search) {
  var get_codes=''; 
        $.ajax( 
            {  
            url: '/search-category/', 
            type: 'GET',
            dataType: "JSON",
            data: { 
                    "search": search, 
                    "_method": 'GET'
                 },

            success: function (result) 
             { 
              console.log(result)
              get_codes='';         
              var url='{{ url('category-view')}}';
              for (var i = 0; i <= result.data.length - 1; i++) {
               get_codes += '<div class="col-md-6 col-lg-4 col-12 mb-3">'+  
                    '<div class="card" style="width: 18rem;background: darkseagreen;">'+
                      '<img class="card-img-top" src="'+result.data[i].file_name+'" alt="Card image cap" style="height: 160px;">'+
                       '<badge class="badge badge-success">'+result.data[i].category_type.category_type+'</badge>'+
                      '<div class="card-body p-3">'+
                        '<h3 class="">'+result.data[i].category_name+'</h3>'+
                        '<h5 class="">'+result.data[i].category_title+'</h5>'+
                        '<p class="card-text">'+result.data[i].description+'</p>'+
                        '<a href="'+ url +'/'+result.data[i].slug+'" class="btn btn-primary">View Detail</a>'+
                      '</div>'+
                    '</div>'+
                  '</div>';
               
                }
              $('.fetchData').html(get_codes);      
       },

      error:function(result)
               {
                  console.log("It failed"+JSON.stringify(result));
 
               }
      });
 }
 </script>
 
@endsection

@endsection
