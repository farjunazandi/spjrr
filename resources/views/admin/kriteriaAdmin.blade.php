@include('admin/partial/headerAdmin')
@include('admin/partial/sidebarAdmin')
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Data Kriteria</h3>
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
        <div class="card card-primary card-outline card-outline-tabs">
          <div class="card-header">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#bobot" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"> Kriteria dan Bobot</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#normalisasi" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Normalisasi Kriteria</a>
                </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="bobot" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                        <div class="form col-3 mb-3">
                            <!-- Button Model Tambah Data -->
                            <a href="#tambah" class="btn btn-primary" data-toggle="modal">Tambah</a>
                        </div>

                        <!-- Modal Tambah Data -->
                        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/kriteriaAdmin" method="POST">
                                          @csrf
                                            <div class="form-group">
                                                <label for="kode_kriteria">Kode Kriteria</label>
                                                <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" placeholder="Kode Kriteria" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_kriteria">Nama Kriteria</label>
                                                <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="Nama Kriteria" required>
                                            </div>
                                            <div class="form-check form-check-flat form-check-primary mb-2">
                                              <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="kriteria_rapor">
                                                Kriteria Rapor
                                              </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="bobot_kriteria">Bobot Kriteria</label>
                                                <input type="number" class="form-control" id="bobot_kriteria" name="bobot_kriteria" required>
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
                        <div class="col-12">
                            <div class="table-responsive">
                            <table id="myTable" class="display expandable-table" style="width:100%">
                              <thead>
                                <tr>
                                  <th style="width: 30px">No.</th>
                                  <th style="text-align:center">Kode Kriteria</th>
                                  <th style="text-align:center">Nama Kriteria</th>
                                  <th style="text-align:center">Nilai Bobot</th>
                                  <th style="text-align:center">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($kriteria as $krt)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td style="text-align: center">{{ $krt->kode_kriteria }}</td>
                                          <td>{{ $krt->nama_kriteria }}</td>
                                          <td style="text-align: center">{{ $krt->bobot_kriteria }}%</td>
                                          <td style="text-align:center">
                                            <!-- Button Model Ubah Data -->
                                            <a href="#ubah{{ $krt->id }}" class="btn btn-success" data-toggle="modal">Ubah</a>
          
                                            <!-- Modal Ubah Data -->
                                            <div class="modal fade" id="ubah{{ $krt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kriteria</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <form action="/admin/kriteriaAdmin/{{ $krt->id }}" method="post">
                                                            @method('put')
                                                            @csrf
                                                              <input type="hidden" class="form-control" name="id" value="{{ $krt->id }}">
                                                              <div class="form-group">
                                                                  <label for="kode_kriteria">Kode Kriteria</label>
                                                                  <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" value="{{ $krt->kode_kriteria }}" required autofocus>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label for="nama_kriteria">Nama Kriteria</label>
                                                                  <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{ $krt->nama_kriteria }}" required>
                                                              </div>
                                                              <div class="form-check form-check-flat form-check-primary mb-2">
                                                                  <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input" name="kriteria_rapor" {{ $krt->kriteria_rapor == 1 ? 'checked' : ''}}>
                                                                    Kriteria Rapor
                                                                  </label>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label for="bobot_kriteria">Bobot Kriteria</label>
                                                                  <input type="number" class="form-control" id="bobot_kriteria" name="bobot_kriteria" value="{{ $krt->bobot_kriteria }}" required>
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
                                            <a href="#hapus{{ $krt->id }}" class="btn btn-danger" data-toggle="modal">Hapus</a>
          
                                            <!-- Modal Hapus Data -->
                                            <div class="modal fade" id="hapus{{ $krt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kriteria</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <form action="/admin/kriteriaAdmin/{{ $krt->id }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                              <input type="hidden" class="form-control" name="id" value="{{ $krt->id }}">
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
                <div class="tab-pane fade" id="normalisasi" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                            <table id="myTable2" class="display expandable-table" style="width:100%">
                              <thead>
                                <tr>
                                  <th style="width: 30px">No.</th>
                                  <th style="text-align:center">Kode Kriteria</th>
                                  <th style="text-align:center">Nama Kriteria</th>
                                  <th style="text-align:center">Nilai Bobot</th>
                                  <th style="text-align:center">Normalisasi</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($kriteria as $krt)
                                      <tr>
                                          <td style="width: 30px">{{ $loop->iteration }}.</td>
                                          <td style="text-align: center">{{ $krt->kode_kriteria }}</td>
                                          <td>{{ $krt->nama_kriteria }}</td>
                                          <td style="text-align: center">{{ $krt->bobot_kriteria }}%</td>
                                          <td style="text-align: center">{{ $krt->bobot_kriteria/100 }}</td>
                                      </tr>
                                  @endforeach
                              </tbody>
                              <tfoot>
                                  <tr style="text-align: center">
                                      <th style="width: 30px"></th>
                                      <th colspan="2" style="text-align: center">Jumlah</th>
                                      <th style="text-align: center">100%</th>
                                      <th style="text-align: center">1</th>
                                  </tr>
                              </tfoot>
                            </table>
                            </div>
                        </div>
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
