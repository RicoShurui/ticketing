<!-- Modal Sunting -->
<div class="modal fade" id="modalLihat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Penugasan Tiket</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="formEdit">
        <input type="hidden" name="proses" value="Edit">
        <input type="hidden" name="idLihat" id="idLihat">
        <div id="lihatBody">
          
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Sunting -->
<div class="modal fade" id="modalSelesai">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Penyelesaian Tiket</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="formSelesai">
        <input type="hidden" name="proses" value="Selesai">
        <input type="hidden" name="idSelesai" id="idSelesai">
        <div id="SelesaiBody">
          <label for="nama_lengkap" class="col-sm-12 control-label col-form-label" style="font-size:20px;">Tiket Selesai?</label>
          <div class="modal-footer">
            <input class="btn btn-info" type="submit" value="Selesai" onclick="submitData('formSelesai','ticket', event)">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>