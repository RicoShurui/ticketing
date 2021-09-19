<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Tambah Data Ticket</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="formTambah">
        <input type="hidden" name="proses" value="Simpan">
        <div class="modal-body">
          <div class="alert" id="alertTambah">
            <button type="button" class="close" onclick="$('.alert').hide()">&times;</button>
            <span id="alertText"></span>
          </div>
          <div class="form-group row">
              <label for="judul" class="col-sm-3 control-label col-form-label">Judul</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
              </div>
          </div>
          <div class="form-group row">
              <label for="password" class="col-sm-3 control-label col-form-label">Keterangan</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="keterangan" placeholder="Keterangan" required></textarea>
              </div>
          </div>
          <div class="form-group row">
              <label for="nama_lengkap" class="col-sm-3 control-label col-form-label">Level</label>
              <div class="col-sm-9">
                <select class="form-control" id="level" name="level" required>
                  <option value="">----- Pilih Level -----</option>
                  <option value="1">Low</option>
                  <option value="2">Medium</option>
                  <option value="3">High</option>
                </select>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <input class="btn btn-info" type="submit" value="Simpan" onclick="submitData('formTambah','tiket', event)">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Sunting -->
<div class="modal fade" id="modalEdit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Sunting Data Ticket</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="formEdit">
        <input type="hidden" name="proses" value="Edit">
        <input type="hidden" name="idEdit" id="idEdit">
        <div id="editBody">
          
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Sunting -->
<div class="modal fade" id="modalLihat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Lihat Data Ticket</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <input type="hidden" name="idLihat" id="idLihat">
      <div id="lihatBody">
        
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Hapus Data Ticket</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="formHapus">
        <input type="hidden" name="proses" value="Hapus">
        <input type="hidden" name="idHapus" id="idHapus">
        <div class="modal-body">
          <p id="innerHapus"></p>
        </div>
        <div class="modal-footer">
          <input class="btn btn-info" type="submit" value="Hapus" onclick="submitData('formHapus','tiket', event)">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>