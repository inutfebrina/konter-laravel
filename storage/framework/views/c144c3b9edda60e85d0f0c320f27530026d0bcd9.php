

<?php $__env->startSection('title'); ?>
Update Data Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h3>Edit Data Barang</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('update-barang',$barang->id_barang)); ?>" method="post" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-groub">
                               
                            <div class="form-groub">
                                <label for="">
                                    Nama Barang
                                </label>
                                <input type="text" name="nm_barang" class="form-control" placeholder="Nama Barang"
                                    value="<?php echo e($barang->nm_barang); ?>"> </div>
                                  
                                    <div class="form-groub">
                                    <label for="">
                                Kategori
                            </label>

                            <select  name="dataapp_privat" id="dataapp_privat" class="form-control" id="">
                         
                            <option value="" disable selected>-SELECT- </option>
                          
                            <?php $__currentLoopData = $dataapp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($item->id_data); ?>" > <?php echo e($item->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <script>
                                document.getElementById('dataapp_privat').value='<?php echo e($barang->id_data); ?>'
                                </script>

                            </select>
                              
                            <?php $__errorArgs = ['dataapp_privat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <i class="text-danger"><?php echo e($message); ?></i>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                   
 </div>
 <div class="form-groub">
                          
                          <label for="">
                                 Sub Kategori
                              </label>
  
                              <select  name="kategoriapp_privat" id="kategoriapp_privat" class="form-control" id="">
                              
                              <option value="" disable selected>-SELECT- </option>
                            
                              <?php $__currentLoopData = $kategoriapp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>" > <?php echo e($item->provider); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <script>
                                document.getElementById('kategoriapp_privat').value='<?php echo e($barang->id); ?>'
                                </script>
                              </select>
                                
                              <?php $__errorArgs = ['kategoriapp_privat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <i class="text-danger"><?php echo e($message); ?></i>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                     
   </div>
                                    
                                </select> </div>
                                    <div class="form-groub">
                                <label for="">
                                    Harga Beli
                                </label>
                                <input type="text" name="harga_bl" class="form-control" placeholder="Harga Beli"
                                    value="<?php echo e($barang->harga_bl); ?>"> </div>
                                    </div>

<div class="col-md-6">
                                    <div class="form-groub">
                                     
                                <label for="">
                                    Harga Jual
                                </label>
                                <input type="text" name="harga_jl" class="form-control" placeholder="Harga Jual"
                                    value="<?php echo e($barang->harga_jl); ?>"> </div>
                        

                            <div class="form-groub">
                                <label for="">
                                    Stok
                                </label>
                                <input type="text" name="stok" class="form-control" placeholder="Stok"
                                    value="<?php echo e($barang->stok); ?>"></div>
                            
                            <div class="form-groub">
                                <label for="">
                                    Unit
                                </label>
                                <select class="form-control" name="unit" id="">
                                    <option value="">-SELECT- </option>

                                    <option value="PCS" <?=$barang->unit== 'PCS'? 'selected' : ''?>>PCS
                                    </option>
                                    <option value="Pack" <?=$barang->unit== 'Pack'? 'selected' : ''?>>Pack
                                    </option>
                                </select></div>
                                <!-- <div class="form-groub">
                            <label for="">
                                Terjual
                            </label>
                            <input type="text" name="terjual" class="form-control" placeholder="Terjual"
                                    value="<?php echo e($barang->terjual); ?>"></div> -->
                                <br />
                                
                         <div class="form-groub">
                                    <button type="submit" class="btn btn-success btn-block" > Update</button> 
                                    </div></div> </div>
                                
                                   
                               
                    
            
        </form> <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\konter\resources\views/page/editbarang.blade.php ENDPATH**/ ?>