<div class="mb-3">
	<div class="col-md">
		<small class="text-light fw-semibold d-block mb-3">Database Settings</small>
		<div class="row my-3">
			<div class="col-md-12">
				<button type="button" class="btn btn-primary" id="export_database">Export</button>
			</div>
		</div>
		<div class="card-datatable table-responsive">
		  <table id="database_table" class="datatables-basic table border-top">
		    <thead>
		      <tr class="mt-2">
		        <th>id</th>
		        <th>Name</th>
		        <th>Email</th>
		      </tr>
		    </thead>
		  </table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {

		$('#database_table').DataTable({
			dom: '<"row"<"col-md-2"l><"col-md-7"B><"col-md-3"f>><"row"<"col-md-12 my-3"t>><"row mb-3"<"col"i><"col"p>>',
			processing: true,
        	serverSide: true,
        	ajax: '<?= site_url('settings/database_table'); ?>'
		});

	});
</script>
	