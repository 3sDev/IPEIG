 
 <?php $__env->startSection('title', 'Inscription Universitaire ISAMGF'); ?>
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
</style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <table border="0" width="100%">
                        <tr align="center">
                            <td width="30%">
                                <img src="<?php echo e(URL::asset('image/header/flag-tunisia.png')); ?>" width="12%" style="margin-top:5%;" alt="">
                                <p style="text-align: center; font-size:10px">Republique Tunisienne <br>
                                    Ministère d'Enseignement<br>
                                    supérieur de la recherche Scientifique<br>
                                    Université de Gafsa</p>
                            </td>
                            <td width="30%"><img src="<?php echo e(URL::asset('image/header/republiqueTunisienne.png')); ?>" width="12%"  alt=""></td>
                            <td width="30%"><img src="<?php echo e(URL::asset('image/header/logo.png')); ?>" width="17%" alt=""></td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="background-color: #F8F8F6;">
                    
                    <div class="row">
                        <div class="col-md-12">

                            <div class="img-login">
                                <center>
                                    <img src="image/background-inscription.jpg" alt="Inscription issat" width="40%" height="80%">
                                </center>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <center>
                                <div class="mb-12">
                                    <br>
                                    <h4>تسجيل الطلبة للسنة الجامعية 2023/2022</h4>
                                    <br>
                                    <a href="<?php echo e(url('login-verify')); ?>" class="btn btn-primary text-center">طباعة بطاقة الإرشادات (للمسجلين فقط)</a>
                                    
                                    <a href="<?php echo e(url('inscription-new')); ?>" class="btn btn-danger text-center">تسجيل الطلبة</a>
                                </div>
                            </center>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/IPEIG/inscription/resources/views/auth/login.blade.php ENDPATH**/ ?>