@extends('admin.layout.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Product Details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form action="{{ route('product.productDetailsStore', $id) }}" class="form-horizontal form-label-left" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Title <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="title" class="form-control col-md-7 col-xs-12" value="{{ @$product->ProductDetail->title }}" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Title Items<span class="required"></span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="total_items" value="{{ @$product->ProductDetail->total_items }}" class="form-control col-md-7 col-xs-12" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="description" id="" rows="5" class="control-label col-md-3 col-sm-3 col-xs-12" required="">{{ @$product->ProductDetail->description }}</textarea>
                            </div>
                        </div>
                        <div class="In_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection