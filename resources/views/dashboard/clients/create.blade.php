@extends('dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.clients')</h1>

            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href=""> @lang('site.clients')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
                <div class="box-body">


                
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                    <form action="{{ route('clients.store') }}" method="post">

                         @csrf
                        {{ method_field('post') }}

                     
                        <div class="form-group">
                        <input type="text" class="form-control m-2" name="name_ar" placeholder="Arabic client" >
                        </div>
                        
                        <div class="form-group">
                        <input type="text" class="form-control m-2" name="name_en" placeholder="English client" >
                        </div>
                        
                        <?php   for($i = 0 ; $i < 2 ; $i++ ) :   ?>
                        <div class="form-group">
                        <input type="text" class="form-control m-2" name="phone[]" placeholder="<?php if($i == 0){echo 'Phone';}else{echo  "Other Phone"; }   ?>" >
                        </div>     
                        <?php endfor;  ?>
 


                       <div class="form-group">
                        <input type="text" class="form-control m-2" name="address_en" placeholder="Address En" >
                        </div>

                        <div class="form-group">
                        <input type="text" class="form-control m-2" name="address_ar" placeholder="Address Ar" >
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection