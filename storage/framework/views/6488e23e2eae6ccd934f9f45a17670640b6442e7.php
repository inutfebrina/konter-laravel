

<?php $__env->startSection('title'); ?>
Input Data Transaksi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data Transaksi</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('simpan-keranjang')); ?>" method="post" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Barang</label>
                                <select name="id_barang" id="id_barang" value="" class="form-control">
                                    <option value="">- PILIH -</option>
                                    <?php $__currentLoopData = $barangapp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($a->id_barang); ?>"><?php echo e($a->nm_barang); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">    
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea class="form-control" name="keterangan"></textarea>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-groub">
                        <button type="submit" class="btn btn-success btn-block"> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- data belanja -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php ($totals = 0); ?>
                        <?php $__currentLoopData = $keranjangtmps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x => $isi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($totals = $totals + $isi->total); ?>
                        <tr>
                            <td><?php echo e($x+1); ?></td>
                            <td><?php echo e($isi->nm_barang); ?></td>
                            <td><?php echo e($isi->terjual); ?></td>
                            <td><?php echo e($isi->ket); ?></td>
                            <td><?php echo e($isi->total); ?></td>
                            <td>
                                <a href="" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- data pembayaran -->
    <div class="col-md-12">
        <div class="card">
            <form action="<?php echo e(route('simpan-trans')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" readonly name="invoice" value="<?php echo e($invoice); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="text" class="form-control" id="total" name="total_belanja" value="<?php echo e($totals); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Bayar</label>
                                <input type="text" class="form-control" name="bayar" onkeyup="bayarBelanja(this)">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Kembali</label>
                                <input type="text" class="form-control" name="kembali" id="kembalix" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <br>
                            <button type="submit" class="btn btn-success">Bayar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

        <script>
            function bayarBelanja(isi)
            {
                var bayar = isi.value
                var total = $('#total').val()
                var hasil = parseInt(bayar) - parseInt(total)
                $('#kembalix').val(hasil)
            }

            function getdata() {
                var id_barang = $('#barangapp_privat option:selected').val();
                // alert(id_barang)
                $.ajax({

                        url: '<?php echo e(route("data")); ?>',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            id_barang: id_barang,
                        },
                    })
                    .done(function (response) {
                        if (response.message == 'ok') {
                            console.log(response.data.harga_jl)
                            // $('#subkategori').prepend(`<option value="${response.data.id_data}" > ${response.data.nama} </option>`)
                            $('#kategori').val(response.data.nama);
                            $('#subkategori').val(response.data.provider);
                            $('#harga_jl').val(response.data.harga_jl);
                            $('#unit').val(response.data.unit);

                        }
                    })
                    .fail(function () {
                        console.log("error");
                    })
            }

            function totalHarga() {
                var terjual = $('#terjual').val();
                var harga_jl = $('#harga_jl').val();

                // alert(harga_jl)
                if (harga_jl == '') {
                    alert("Pilih Barang")
                } else {
                    var total = parseInt(terjual) * parseInt(harga_jl);
                    $('#total').val(total);
                }
            }

        </script>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\konter\resources\views/page/inputtrans.blade.php ENDPATH**/ ?>