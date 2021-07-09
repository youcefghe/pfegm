@extends('layouts.moderator')
@section('modera')
    <div class="col-md-8 shadow-lg" style="background: white;">
    <div class="container ">
        <h2 class="mb-4 mt-3 h2">Members :</h2>
        <table class="table table-bordered datatable">
            <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Posts</th>
                <th>Reported</th>
                <th>Joined at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    </div>

        <script type="text/javascript">
            $(document).ready(function() {
                // init datatable.
                var str = window.location.pathname;
                var n = str.lastIndexOf('/');
                var result = str.substring(n + 1);
                // $.ajax({
                //         url : '/members/list/'+result,
                //         type: "GET",
                //
                //     success:function(response){
                //         console.log(response);
                //                             },
                // });

                var dataTable = $('.datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    pageLength: 5,
                    // scrollX: true,
                    "order": [[0, "asc"]],
                    ajax: {
                        url : '/members/list/'+result,
                        type: "GET",
                    },
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'picture', name: 'picture', orderable: false, searchable: false},
                        {data: 'name', name: 'name'},
                         {data: 'posts_count', name: 'posts_count'},
                        {data: 'reported', name: 'reported'},
                        {data: 'pivot_created_at', name: 'pivot_created_at'},
                        {data: 'action', name: 'action', orderable: false, serachable: false, sClass: 'text-center'},
                    ]
                });
            });
    </script>
@endsection
@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
@endsection
