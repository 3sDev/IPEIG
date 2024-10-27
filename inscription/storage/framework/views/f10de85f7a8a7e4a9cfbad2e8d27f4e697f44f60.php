 
 <?php $__env->startSection('title', 'Imprimer fiche d\'inscription'); ?>
 <?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
  </div><!-- /.container-fluid -->
</div>

<link rel="stylesheet" href="<?php echo e(URL::asset('css/components.css')); ?>" />
<style>
.textable {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 1; /* number of lines to show */
   -webkit-box-orient: vertical;
}
.form-control{
    width: 100% !important;
}
.label{
    text-align: right !important;
}
</style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <table border="0" width="100%">
                        <tr align="center">
                            <td width="10%"><a href="<?php echo e(url('login')); ?>" class="btn btn-secondary text-center"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></td>
                            <td width="30%">
                                <img src="<?php echo e(URL::asset('image/header/flag-tunisia.png')); ?>" width="12%" style="margin-top:5%;" alt="">
                                <p style="text-align: center; font-size:10px">Republique Tunisienne <br>
                                    Ministère d'Enseignement<br>
                                    supérieur de la recherche Scientifique<br>
                                    Université de Gafsa
                                </p>
                            </td>
                            <td width="30%"><img src="<?php echo e(URL::asset('image/header/republiqueTunisienne.png')); ?>" width="12%"  alt=""></td>
                            <td width="30%"><img src="<?php echo e(URL::asset('image/header/logo.png')); ?>" width="17%" alt=""></td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="background-color: #F8F8F6;">
                    <form action="<?php echo e(url('verification')); ?>" id="regForm" method="POST" onsubmit="return confirm('Confirmation!')" class="register-wizard-box" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <?php if(!empty($successMsg)): ?>
                                <div class="alert alert-success"> <?php echo e($successMsg); ?></div>
                            <?php endif; ?>
                            <div class="col-md-12">
                                <br><br><center><h4>طباعة بطاقة الإرشادات (للمسجلين فقط)</h4></center><br><br>
                            </div>

                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group" style="text-align: right !important;">
                                    <label >رقم الهاتف</label>
                                    <p><input type="number" id="tel" name="tel" class="form-control" placeholder="" required></p>
                                </div><br>
                                <div class="form-group" style="text-align: right !important;">
                                    <label>رقم بطاقة التعريف الوطنية</label>
                                    <p><input type="number" id="cin" name="cin" class="form-control" placeholder="" required></p>
                                </div>
                                <br> 
                                <center>
                                    <input type="submit" class="btn btn-primary text-center" value="تسجيل الدخول">
                                </center>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <div class="mb-12">
                                        <br><br>
                                        
                                    </div>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
<script>
    cin.oninput = function () {
        if (this.value.length > 8) {
            this.value = this.value.slice(0,8); 
        }
    }

    tel.oninput = function () {
        if (this.value.length > 8) {
            this.value = this.value.slice(0,8); 
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/IPEIG/inscription/resources/views/auth/verify.blade.php ENDPATH**/ ?>