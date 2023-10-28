
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SB Admin 2 - Tables</title>
   @include('template.header')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       @include('template.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               @include('template.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Task</h1>
                    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tasks </h6>   
                            <div class="float-right">
                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                data-bs-whatever="@mdo">Tambah Data Tasks</button> --}}
                                <button type="button" class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambahtask">
                                    <i class="fas fa-tasks fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Tambah Task
                                </button>
                            </div>    
                        </div>
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>User_id</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>User_id</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @forelse ($tasks as $row )
                                            
                                       
                                        <tr id="tr_{{$row->id}}">
                                            <td>{{$row->name}}</td>
                                            <td>{{Str::words($row->deskripsi, 20, ' ...') }}</td>
                                            <td>
                                            @if($row->status ==1)
                                            <div class="alert alert-success" role="alert">
                                                Selesai
                                              </div>
                                              @else
                                              <div class="alert alert-warning" role="alert">
                                                Proses
                                                @endif
                                              </div>    
                                            </td>
                                            <td>{{$row->user->name}}</td>
                                            <td>
                                                {{-- <a href="javascript:void(0)"onclick="deletepost({{$row->id}})" class="btn btn-danger">Delete</a>  --}}
                                            <a href="javascript:void(0);" class="delete-data btn btn-danger" data-id="{{ $row->id }}">Hapus</a>
                                        </td>
                                        </tr>
                                        @empty
                                            
                                      
                                        <tr>
                                            <td>Data Masih Kosong</td>
                                            <td>Data Masih Kosong</td>
                                            <td>Data Masih Kosong</td>
                                            <td>Data Masih Kosong</td>
                                            <td>Data Masih Kosong</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <div class="modal fade" id="tambahtask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tasks</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/addtasks" method="POST" enctype="multipart/form-data">
                            @csrf
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Tasks:</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="recipient-name">
                            @error('name')
                             <span class="text-danger">{{$message}}</span>                                   
                            @enderror

                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Deskripsi:</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="message-text"></textarea>
                            @error('deskripsi')
                            <span class="text-danger">{{$message}}</span>                                   
                           @enderror
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Status :</label>
                            <select class="custom-select @error('status') is-invalid @enderror mr-sm-2" name="status" id="inlineFormCustomSelect">
                              <option selected>Choose...</option>
                              <option value="1">Selesai</option>
                              <option value="2">Proses</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}}</span>                                   
                           @enderror
                          </div>
                          <div class="form-group">
                            <input type="text" name="user_id" class="form-control" id="recipient-name" value="{{Auth::user()->id}}" hidden>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama User:</label>
                            <input type="text" name="" class="form-control" id="recipient-name" value="{{Auth::user()->name}}" disabled>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlFile1">File Tasks</label>
                            <input type="file" name="img" class="form-control-file @error('img') is-invalid @enderror" id="exampleFormControlFile1">
                            @error('img')
                            <span class="text-danger">{{$message}}</span>                                   
                           @enderror
                          </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
            <!-- Footer -->
            @include('template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   @include('template.script')

   {{-- <script type="text/javascript">
    function deletepost(id){
        if(confirm("Apa Kamu Yakin Ingin Hapus Data Ini !!")){
            $.ajaxSetup({
                headers:
                {
                    'X-CRSF-TOKEN':$('meta[name="crsf-toke"]').attr('content')
                }
            });
            $.ajax({
                url:'delete_post'+id,
                type:'DELETE',

                success:function(result){

                }
            })
        }

    }

   </script> --}}
   <script>
    $(document).ready(function () {
        
        $('.delete-data').on('click', function () {
            var id = $(this).data('id');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            if (confirm('Anda yakin ingin menghapus data ini?')) {
                $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
});
                $.ajax({
                    type: 'DELETE',
                    url: '/delete_post/' + id,
                    success: function (data) {
                        $("#"+result['tr']).slideUp("slow");
                        alert(data.message);
                        // Jika Anda ingin melakukan tindakan tambahan, Anda dapat menambahkannya di sini
                    },
                    error: function (data) {
                        alert(data.responseJSON.message);
                    }
                });
            }
        });
    });
</script>

</body>

</html>