

<?php $__env->startSection('title'); ?>
Update Data User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h3>Edit Data user</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('update-user',$user->id)); ?>" method="post" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                        
                            <div class="form-groub">
                                <label for="">
                                    Nama
                                </label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama"
                                    value="<?php echo e($user->nama); ?>"> </div>

                            <div class="form-groub">
                                <label for="">
                                    No Telpon
                                </label>
                                <input type="text" name="no_telp" class="form-control" placeholder="No Telpon"
                                    value="<?php echo e($user->no_telp); ?>"> </div>
                            <div class="form-groub">
                                <label for="">
                                    Alamat
                                </label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat"
                                    value="<?php echo e($user->alamat); ?>"> </div>
                        </div>

                        <div class="col-md-6">



                            <div class="form-groub">
                                <label for="">
                                    Email
                                </label>
                                <input type="text" name="email" class="form-control" placeholder="Email"
                                    value="<?php echo e($user->email); ?>"></div>
                            <div class="form-groub">
                                <label for="">
                                    Gambar
                                </label>
                                <input type="file" name="gambar" class="form-control"></div>

                            <div class="form-groub">
                                <label for="">
                                    Jenis Kelamin
                                </label>
                                <select class="form-control" name="jk" id="">
                                    <option value="">-SELECT- </option>

                                    <option value="laki-laki" <?=$user->jk== 'laki-laki'? 'selected' : ''?>>laki-laki
                                    </option>
                                    <option value="perempuan" <?=$user->jk== 'perempuan'? 'selected' : ''?>>perempuan
                                    </option>
                                </select></div>
                            <br />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for=""> Gambar Lama</label>
                        <img src="<?php echo e(asset('gambar/'.$user->gambar)); ?>" width="30%" alt="">
                    </div>
            </div>

            <button type="submit" class="btn btn-success btn-block"> Update</button>
        </div>
        </form> <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\konter\resources\views/page/edituser.blade.php ENDPATH**/ ?>