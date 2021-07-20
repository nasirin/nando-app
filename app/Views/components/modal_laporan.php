<!-- modal laporan booking -->
<div class="modal" tabindex="-1" role="dialog" id="laporan-booking">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Laporan Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/invoice/booking" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="pending">Pending</option>
                            <option value="success">Success</option>
                            <option value="telat">Telat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Bayar</label>
                        <input type="date" name="tglBayar" required class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnBooking" class="btn btn-primary">Print</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal laporan pemasukan -->
<div class="modal" tabindex="-1" role="dialog" id="laporan-pemasukan-bulanan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Laporan Keuangan Bulanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/invoice/keuangan/bulanan" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Input Date</label>
                        <input type="month" class="form-control" name="date" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Print</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="laporan-pemasukan-tahunan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Laporan Keuangan Tahunan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/invoice/keuangan/tahunan" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Input Date</label>
                        <select name="tahun" id="yearpicker" class="form-control"></select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Print</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>