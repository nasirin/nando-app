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
                <form action="/laporan/booking" method="post" target="_blank">
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
                    <!-- <div class="form-group">
                        <label>Waktu</label>
                        <select name="waktu" id="" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="bulan">Bulan ini</option>
                            <option value="tahun">Tahun ini</option>                            
                        </select>

                    </div> -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Print</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal laporan pemasukan -->
<div class="modal" tabindex="-1" role="dialog" id="laporan-pemasukan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Laporan Keuangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/laporan/keuangan" method="post" target="_blank">
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

<!-- modal laporan pengeluaran -->
<div class="modal" tabindex="-1" role="dialog" id="laporan-Pengeluaran">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Laporan Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="laporan" method="post">

                    <div class="form-group">
                        <label>Input Date</label>
                        <input type="month" class="form-control" name="date" required>
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