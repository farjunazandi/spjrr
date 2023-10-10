@include('admin/partial/headerAdmin')
@include('admin/partial/sidebarAdmin')
    
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Atur Bobot Nilai Rapor</h3>
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
              <a href="{{ url('/admin/bobotRmib') }}" class="btn btn-secondary">Kembali</a>
              <h4>Nilai {{ $kriteria->nama_kriteria }}</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <form action="/admin/bobotRapor" method="POST">
                  @csrf
                    <div class="form-group">
                        <label for="alternatif">Kriteria</label>
                        <input type="hidden" name="id_kriteria" id="id_kriteria" value="{{ $kriteria->id }}">
                        <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" value="{{ $kriteria->nama_kriteria }}" readonly>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-8">
                          <label for="kategoriRmib">Jurusan</label>
                        </div>
                        <div class="col-sm-4">
                          <label for="bobot">Bobot Nilai</label>
                        </div>
                      </div>
                    </div>
                    @foreach ($alternatif as $alt)
                    <div class="form-group">
                      <div class="row">
                        <input type="hidden" name="id_alternatif[]" id="id_alternatif" value="{{ $alt->id }}">
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan[]" value="{{ $alt->nama_jurusan }}" readonly>
                        </div>
                        <div class="col-sm-4">
                          <input type="number" class="form-control" id="bobot" name="bobot[]" required>
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
        </div>
      </div>
  </div>
  <!-- content-wrapper ends -->

  @include('admin/partial/footerAdmin')
