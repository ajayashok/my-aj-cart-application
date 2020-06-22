{{-- Code Written By Ajay (category list page admin) --}}
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
<h3 class="">List:Category</h3>
<div class="clear"></div>
<div><a href="{{route('category.create')}}" class="btn btn-view" >
    <span class="fa fa-plus-circle "></span> New Category</a>
  </div>
<table class="table table-striped ">
  <thead>
    <tr>
      {{-- <th scope="col">#</th> --}}
      <th scope="col">Category Name</th>
      <th scope="col">Title</th>
      <th scope="col">Category Type</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
   {{-- Populate category on table --}}
     @if($category->count() != 0)
       @foreach($category as $item) 
       <tr> 
        <td>{{  $item->category_name }}</td>
        <td>{{  $item->category_title }}</td>
        <td>{{  $item->categoryType->category_type }}</td>
        <td><button class="btn btn-sm btn-danger buttonDel" type="button"  data-url="{{ route('category.index') }}" data-id="{{ $item->slug }}" data-token="{{ csrf_token() }}">Delete</button>
        </td>
       </tr>  
       @endforeach
    @else
     <tr><td colspan="4">No Records Found</td></tr>
    @endif    
  </tbody>
</table>
</div>

@section('script')
 <script type="text/javascript">

 // Delete button evnet 
 $(document).on('click', '.buttonDel', function () 
        {

         if(confirm('Do you Want To Delete This ?'))
             {
                 var id = $(this).data('id'); 
                 var token = $(this).data('token');                  
                       $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                 });

                  $.ajax( 
                            {  
                            url: $(this).data('url')+'/'+id, 
                            type: 'DELETE',
                            dataType: "JSON",
                            data: { 
                                    "id": id, 
                                    "_method": 'DELETE'
                                 },

                            success: function (result) 
                             { 
                                if(result.success=="deleted"){
                                    location.reload();    
                                }
                                   
                             },

                            error:function(result)
                                     {
                                        console.log("It failed"+JSON.stringify(result));
                       
                                     }
                            });
              }
        else
        {
             return false;
         }

        });
 </script>
 
@endsection

@endsection
