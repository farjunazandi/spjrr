@include('admin/partial/headerAdmin')
@include('admin/partial/sidebarAdmin')
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Data Kelas</h3>
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
                          <form action="/admin/kelasAdmin" method="POST">
                            @csrf
                              <div class="form-group">
                                  <label for="nama_kelas">Nama Kelas</label>
                                  <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas" required autofocus>
                              </div>
                              <div class="form-group">
                                  <label for="aktif">Aktif</label>
                                  <select name="aktif" id="aktif" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
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
                        <th style="text-align:center">Nama Kelas</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $kls)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kls->nama_kelas }}</td>
                                <td>{{ $kls->aktif == 0 ? 'Tidak Aktif' : 'Aktif' }}</td>
                                <td style="text-align:center">
                                  <!-- Button Model Ubah Data -->
                                  <a href="#ubah{{ $kls->id }}" class="btn btn-success" data-toggle="modal">Ubah</a>

                                  <!-- Modal Ubah Data -->
                                  <div class="modal fade" id="ubah{{ $kls->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kelas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/kelasAdmin/{{ $kls->id }}" method="post">
                                                  @method('put')
                                                  @csrf
                                                  <input type="hidden" class="form-control" name="id" value="{{ $kls->id }}">
                                                  <div class="form-group">
                                                      <label for="nama_kelas">Nama Kelas</label>
                                                      <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ $kls->nama_kelas }}" required autofocus>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="aktif">Aktif</label>
                                                      <select class="form-control" name="aktif">
                                                        <option value="0" {{ $kls->aktif == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                                                        <option value="1" {{ $kls->aktif == 1 ? 'selected' : ''}}>Akif</option>
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
                                  <a href="#hapus{{ $kls->id }}" class="btn btn-danger" data-toggle="modal">Hapus</a>

                                  <!-- Modal Hapus Data -->
                                  <div class="modal fade" id="hapus{{ $kls->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kelas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/kelasAdmin/{{ $kls->id }}" method="post">
                                                  @method('delete')
                                                  @csrf
                                                    <input type="hidden" class="form-control" name="id" value="{{ $kls->id }}">
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
