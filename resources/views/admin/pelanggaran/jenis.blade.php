<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <a class="btn btn-success" href="javascript:void(0)" id="createNewJenpel"> Create New Jenpel</a>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th width="300px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
       
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="jenpelForm" name="jenpelForm" class="form-horizontal">
                       <input type="hidden" name="jenpel_id" id="jenpel_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukan Jenis" value="" maxlength="50" required="">
                            </div>
                        </div>
          
                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@stack('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('admin/pelanggaran/jenis') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'jenis_pelanggaran', name: 'jenis_pelanggaran', orderable: false},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          $('#createNewJenpel').click(function () {
              $('#saveBtn').val("create-jenpel");
              $('#jenpel_id').val('');
              $('#jenpelForm').trigger("reset");
              $('#modelHeading').html("Create New Jenpel");
              $('#ajaxModel').modal('show');
          });
          $('body').on('click', '.editJenpel', function () {
            var jenpel_id = $(this).data('id');
            $.get("{{ url('admin/pelanggaran/jenis') }}" +'/' + jenpel_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Jenpel");
                $('#saveBtn').val("edit-jenpel");
                $('#ajaxModel').modal('show');
                $('#jenpel_id').val(data.id);
                $('#jenis').val(data.jenis);
            })
         });
          $('#saveBtn').click(function (e) {
              e.preventDefault();
              $(this).html('Save');
          
              $.ajax({
                data: $('#jenpelForm').serialize(),
                url: "{{ url('admin/pelanggaran/jenis') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
           
                    $('#jenpelForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
               
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
          });
          
          $('body').on('click', '.deleteJenpel', function () {
           
              var jenpel_id = $(this).data("id");
              confirm("Are You sure want to delete !");
            
              $.ajax({
                  type: "DELETE",
                  url: "{{ url('admin/pelanggaran/jenis') }}"+'/'+jenpel_id,
                  success: function (data) {
                      table.draw();
                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
              });
          });
           
        });
      </script>
<!-- dataTables -->
{{-- <script src={{asset("plugins/datatables/jquery.dataTables.js")}}></script> --}}
