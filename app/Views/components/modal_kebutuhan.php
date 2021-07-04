<?php if ($kebutuhan) : ?>
    <?php foreach ($kebutuhan as $data) : ?>
        <div class="modal" tabindex="-1" role="dialog" id="kebutuhan<?= $data['id_kebutuhan'] ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Kebutuhan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/kebutuhan/ubah/<?= $data['id_kebutuhan'] ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label>Keterangan <small>*</small></label>
                                <input type="text" name="keterangan" class="form-control" required value="<?= $data['kebutuhan'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal <small>*</small></label>
                                <input type="date" name="tanggal" class="form-control" required value="<?= $data['tanggal'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Biaya <small>*</small></label>
                                <input type="number" min="0" name="biaya" class="form-control" required value="<?= $data['biaya'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Note </label>
                                <textarea name="note" class="form-control" cols="30" rows="10"><?= $data['note'] ?></textarea>
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
    <?php endforeach; ?>
<?php endif; ?>