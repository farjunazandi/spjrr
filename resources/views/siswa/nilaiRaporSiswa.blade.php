@include('siswa/partial/headerSiswa')
@include('siswa/partial/sidebarSiswa')
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Data Nilai Rapor</h3>
          </div>
          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success'); }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @if(session()->has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error'); }}
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
            <div>
                <table style="font-size: 20px">
                    <tbody>
                      <tr>
                        <td>NISN</td>
                        <td style="width: 30%; text-align :center;">:</td>
                        <td>{{ $siswa->nisn }}</td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td style="width: 30%; text-align :center;">:</td>
                        <td>{{ $siswa->nama }}</td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td style="width: 30%; text-align :center;">:</td>
                        <td>{{ $siswa->jenis_kelamin == 0 ? 'Laki-laki' : 'Perempuan' }}</td>
                      </tr>
                      <tr>
                        <td>Kelas</td>
                        <td style="width: 30%; text-align :center;">:</td>
                        <td>{{ $siswa->kls->nama_kelas }}</td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
              <div class="col-12 pt-3">
                <a class="btn btn-success btn-icon-text" href="{{ url('/siswa/submitRapor') }}"><i class="ti-file btn-icon-prepend"></i>Submit</a>
              </div>
            </div>
            <div class="mt-4">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#nilai" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Nilai Rapor</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#lampiran" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Lampiran</a>
                    </li>
                </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="nilai" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                        @if ($submit == 0)
                          @if ($count == 0)
                          <div class="form col-3 mb-3">
                              <!-- Button Model Tambah Data -->
                              <a href="#inputNilai" class="btn btn-primary" data-toggle="modal">Input Nilai Rapor</a>
                          </div>
                          @else
                          <div class="form col-3 mb-3">
                              <!-- Button Model Tambah Data -->
                              <a href="#ubahNilai" class="btn btn-primary" data-toggle="modal">Ubah Nilai Rapor</a>
                          </div>
                          @endif
                        @endif

                        <!-- Modal Input Data -->
                        <div class="modal fade" id="inputNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Rapor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/siswa/raporSiswa" method="POST">
                                          @csrf
                                            <div class="form-group">
                                              <div class="row">
                                                <div class="col-sm-8">
                                                  <label for="mapel">Mata Pelajaran</label>
                                                </div>
                                                <div class="col-sm-2">
                                                  <label for="semester1">Nilai Semester 1</label>
                                                </div>
                                                <div class="col-sm-2">
                                                  <label for="semester2">Nilai Semester 2</label>
                                                </div>
                                              </div>
                                            </div>
                                            @foreach ($mataPelajaran as $mapel1)
                                                <div class="form-group">
                                                  <div class="row">
                                                    <div class="col-sm-8">
                                                      <input type="hidden" class="form-control" id="id_mapel" name="id_mapel[]" value="{{ $mapel1->id }}">
                                                      <input type="text" class="form-control" id="mapel" name="mapel" value="{{ $mapel1->nama_mapel }}" readonly>
                                                    </div>
                                                    <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="semester1" name="semester1[]" step="any" required>
                                                    </div>
                                                    <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="semester2" name="semester2[]" step="any" required>
                                                    </div>
                                                  </div>
                                                </div>
                                            @endforeach
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

                        <!-- Modal Ubah Data -->
                        <div class="modal fade" id="ubahNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Ubah Nilai Rapor</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="/siswa/updateRapor" method="POST">
                                        @csrf
                                          <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-8">
                                                <label for="mapel">Mata Pelajaran</label>
                                              </div>
                                              <div class="col-sm-2">
                                                <label for="semester1">Nilai Semester 1</label>
                                              </div>
                                              <div class="col-sm-2">
                                                <label for="semester2">Nilai Semester 2</label>
                                              </div>
                                            </div>
                                          </div>
                                          @foreach ($nilaiRapor as $nRapor)
                                              <div class="form-group">
                                                <div class="row">
                                                  <div class="col-sm-8">
                                                    <input type="hidden" class="form-control" id="id" name="id[]" value="{{ $nRapor->id }}">
                                                    <input type="hidden" class="form-control" id="id_mapel" name="id_mapel[]" value="{{ $nRapor->id_mapel }}">
                                                    <input type="text" class="form-control" id="mapel" name="mapel" value="{{ $nRapor->mapel->nama_mapel }}" readonly>
                                                  </div>
                                                  <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="semester1" name="semester1[]" step="any" value="{{ $nRapor->semester1 }}" required>
                                                  </div>
                                                  <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="semester2" name="semester2[]" step="any" value="{{ $nRapor->semester2 }}" required>
                                                  </div>
                                                </div>
                                              </div>
                                          @endforeach
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

                        <div class="col-12">
                            <div class="table-responsive">
                            <table id="myTable" class="display expandable-table" style="width:100%">
                              <thead>
                                <tr>
                                  <th style="width: 30px">No.</th>
                                  <th style="text-align:center">Mata Pelajaran</th>
                                  <th style="text-align:center">Semester 1</th>
                                  <th style="text-align:center">Semester 2</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($nilaiRapor as $nilaiRpr)
                                      <tr>
                                          <td>{{ $loop->iteration }}.</td>
                                          <td>{{ $nilaiRpr->mapel->nama_mapel }}</td>
                                          <td style="text-align: center">{{ $nilaiRpr->semester1 }}</td>
                                          <td style="text-align: center">{{ $nilaiRpr->semester2 }}</td>
                                      </tr>
                                  @endforeach
                              </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="lampiran" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card-body">
                            @if (empty($lampiranRapor))
                            <form action="/siswa/lampiranRapor" method="post" enctype="multipart/form-data">
                            @csrf
                              <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                              <div class="form-group">
                                <label class="form-label">File</label>
                                <input class="form-control" type="file" id="formFile" name="fileRapor" accept=".pdf" required>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              </div>
                            </form>
                            @else
                            @if ($submit == 0)
                              <div class="btn-group col-5" role="group" aria-label="Basic example">
                                <!-- Button Model Ubah Lampiran -->
                                <a href="#ubahLampiran" class="btn btn-primary" data-toggle="modal"><i class="fas fa-pen"> Ubah Lampiran</i></a>
                              </div>
                            @endif
          
                            <!-- Modal Ubah Lampiran -->
                            <div class="modal fade" id="ubahLampiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Ubah Lampiran</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form action="/siswa/lampiranRapor/{{ $lampiranRapor->id }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                              <input type="hidden" name="id" value="{{ $lampiranRapor->id }}">
                                              <input type="hidden" name="oldFile" value="{{ $lampiranRapor->file }}">
                                              <div class="form-group">
                                                <label class="form-label">File</label>
                                                <input class="form-control" type="file" id="formFile" name="fileRapor" accept=".pdf">
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

                              <div class="form-group">
                                <label for="namaFile">Nama File</label>
                                <input type="text" class="form-control" id="fileKajian" name="fileRapor" value="{{ $lampiranRapor->nama_file }}" readonly>
                              </div>
                            @endif
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

  @include('siswa/partial/footerSiswa')
