@include('admin/partial/headerAdmin')
@include('admin/partial/sidebarAdmin')
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Data Bobot Nilai RMIB dan Rapor</h3>
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
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-four-rmibs-tab" data-toggle="pill" href="#rmibs" role="tab" aria-controls="custom-tabs-four-rmibs" aria-selected="false">RMIB</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-bahasa-tab" data-toggle="pill" href="#bahasa" role="tab" aria-controls="custom-tabs-four-bahasa" aria-selected="false">Bahasa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-logika-tab" data-toggle="pill" href="#logika" role="tab" aria-controls="custom-tabs-four-logika" aria-selected="false">Logika</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-sains-tab" data-toggle="pill" href="#sains" role="tab" aria-controls="custom-tabs-four-sains" aria-selected="false">Sains</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-sosial-tab" data-toggle="pill" href="#sosial" role="tab" aria-controls="custom-tabs-four-sosial" aria-selected="false">Sosial</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-praktik-tab" data-toggle="pill" href="#praktik" role="tab" aria-controls="custom-tabs-four-praktik" aria-selected="false">Praktik</a>
                </li>
            </ul>
          </div>
          <div class="card-body">
              <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="rmibs" role="tabpanel" aria-labelledby="custom-tabs-four-rmibs-tab">
                    <div class="row">
                      <div class="form col-3 mb-3">
                          <!-- Button Model Tambah Data -->
                          <a href="#tambah" class="btn btn-primary" data-toggle="modal">Tambah</a>

                          <!-- Modal Tambah Data -->
                          <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bobot Nilai RMIB</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/bobotRmib" method="POST">
                                          @csrf
                                            <div class="form-group">
                                                <label for="alternatif">Jurusan</label>
                                                <select name="alternatif" id="alternatif" class="form-control">
                                                  <option value="null">-- Pilih Jurusan --</option>
                                                  @foreach ($alternatif as $altf) 
                                                  <option value="{{ $altf->id }}">{{ $altf->nama_jurusan }}</option>
                                                  @endforeach                                                  
                                                </select>
                                            </div>
                                            <div class="form-group">
                                              <div class="row">
                                                <div class="col-sm-8">
                                                  <label for="kategoriRmib">Kategori RMIB</label>
                                                </div>
                                                <div class="col-sm-4">
                                                  <label for="bobot">Bobot Kategori</label>
                                                </div>
                                              </div>
                                            </div>
                                            @foreach ($kategoriRmib as $kat)
                                            <div class="form-group">
                                              <div class="row">
                                                <input type="hidden" name="id_kategoriRmib[]" id="id_kategoriRmib" value="{{ $kat->id }}">
                                                <div class="col-sm-8">
                                                  <input type="text" class="form-control" id="kategoriRmib" name="kategoriRmib[]" value="{{ $kat->kategori }}" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                  <input type="number" class="form-control" id="bobot" name="bobot[]" required>
                                                </div>
                                              </div>
                                            </div>
                                            @endforeach
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
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
                                <th style="text-align:center">Jurusan</th>
                                <?php
                                  $kategori = DB::table('kategori_rmibs')
                                              ->orderBy('id', 'asc')
                                              ->get();
                                  foreach ($kategori as $kat) { ?>
                                      <th style="text-align:center">{{ $kat->kategori }}</th>
                                  <?php } ?>
                                <th style="text-align:center">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($bobotRmib as $alt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $alt->bbt_alt->nama_jurusan }}</td>
                                        <?php
                                          $bRmib = DB::table('bobot_rmibs')
                                                      ->where('id_alternatif', $alt->id_alternatif)
                                                      ->orderBy('id_kategoriRmib', 'asc')
                                                      ->get();
                                          foreach ($bRmib as $rmib) { ?>
                                            <td style="text-align: center">{{ $rmib->bobot }}</td>
                                          <?php } ?>
                                        <td style="text-align:center">
                                          <!-- Button Model Ubah Data -->
                                          <a href="#ubah{{ $alt->id_alternatif }}" class="btn btn-success" data-toggle="modal">Ubah</a>
        
                                          <!-- Modal Ubah Data -->
                                          <div class="modal fade" id="ubah{{ $alt->id_alternatif }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Bobot Nilai RMIB</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/admin/aturbobotRmib" method="post">
                                                          @csrf
                                                            <div class="form-group">
                                                                <label for="alternatif">Jurusan</label>
                                                                <select name="alternatif" id="alternatif" class="form-control">
                                                                  @foreach ($alternatif as $altf) 
                                                                  <option value="{{ $altf->id }}" {{ $altf->id == $alt->id_alternatif ? 'selected' : ''}}>{{ $altf->nama_jurusan }}</option>
                                                                  @endforeach                                                  
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                              <div class="row">
                                                                <div class="col-sm-8">
                                                                  <label for="kategoriRmib">Kategori RMIB</label>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                  <label for="bobot">Bobot Kategori</label>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            @foreach ($bRmib as $kat)
                                                            <div class="form-group">
                                                              <div class="row">
                                                                <input type="hidden" name="id[]" id="id" value="{{ $kat->id }}">
                                                                <div class="col-sm-8">
                                                                  <?php
                                                                    $kategori = DB::table('kategori_rmibs')
                                                                                    ->where('id', $kat->id_kategoriRmib)->first();
                                                                  ?>
                                                                  <input type="text" class="form-control" id="kategoriRmib" name="kategoriRmib[]" value="{{ $kategori->kategori }}" readonly>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                  <input type="number" class="form-control" id="bobot" name="bobot[]" value="{{ $kat->bobot }}" required>
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
        
                                          <!-- Button Model Hapus Data -->
                                          <a href="#hapus{{ $alt->id_alternatif }}" class="btn btn-danger" data-toggle="modal">Hapus</a>
        
                                          <!-- Modal Hapus Data -->
                                          <div class="modal fade" id="hapus{{ $alt->id_alternatif}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Bobot Nilai RMIB</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/admin/hapusbobotRmib" method="post">
                                                          @csrf
                                                            <input type="hidden" class="form-control" name="id_alternatif" value="{{ $alt->id_alternatif }}">
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
                  <div class="tab-pane fade" id="bahasa" role="tabpanel" aria-labelledby="custom-tabs-four-bahasa-tab">
                    <div class="row">
                      <div class="col-3 mb-3">
                        <!-- Button Model Tambah Data -->
                        <a href="#aturNilai" class="btn btn-primary" data-toggle="modal">Atur Bobot Nilai</a>
                      </div>
                      <div class="col-12">
                        <div class="table-responsive">
                          <table id="myTable" class="display expandable-table" style="width:100%">
                            <thead>
                              <tr>
                                <th style="width: 30px" rowspan="2">No.</th>
                                <th style="text-align:center" rowspan="2">Jurusan</th>
                                <th style="text-align: center" colspan="5">Nilai Bobot Kriteria Bahasa</th>
                              </tr>
                              <tr>
                                <th style="text-align: center">1</th>
                                <th style="text-align: center">2</th>
                                <th style="text-align: center">3</th>
                                <th style="text-align: center">4</th>
                                <th style="text-align: center">5</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($bobotRmib as $alt)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $alt->bbt_alt->nama_jurusan }}</td>
                                        <td style="text-align: center">1</td>
                                        <td style="text-align: center">2</td>
                                        <td style="text-align: center">3</td>
                                        <td style="text-align: center">4</td>
                                        <td style="text-align: center">5</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="logika" role="tabpanel" aria-labelledby="custom-tabs-four-logika-tab">
                    <h3>hallo</h3>
                  </div>
                  <div class="tab-pane fade" id="sains" role="tabpanel" aria-labelledby="custom-tabs-four-sains-tab">
                    <h3>hallo</h3>
                  </div>
                  <div class="tab-pane fade" id="sosial" role="tabpanel" aria-labelledby="custom-tabs-four-sosial-tab">
                  </div>
                  <div class="tab-pane fade" id="praktik" role="tabpanel" aria-labelledby="custom-tabs-four-praktik-tab">
                  </div>
              </div>
          </div>
          </div>
        </div>
      </div>
  </div>
  <!-- content-wrapper ends -->

  @include('admin/partial/footerAdmin')
