@extends('admin.layout.layout')

@section('content')
<div></div>
    <div class="container">
        <div class="row">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
    </div><br>
    {{-- <button id="export-pdf" class="btn btn-primary">Export as PDF</button><br><br> --}}
    <table class="table table-striped table-bordered">
        <thead>
           <tr>
               <th><input type="checkbox" id="select-all"></th>
               <th>S.no</th>
               <th>Product Name</th>
               <th>Category Name</th>
               <th>Price</th>
               <th>Image</th>
               <th>Extra Details</th>
               <th></th>
               <th>Action</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <td>
                        <input type="checkbox" class="category-checkbox" name="category[]" value="{{ $product->id }}">
                    </td>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        @if($product->category_id)
                            {{ @$product->category->name }}
                        @endif
                    </td>
                    <td>{{ $product->price }}</td>
                    <td><img src="{{ asset('uploads/'.$product->image) }}" style="height: 80px; width:80px;" alt=""></td>
                    <td><button><a href="{{ route('product.productDetails', $product->id) }}">Add</a></button></td>
                    <td>
                        <a id="" href="{{ url('generate-pdf/'. $product->id) }}" class="btn btn-primary">Export as PDF</a>
                    </td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" style="font-size: 17px padding:5px;">
                        <i class="fa fa-edit"></i></a>
                        <a href="" style="font-size: 17px; padding:5px" class="delete"
                        data-id="{{ $product->id }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@push('footer-script')

    <script>
        $(document).ready(function() {
            // Check/uncheck all checkboxes when "Select All" checkbox is clicked
            $('#select-all').click(function() {
                $('.category-checkbox').prop('checked', this.checked);
            });
        });
        // $('.delete').on('click', function(){
        //     if(confirm('Are you delete this product.')){
        //         var id = $(this).data('id');
        //         $.ajax({
        //             url: '{{ route("product.delete") }}',
        //             method: 'post',
        //             data:{
        //                 _token: '{{ csrf_token() }}',
        //                 'id': id
        //             },
        //             success: function(data){
        //                 console.log(data);
        //                 // location.reload();
        //             }
        //         });          
        //     }
        // });

        
        $(document).on('click', '.delete', function(e){
				e.preventDefault();
				var id = $(this).data('id');
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes delete it!'
				}).then((result) => {
					if(result.isConfirmed){
						$.ajax({
							url: '{{ route('product.delete') }}',
							method: 'post',
							data: {
								id: id,
								_token: '{{ csrf_token() }}'
							},
							success: function(res){
								Swal.fire(
									'Deleted!',
									'Customer deleted successfully.',
									'success'
								).then(() => {
                                    // Reload the page after successful deletion
                                    location.reload();
                                });
							}
						});
					}
				});
			});
    </script>
    
@endpush