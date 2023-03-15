@extends('dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.categories')</h1>

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="#"> @lang('site.categories')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

              

                    <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        {{ method_field('put') }}

                  

                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name_ar" class="form-control" value="{{ $category->getTranslation('name', 'ar') }}">
                        </div>
                        
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name_en" class="form-control" value="{{ $category->getTranslation('name', 'en') }}">
                        </div>


               
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection