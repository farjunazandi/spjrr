@include('admin/partial/headerAdmin')
@include('admin/partial/sidebarAdmin')
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Data Soal RMIB</h3>
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
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Soal RMIB</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="/admin/soalRmib" method="POST">
                            @csrf
                              <div class="form-group">
                                  <label for="nama_pekerjaan">Nama Pekerjaan</label>
                                  <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" placeholder="Nama Pekerjaan" required autofocus>
                              </div>
                              <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                  @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="tipe_soal">Tipe Soal</label>
                                <select name="tipe_soal" id="tipe_soal" class="form-control">
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                                  <option value="F">F</option>
                                  <option value="G">G</option>
                                  <option value="H">H</option>
                                  <option value="I">I</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                  <option value="0">Laki-laki</option>
                                  <option value="1">Perempuan</option>
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
                        <th style="text-align:center">Nama Pekerjaan</th>
                        <th style="text-align:center">Kategori</th>
                        <th style="text-align:center">Tipe Soal</th>
                        <th style="text-align:center">Jenis Kelamin</th>
                        <th style="text-align:center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($soalRmib as $soal)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $soal->nama_pekerjaan }}</td>
                                <td>{{ $soal->kategori->kategori }}</td>
                                <td style="text-align:center">{{ $soal->tipe_soal }}</td>
                                <td style="text-align:center">{{ $soal->jenis_kelamin == 0 ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td style="text-align:center">
                                  <!-- Button Model Ubah Data -->
                                  <a href="#ubah{{ $soal->id }}" class="btn btn-success" data-toggle="modal">Ubah</a>

                                  <!-- Modal Ubah Data -->
                                  <div class="modal fade" id="ubah{{ $soal->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Soal RMIB</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/soalRmib/{{ $soal->id }}" method="post">
                                                  @method('put')
                                                  @csrf
                                                  <input type="hidden" class="form-control" name="id" value="{{ $soal->id }}">
                                                    <div class="form-group">
                                                        <label for="nama_pekerjaan">Nama Pekerjaan</label>
                                                        <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" value="{{ $soal->nama_pekerjaan }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="kategori">Kategori</label>
                                                      <select name="kategori" id="kategori" class="form-control">
                                                        @foreach ($kategori as $kat)
                                                          <option value="{{ $kat->id }}" {{ $kat->id == $soal->id_kategori ? 'selected' : ''}}>{{ $kat->kategori }}</option>
                                                        @endforeach
                                                      </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipe_soal">Tipe Soal</label>
                                                        <select name="tipe_soal" id="tipe_soal" class="form-control">
                                                            <option value="A" {{ $soal->tipe_soal == 'A' ? 'selected' : ''}}>A</option>
                                                            <option value="B" {{ $soal->tipe_soal == 'B' ? 'selected' : ''}}>B</option>
                                                            <option value="C" {{ $soal->tipe_soal == 'C' ? 'selected' : ''}}>C</option>
                                                            <option value="D" {{ $soal->tipe_soal == 'D' ? 'selected' : ''}}>D</option>
                                                            <option value="E" {{ $soal->tipe_soal == 'E' ? 'selected' : ''}}>E</option>
                                                            <option value="F" {{ $soal->tipe_soal == 'F' ? 'selected' : ''}}>F</option>
                                                            <option value="G" {{ $soal->tipe_soal == 'G' ? 'selected' : ''}}>G</option>
                                                            <option value="H" {{ $soal->tipe_soal == 'H' ? 'selected' : ''}}>H</option>
                                                            <option value="I" {{ $soal->tipe_soal == 'I' ? 'selected' : ''}}>I</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                            <option value="0" {{ $soal->jenis_kelamin == 0 ? 'selected' : ''}}>Laki-laki</option>
                                                            <option value="1" {{ $soal->jenis_kelamin == 1 ? 'selected' : ''}}>Perempuan</option>
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
                                  <a href="#hapus{{ $soal->id }}" class="btn btn-danger" data-toggle="modal">Hapus</a>

                                  <!-- Modal Hapus Data -->
                                  <div class="modal fade" id="hapus{{ $soal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Soal RMIB</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/soalRmib/{{ $soal->id }}" method="post">
                                                  @method('delete')
                                                  @csrf
                                                    <input type="hidden" class="form-control" name="id" value="{{ $soal->id }}">
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
