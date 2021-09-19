<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Tambah Data User</h4>
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
              <label for="username" class="col-sm-3 control-label col-form-label">Username</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
              </div>
          </div>
          <div class="form-group row">
              <label for="password" class="col-sm-3 control-label col-form-label">Password</label>
              <div class="col-sm-9">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              </div>
          </div>
          <div class="form-group row">
              <label for="nama_lengkap" class="col-sm-3 control-label col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
              </div>
          </div>
          <div class="form-group row">
              <label for="nama_lengkap" class="col-sm-3 control-label col-form-label">Departemen</label>
              <div class="col-sm-9">
                <select class="form-control" id="departemen" name="departemen" required>
                  <option value="">----- Pilih Departemen -----</option>
                  <option value="Information Technology">Information Technology</option>
                  <option value="Marketing">Marketing</option>
                  <option value="Finance">Finance</option>
                  <option value="Human Resource Departmen">Human Resource Departmen</option>
                  <option value="General Affair">General Affair</option>
                </select>
              </div>
          </div>
          <div class="form-group row">
              <label for="email" class="col-sm-3 control-label col-form-label">Email</label>
              <div class="col-sm-9">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
              </div>
          </div>
          <div class="form-group row">
              <label for="nama_lengkap" class="col-sm-3 control-label col-form-label">Level</label>
              <div class="col-sm-9">
                <select class="form-control" id="level" name="level" required>
                  <option value="">----- Pilih Level -----</option>
                  <option value="1">Administrator</option>
                  <option value="2">Manager</option>
                  <option value="3">User</option>
                </select>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <input class="btn btn-info" type="submit" value="Simpan" onclick="submitData('formTambah','user', event)">
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
        <h4 class="modal-title">Form Sunting Data User</h4>
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
        <h4 class="modal-title">Form Lihat Data User</h4>
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
        <h4 class="modal-title">Form Hapus Data User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="formHapus">
        <input type="hidden" name="proses" value="Hapus">
        <input type="hidden" name="idHapus" id="idHapus">
        <div class="modal-body">
          <p id="innerHapus"></p>
        </div>
        <div class="modal-footer">
          <input class="btn btn-info" type="submit" value="Hapus" onclick="submitData('formHapus','user', event)">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>