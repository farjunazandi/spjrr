@include('admin/partial/headerAdmin')
@include('admin/partial/sidebarAdmin')
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Data Admin</h3>
          </div>
          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success'); }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-header">
            <div class="form col-3">
              <!-- Button Model Tambah Data -->
              <a href="#tambah" class="btn btn-primary" data-toggle="modal">Tambah</a>
            </div>

            <!-- Modal Tambah Data -->
            <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="/admin/dataAdmin" method="POST">
                            @csrf
                              <div class="form-group">
                                  <label for="name">Nama</label>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required autofocus>
                              </div>
                              <div class="form-group">
                                  <label for="nama">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                              </div>
                              <div class="form-group">
                                  <label for="role">Role</label>
                                  <select name="role" id="role" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="Operator">Operator</option>
                                  </select>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Tambah</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
            </div>
            <!-- End Modal -->
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="myTable" class="display expandable-table" style="width:100%">
                    <thead>
                      <tr>
                        <th style="width: 30px">No.</th>
                        <th style="text-align:center">Nama</th>
                        <th style="text-align:center">Username</th>
                        <th style="text-align:center">Role</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->username }}</td>
                                <td style="text-align:center">{{ $admin->role }}</td>                          
                                @if($admin->aktif == 0)         
                                <td style="text-align: center">
                                  <!-- Button Model activate Data -->
                                  <a href="#activate{{ $admin->id }}" class="btn btn-secondary" data-toggle="modal">Nonaktif</a>

                                  <!-- Modal aktivate Data -->
                                  <div class="modal fade" id="activate{{ $admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Aktifkan Pengguna</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/dataAdmin/activate" method="post">
                                                  @csrf
                                                    <input type="hidden" class="form-control" name="id" value="{{ $admin->id }}">
                                                    <h4>Apakah anda yakin untuk mengaktifkan pengguna ini?</h4>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <!-- End Modal -->
                                </td>         
                                @else
                                <td style="text-align: center">
                                  <!-- Button Model deactivate Data -->
                                  <a href="#deactivate{{ $admin->id }}" class="btn btn-primary" data-toggle="modal">Aktif</a>

                                  <!-- Modal deactivate Data -->
                                  <div class="modal fade" id="deactivate{{ $admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Nonaktifkan Pengguna</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/dataAdmin/deactivate" method="post">
                                                  @csrf
                                                    <input type="hidden" class="form-control" name="id" value="{{ $admin->id }}">
                                                    <h4>Apakah anda yakin untuk nonaktifkan pengguna ini?</h4>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <!-- End Modal -->
                                </td>       
                                @endif
                                <td style="text-align:center">
                                  <!-- Button Model Ubah Data -->
                                  <a href="#ubah{{ $admin->id }}" class="btn btn-success" data-toggle="modal">Ubah</a>

                                  <!-- Modal Ubah Data -->
                                  <div class="modal fade" id="ubah{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/dataAdmin/{{ $admin->id }}" method="post">
                                                  @method('put')
                                                  @csrf
                                                  <input type="hidden" class="form-control" name="id" value="{{ $admin->id }}">
                                                  <div class="form-group">
                                                      <label for="name">Nama</label>
                                                      <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required autofocus>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="username">Username</label>
                                                      <input type="text" class="form-control" id="username" name="username" value="{{ $admin->username }}" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="role">Role</label>
                                                      <select class="form-control" name="role">
                                                        <option value="Admin" {{ $admin->role == 'Admin' ? 'selected' : ''}}>Admin</option>
                                                        <option value="Operator" {{ $admin->role == 'Operator' ? 'selected' : ''}}>Operator</option>
                                                      </select>
                                                  </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <!-- End Modal -->

                                  <!-- Button Model Hapus Data -->
                                  <a href="#hapus{{ $admin->id }}" class="btn btn-danger" data-toggle="modal">Hapus</a>

                                  <!-- Modal Hapus Data -->
                                  <div class="modal fade" id="hapus{{ $admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/dataAdmin/{{ $admin->id }}" method="post">
                                                  @method('delete')
                                                  @csrf
                                                    <input type="hidden" class="form-control" name="id" value="{{ $admin->id }}">
                                                    <h4>Apakah anda yakin untuk menghapus data ini?</h4>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <!-- End Modal -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- content-wrapper ends -->

  @include('admin/partial/footerAdmin')
