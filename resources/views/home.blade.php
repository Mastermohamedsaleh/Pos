
@extends('dashboard.app')



@extends('dashboard._aside')

@section('content')


<div class="content-wrapper">

<section class="content-header">

                <div class="row">

{{-- categories--}}
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3>{{ $categories_count }}</h3>

            <p>@lang('site.categories')</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="{{URL('categories')}}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

{{--products--}}
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
        <div class="inner">
            <h3>{{ $products_count }}</h3>

            <p>@lang('site.products')</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{URL('prodects')}}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

{{--clients--}}
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
        <div class="inner">
            <h3>{{ $clients_count }}</h3>

            <p>@lang('site.clients')</p>
        </div>
        <div class="icon">
            <i class="fa fa-user"></i>
        </div>
        <a href="{{URL('clients')}}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

{{--users--}}



@if(auth()->user()->hasPermission('users_read'))
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
        <div class="inner">
            <h3>{{ $users_count }}</h3>

            <p>@lang('site.users')</p>
        </div>
        <div class="icon">
            <i class="fa fa-users"></i>
        </div>
        <a href="{{URL('users')}}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
@endif


</div><!-- end of row -->


</section><!-- end of content -->

</div><!-- end of content wrapper -->



















@endsection
