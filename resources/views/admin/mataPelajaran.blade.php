@include('admin/partial/headerAdmin')
@include('admin/partial/sidebarAdmin')
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Data Mata Pelajaran</h3>
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
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="/admin/mataPelajaran" method="POST">
                            @csrf
                              <div class="form-group">
                                  <label for="nomor">Nomor</label>
                                  <input type="text" class="form-control" id="nomor" name="nomor" required autofocus>
                              </div>
                              <div class="form-group">
                                  <label for="nama_mapel">Nama Mata Pelajaran</label>
                                  <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Nama Mata Pelajaran" required>
                              </div>
                              <div class="form-group">
                                  <label for="kode_mapel">Kode Mata Pelajaran</label>
                                  <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" placeholder="Kode Mata Pelajaran" required autofocus>
                              </div>
                              <div class="form-group">
                                  <label for="kriteria">Kriteria</label>
                                  <select name="kriteria" id="kriteria" class="form-control">
                                    @foreach ($kriteria as $krt)
                                      <option value="{{ $krt->id }}">{{ $krt->nama_kriteria }}</option>
                                    @endforeach
                                  </select>
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
                        <th style="text-align:center">Kode Mata Pelajaran</th>
                        <th style="text-align:center">Nama Mata Pelajaran</th>
                        <th style="text-align:center">Kriteria</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($mataPelajaran as $mapel)
                            <tr>
                                <td>{{ $mapel->no }}.</td>
                                <td>{{ $mapel->kode_mapel }}</td>
                                <td>{{ $mapel->nama_mapel }}</td>
                                <td>{{ $mapel->krt->nama_kriteria }}</td>
                                <td>{{ $mapel->aktif == 0 ? 'Tidak Aktif' : 'Aktif' }}</td>
                                <td style="text-align:center">
                                  <!-- Button Model Ubah Data -->
                                  <a href="#ubah{{ $mapel->id }}" class="btn btn-success" data-toggle="modal">Ubah</a>

                                  <!-- Modal Ubah Data -->
                                  <div class="modal fade" id="ubah{{ $mapel->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Mata Pelajaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/mataPelajaran/{{ $mapel->id }}" method="post">
                                                  @method('put')
                                                  @csrf
                                                  <input type="hidden" class="form-control" name="id" value="{{ $mapel->id }}">
                                                  <div class="form-group">
                                                      <label for="nomor">Nomor</label>
                                                      <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $mapel->no }}" required autofocus>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="nama_mapel">Nama Mata Pelajaran</label>
                                                      <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="{{ $mapel->nama_mapel }}" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="kode_mapel">Kode Mata Pelajaran</label>
                                                      <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" value="{{ $mapel->kode_mapel }}" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="kriteria">Kriteria</label>
                                                      <select name="kriteria" id="kriteria" class="form-control">
                                                        @foreach ($kriteria as $krt)
                                                          <option value="{{ $krt->id }}"  {{ $mapel->id_kriteria == $krt->id ? 'selected' : '' }}>{{ $krt->nama_kriteria }}</option>
                                                        @endforeach
                                                      </select>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="aktif">Aktif</label>
                                                      <select class="form-control" name="aktif">
                                                        <option value="0" {{ $mapel->aktif == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                                                        <option value="1" {{ $mapel->aktif == 1 ? 'selected' : ''}}>Akif</option>
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
                                  <a href="#hapus{{ $mapel->id }}" class="btn btn-danger" data-toggle="modal">Hapus</a>

                                  <!-- Modal Hapus Data -->
                                  <div class="modal fade" id="hapus{{ $mapel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Mata Pelajaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/mataPelajaran/{{ $mapel->id }}" method="post">
                                                  @method('delete')
                                                  @csrf
                                                    <input type="hidden" class="form-control" name="id" value="{{ $mapel->id }}">
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
