@extends('dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.setting')</h1>

            @if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
@endif


            <ol class="breadcrumb">
                <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.users')</li>
            </ol>
        </section>




        <section class="content">




        <div class="box box-primary">



<div class="container">






<div class="row">


           
 
<div class="col-md-6"  style="margin-top:200px">


<form action="{{url('setting_update', $user->id )}}"  method="post" enctype="multipart/form-data">

@csrf

<input type="file"  name="new_image" class="form-control ">
 

 <input type="hidden" name="old_image" value = "{{$user->image}}">


 <button  class="btn btn-primary " style="margin-top:10px" >Update</button>


</form>

 
    
</div>    <!-- end  col One -->


<div class="col-md-6">
 
 
<img src="{{ asset('uploads/users/' .  image()   ) }}" alt="User Image"  style="width : 200px">

 
</div>   <!-- end col two -->


</div>     <!-- end row -->




</div>
 












        </div>



           </section>
</div>



@endsection