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
    </div>
    <table class="table table-striped table-bordered">
        <thead>
           <tr>
               <th>S.no</th>
               <th>Name</th>
               <th>Email</th>
               <th>Role</th>
               <th>Date</th>
               <th>Action</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        {{-- <a href="{{ route('product.edit', $product->id) }}" style="font-size: 17px padding:5px;">
                        <i class="fa fa-edit"></i></a> --}}
                        <a href="" style="font-size: 17px; padding:5px" class="delete"
                        data-id="{{ $user->id }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@push('footer-script')

    <script>
        // $('.delete').on('click', function(){
        //     if(confirm('Are you delete this user.')){
        //         var id = $(this).data('id');
        //         $.ajax({
        //             url: '{{ route("user.delete") }}',
        //             method: 'post',
        //             data:{
        //                 _token: '{{ csrf_token() }}',
        //                 'id': id
        //             },
        //             success: function(data){
        //                 location.reload();
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
                        url: '{{ route('user.delete') }}',
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