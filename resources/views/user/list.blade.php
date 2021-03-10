@extends('master')

@section('panel')
    <main>
       <div class="container mt-n10" style="padding-top:122px;">
            <div class="card mb-4">
                <div class="card-header">User List</div>
                <div class="heading-elements"><a href="{{url('/create')}}" type="button" class="btn btn-primary">Add New</a>
                </div>
                <div class="card-body">
                    <div class="datatable table-responsive">
                        <table class="table table-bordered table-hover" id="user-table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</main>
@endsection

@push('scripts')
<script>
$(function() {
	var table = $('#user-table').DataTable({
		
       "serverSide": true,
		ajax:{
			url: '{!! url('/data') !!}',
		},
		"pageLength": 10,
		"responsive" : false,
		columns: [
		    {"width": "5%", data: 'DT_RowIndex', name:'id', "className": "text-center", orderable: true, searchable: false},
			{"width": "20%", data: 'fullName', "className": "text-left"},
			{"width": "20%", data: 'email', "className": "text-center"},
			{"width": "20%", data: 'action', orderable: false, searchable: false, "className": "text-center"},
		]
	});
	
	
	//Ajax Delete
	$('#user-table tbody').on( 'click', '.user-del', function () {
		var	id = $(this).attr('data-id');
		var ele = $(this);
		
		swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger m-l-10',
			preConfirm: function (email) {
				 return new Promise(function (resolve, reject) {
						var url = "{{url('delete/')}}";
						
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						  });
						  
						$.ajax({
							method: "GET",
							url: url,
							data: { id: id},
							success: function(data) {
							
								resolve();
								table.ajax.reload();
							},
						});
				    })
			},
			allowOutsideClick: false
		}).then(function (email) {
			swal(
				'Deleted!',
				'Record has been deleted.',
				'success'
			)
		})
	});
});
</script>
@endpush