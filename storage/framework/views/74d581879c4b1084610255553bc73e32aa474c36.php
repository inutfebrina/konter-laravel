

<?php $__env->startSection('title'); ?>
Data Transaksi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php if(session('success')== TRUE): ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?php echo e(session("success")); ?>',
        showConfirmButton: false,
        timer: 1500

    })

</script>
<?php endif; ?>

<?php if(session('error')== TRUE): ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: '<?php echo e(session("error")); ?>',
        showConfirmButton: false,
        timer: 1500

    })

</script>

<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="fload-left">
                    <h3> Data Transaksi</h3>
                </div>
                <div class="float-right">
                    <a href="<?php echo e(route('inputtrans')); ?>" class="btn btn-info btn-sm" >Tambah Data</a>
                    
                </div>
                <div class="form-inline">
                    <form action="<?php echo e(route('filtertgl')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <label for="">Filter Berdasarkan Tanggal :  &nbsp
                            <input type="date" name="tanggal" class="form-control"> &nbsp
                        <button type="submit" class="btn btn-warning"><i
                                            class="fa fa-search"></i> </button></label>
                    </form>
                </div>
            </div>
           
                <div class="card-body">
                     <div class="row">
              
</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th> No</th>
                                <th> ID Transaksi</th>
                                <th> Tanggal Transaksi</th>
                                <th> Invoice Transaksi</th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $isi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <?php echo e($i+1); ?></td>
                                <td> TRANS-0<?php echo e($isi->id_trans); ?> </td>
                                <td> <?php echo e($isi->tgl); ?> </td>
                                <td> <?php echo e($isi->invoice); ?> </td>

                                <td>
                                    <a href="<?php echo e(route('det-trans',$isi->id_trans)); ?>" class="btn btn-secondary"><i
                                            class="fa fa-info"></i>
                                    </a>
                                    <a href="<?php echo e(route('cetak-trans',$isi->id_trans)); ?>" class="btn btn-info"><i
                                            class="fa fa-print"></i>
                                    </a>


                                    <a href="<?php echo e(route('hapus-trans',$isi->id_trans)); ?>" class="btn btn-danger"><i
                                            class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\mediatama\konter\resources\views/page/trans.blade.php ENDPATH**/ ?>