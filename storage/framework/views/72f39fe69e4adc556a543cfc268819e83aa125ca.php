

<?php $__env->startSection('title'); ?>
Data Barang
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
                    <h3> Data Barang</h3>
                </div>
                <div class="float-right">
                    <a href="<?php echo e(route('inputbarang')); ?>" class="btn btn-info btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th> No</th>
                            <th> Kategori</th>
                            <th> Sub Kategori</th>
                            <th> Nama Barang</th>
                            <th> Harga Beli</th>
                            <th> Harga Jual</th>
                            <th> Stok</th>
                            <th> Unit</th>
                            <!-- <th> Terjual</th>
                            <th> Provit</th> -->
                            <th> Aksi</th>
                        </tr>
                    <tbody>
                        <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $isi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> <?php echo e($i+1); ?></td>
                            <td> <?php echo e($isi->nama); ?> </td>
                           <td> <?php echo e($isi->provider); ?> </td>
                            <td> <?php echo e($isi->nm_barang); ?> </td>
                            <td> <?php echo e($isi->harga_bl); ?> </td>
                            <td> <?php echo e($isi->harga_jl); ?> </td>
                            <td> <?php echo e($isi->stok); ?> </td>
                            <td> <?php echo e($isi->unit); ?> </td>
                            
                            
                            <td><a href="<?php echo e(route('edit-barang',$isi->id_barang)); ?>" class="btn btn-warning"><i
                                        class="fa fa-edit"></i> </a>
                                <a href="<?php echo e(route('hapus-barang',$isi->id_barang)); ?>" class="btn btn-danger"><i
                                        class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                    </thead>
                    
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\konter\resources\views/page/barang.blade.php ENDPATH**/ ?>