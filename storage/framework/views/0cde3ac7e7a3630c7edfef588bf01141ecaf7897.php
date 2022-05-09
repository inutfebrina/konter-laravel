

<?php $__env->startSection('title'); ?>
Data User
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
                    <h3> Data user</h3>
                </div>
                <div class="float-right">
                    <a href="<?php echo e(route('inputuser')); ?>" class="btn btn-info btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th> No</th>
                            <th> Nama</th>
                            <th> No Telpon</th>
                            <th> Alamat</th>
                            <th> Email</th>
                            <th> Gambar</th>
                            <th> Jenis Kelamin</th>
                            <th> Aksi</th>
                        </tr>
                    <tbody>
                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $isi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> <?php echo e($i+1); ?></td>
                            <td width="18%" > <?php echo e($isi->nama); ?> </td>
                            <td> <?php echo e($isi->no_telp); ?> </td>
                            <td width="15%" > <?php echo e($isi->alamat); ?> </td>
                            <td> <?php echo e($isi->email); ?> </td>
                            <td> <img src="<?php echo e(asset('gambar/'.$isi->gambar)); ?>" width="30%"  alt=""> </td>
                            <td> <?php echo e($isi->jk); ?> </td>

                            <td><a href="<?php echo e(route('edit-user',$isi->id)); ?>" class="btn btn-warning"><i
                                        class="fa fa-edit"></i> </a>
                                <a href="<?php echo e(route('hapus-user',$isi->id)); ?>" class="btn btn-danger"><i
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

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\konter\resources\views/page/user.blade.php ENDPATH**/ ?>