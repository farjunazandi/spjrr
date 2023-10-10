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
                  <a class="nav-link" id="custom-tabs-four-rmibs-tab" data-toggle="pill" href="#rapor" role="tab" aria-controls="custom-tabs-four-rmibs" aria-selected="false">Rapor</a>
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
                                                                <select name="alternatif" id="alternatif" class="form-control" disabled>
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
                  <div class="tab-pane fade show" id="rapor" role="tabpanel" aria-labelledby="custom-tabs-four-rmibs-tab">
                      <div class="row">
                        <div class="form col-3 mb-3">
                          <!-- Button Model Tambah Data -->
                          <a href="#tambahRapor" class="btn btn-primary" data-toggle="modal">Tambah</a>

                          <!-- Modal Tambah Data -->
                          <div class="modal fade" id="tambahRapor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bobot Nilai Rapor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/bobotRapor" method="POST">
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
                                                  <label for="kategoriRmib">Mata Pelajaran</label>
                                                </div>
                                                <div class="col-sm-4">
                                                  <label for="bobot">Bobot</label>
                                                </div>
                                              </div>
                                            </div>
                                            @foreach ($mataPelajaran as $mapel)
                                            <div class="form-group">
                                              <div class="row">
                                                <input type="hidden" name="id_mapel[]" id="id_mapel" value="{{ $mapel->id }}">
                                                <div class="col-sm-8">
                                                  <input type="text" class="form-control" id="mapel" name="mapel[]" value="{{ $mapel->nama_mapel }}" readonly>
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
                      </div>
                      <!-- End Modal -->

                      <div class="col-12">
                        <div class="table-responsive">
                        <table id="myTable2" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th style="width: 30px">No.</th>
                              <th style="text-align:center">Jurusan</th>
                              <?php
                                $headMapels = DB::table('mata_pelajarans')
                                            ->orderBy('no', 'asc')
                                            ->get();
                                foreach ($headMapels as $headMapel) { ?>
                                    <th style="text-align:center">{{ $headMapel->nama_mapel }}</th>
                                <?php } ?>
                              <th style="text-align:center">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($bobotRapor as $bbtRpr)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $bbtRpr->rpr_alt->nama_jurusan }}</td>
                                      <?php
                                        $bRapor = DB::table('bobot_rapors')
                                                    ->where('id_alternatif', $bbtRpr->id_alternatif)
                                                    ->orderBy('id_mapel', 'asc')
                                                    ->get();
                                        foreach ($bRapor as $rapor) { ?>
                                          <td style="text-align: center">{{ $rapor->bobot }}</td>
                                        <?php } ?>
                                      <td style="text-align:center">
                                        <!-- Button Model Ubah Data -->
                                        <a href="#ubahRapor{{ $bbtRpr->id_alternatif }}" class="btn btn-success" data-toggle="modal">Ubah</a>
      
                                        <!-- Modal Ubah Data -->
                                        <div class="modal fade" id="ubahRapor{{ $bbtRpr->id_alternatif }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Ubah Data Bobot Nilai Rapor</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form action="/admin/aturbobotRapor" method="post">
                                                        @csrf
                                                          <div class="form-group">
                                                              <label for="alternatif">Jurusan</label>
                                                              <select name="alternatif" id="alternatif" class="form-control" disabled>
                                                                @foreach ($alternatif as $altf) 
                                                                <option value="{{ $altf->id }}" {{ $altf->id == $bbtRpr->id_alternatif ? 'selected' : ''}}>{{ $altf->nama_jurusan }}</option>
                                                                @endforeach
                                                              </select>
                                                          </div>
                                                          <div class="form-group">
                                                            <div class="row">
                                                              <div class="col-sm-8">
                                                                <label for="kategoriRmib">Mata Pelajaran</label>
                                                              </div>
                                                              <div class="col-sm-4">
                                                                <label for="bobot">Bobot</label>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          @foreach ($bRapor as $bRpr)
                                                          <div class="form-group">
                                                            <div class="row">
                                                              <input type="hidden" name="id[]" id="id" value="{{ $bRpr->id }}">
                                                              <div class="col-sm-8">
                                                                <?php
                                                                  $mapels = DB::table('mata_pelajarans')
                                                                                  ->where('id', $bRpr->id_mapel)->first();
                                                                ?>
                                                                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel[]" value="{{ $mapels->nama_mapel }}" readonly>
                                                              </div>
                                                              <div class="col-sm-4">
                                                                <input type="number" class="form-control" id="bobot" name="bobot[]" value="{{ $bRpr->bobot }}" required>
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
                                        <a href="#hapusRapor{{ $alt->id_alternatif }}" class="btn btn-danger" data-toggle="modal">Hapus</a>
      
                                        <!-- Modal Hapus Data -->
                                        <div class="modal fade" id="hapusRapor{{ $alt->id_alternatif}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Hapus Data Bobot Nilai Rapor</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form action="/admin/hapusbobotRapor" method="post">
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
            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- content-wrapper ends -->

  @include('admin/partial/footerAdmin')
