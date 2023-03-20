@extends('dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.add_order')</h1>



</section>

<section class="content">




            <div class="row">
<div class="col-md-6 bg-primary">
 @foreach($categories as $category)
<div class="card">
    <div class="card-header bg-info text-center">
        <h2 class="p-3">
  <a  data-toggle="collapse"  href="#{{ str_replace(' ', '-', $category->name) }}"  >{{$category->name}}</a>
</h2>
    </div>
    <div class="card-body" id="{{ str_replace(' ', '-', $category->name) }}" class="panel-collapse collapse">




@if ($category->products->count() > 0)

    <table class="table table-hover">
        <tr>
            <th>@lang('site.name')</th>
            <th>@lang('site.stock')</th>
            <th>@lang('site.price')</th>
            <th>@lang('site.add')</th>
        </tr>

        @foreach ($category->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ number_format($product->sale_price, 2) }}</td>
                <td>
                    <a href=""
                       id="product-{{ $product->id }}"
                       data-name="{{ $product->name }}"
                       data-id="{{ $product->id }}"
                       data-price="{{ $product->sale_price }}"
                       class="btn btn-success btn-sm add-product-btn">
                        <i class="fa fa-plus"></i>
                    </a>
                </td>
            </tr>
        @endforeach

    </table><!-- end of table -->

@else
    <h5>@lang('site.no_records')</h5>
@endif


    </div>
</div>
@endforeach

<!-- End Col -->
</div>







<div class="col-md-6 ">




                
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h1></h1>
    </div>
    <div class="card-body bg-info">



<form action="{{ url('orders_store') }}" method="post">

 
@csrf


<input type="hidden" name="client_id" value="{{$client_id}}">

      <table  class="table table-hover" >
        <tr>
             <th>@lang('site.product')</th>
             <th>@lang('site.quantity')</th>
             <th>@lang('site.price')</th>
         </tr>
<tbody class="order-list">

</tbody>




      </table>

      <h4>@lang('site.total') : <span class="total-price">0</span></h4>
  
      <input type="hidden" name="total_price" class="total-price_input">
     

      <button class="btn btn-primary btn-block disabled" id="add-order-form-btn"><i class="fa fa-plus"></i> @lang('site.add_order')</button>

      </form>
    </div>


</div>


<!-- End Col -->
</div>

            </div>


</section>

</div>

@endsection
