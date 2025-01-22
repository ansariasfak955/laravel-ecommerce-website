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
    <button id="export-pdf" class="btn btn-primary">Export as PDF</button><br><br>
    <table class="table">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>S.no</th>
                <th>Category Name</th>
                <th>Parent Category Name</th>
                <th>Create Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $categorie)
                <tr>
                    <td>
                        <input type="checkbox" class="category-checkbox" name="category[]" value="{{ $categorie->id }}">
                    </td>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $categorie->name }}</td>
                    <td>
                        @if ($categorie->category_id)
                            {{ $categorie->parent->name }}
                        @else
                            No Parent Category
                        @endif
                    </td>
                    <td>{{ $categorie->created_at }}</td>
                    <td>
                        <a href="{{ route('category.edit', $categorie->id) }}" style="font-size: 17px; padding:5px"><i class="fa fa-edit"></i></a>
                        <a href="" style="font-size: 17px; padding:5px" data-id="{{ $categorie->id }}" class="category_delete"><i class="fa fa-trash"></i></a>
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
        // $('.category_delete').on('click', function(){
        //     if(confirm('Are you delete this category')){
        //         var id = $(this).data('id');
        //         $.ajax({
        //             url: "{{ route('category.delete') }}",
        //             method: 'post',
        //             data :{
        //                 _token: "{{ csrf_token() }}",
        //                 'id': id
        //             },
        //             success: function(data){
        //                 location.reload();
        //             }
        //         });
        //     }
        // });
        $(document).on('click', '.category_delete', function(e){
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
							url: '{{ route('category.delete') }}',
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