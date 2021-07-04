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