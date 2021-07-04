<div class="modal" tabindex="-1" role="dialog" id="laporan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="laporan" method="post">
                    <div class="form-group">
                        <label for="">Laporan</label>
                        <select name="laporan" id="" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="booking">Laporan Booking</option>
                            <option value="tunggakan">Laporan Tunggakan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>
                        <select name="laporan" id="" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="bulanan">Bulanan</option>
                            <option value="tahunan">Tahunan</option>
                        </select>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Print</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="kebutuhan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Kebutuhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kebutuhan" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Keterangan <small>*</small></label>
                        <input type="text" name="keterangan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal <small>*</small></label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Biaya <small>*</small></label>
                        <input type="number" min="0" name="biaya" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Note </label>
                        <textarea name="note" class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="/kebutuhan" class="btn btn-info">Lihat Data</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>