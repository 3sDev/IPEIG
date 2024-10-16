<?php $__env->startSection('title', 'Classe étudiants'); ?>
<?php $__env->startSection('contentPage'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Gestion des absences</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Gestion des absences</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


<link rel="stylesheet" href="<?php echo e(URL::asset('css/ajaxSelect.css')); ?>" />
<style>
    .btn-link{color: white;}
    .btn-link:hover{color: white;}
    .demandEncours {
    background-color: #f0550e8c;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 10%;
}

.demandTraitee {
    background-color: #43f00e83;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 10%;
}
</style>
    <div class="row">
        <div class="col-md-12">

            <?php if($errors->any()): ?>
                <ul class="alert alert-warning">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li> <?php echo e($error); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h5>Choisir une classe pour gérer les absences
                        <a href="<?php echo e(url('dashboards')); ?>" class="btn btn-danger float-right">Retour</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="container" style="margin-top: 10px;">
                        <form action="<?php echo e(url('create-attendances')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <b>Liste des classes</b>
                                        <select name="classe_id" class="form-control" required>
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($classe->id); ?>"> <?php echo e($classe->abbreviation); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>                                    
                                    </div>
                                    <br>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <b>Choisir Date</b>
                                        <input type="date" name="dateattendance" id="dateID" class="form-control" required>                                    
                                    </div>
                                    <br>
                                </div>

                                </div>

                                <div class="col-lg-2"></div>
                                
                            </div>

                            <div class="form-group">
                                <center>
                                    <button type="submit" class="btn btn-primary btn-info btn-just-icon like text-center">Ajouter</button>
                                </center>
                            </div>
                        </form>

                        <hr><br>
                        <h4><b>Liste de tous les absences</b></h4><br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th >Enseignant</th>
                                    <th >Classe</th>
                                  	<th >Etudiant</th>
                                    <th >Matière</th>
                                    <th>Date</th>
                                    <th>Seance</th>
                                    <th >Justification</th>
                                    <th width="4%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $absElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                <td>
                                    <?php if($absElement->qui_save_absent == 'Enseignant'): ?>
                                        <span class="demandEncours">Enseignant</span>
                                    <?php else: ?> 
                                        <span class="demandTraitee">Scolarité</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($absElement->teacher->full_name); ?></td>
                                <td><span><?php echo e($absElement->classe->abbreviation); ?></span></td>
                                <td><span><?php echo e($absElement->student->nom.' '.$absElement->student->prenom); ?></span></td>
                                <td><?php echo e($absElement->matiere->subjectLabel); ?></td>
                                <td><?php echo e(date('Y-m-d', strtotime($absElement->attendance_date))); ?></td>
                                <td><?php echo e($absElement->attendance_seance_debut); ?> | <?php echo e($absElement->attendance_seance_fin); ?></td>
                                <td>
                                    <?php if((empty($absElement->justification))): ?>
                                        <span class="demandEncours">Non justifié</span>
                                    <?php else: ?> 
                                    
                                        <span class="demandTraitee">Justifié <i class="fa fa-info-circle" title="<?php echo e($absElement->justification); ?>" aria-hidden="true"></i></span>
                                    <?php endif; ?>
                                </td>
                                
                                
                                <td align="center">
                                    <?php if($absElement->qui_save_absent == 'Enseignant'): ?>
                                        -
                                    <?php else: ?> 
                                    <form action="<?php echo e(url('delete-attendance-student/'.$absElement->id)); ?>" onsubmit="return confirm('Are you sure to delete this data?')">
                                        <button type="submit" class="btn btn-link btn-danger btn-just-icon remove btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    </form>
                                    <?php endif; ?>
                                </td>
                                </tr>
    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th >Enseignant</th>
                                    <th >Classe</th>
                                  	<th >Etudiant</th>
                                    <th >Matière</th>
                                    <th>Date</th>
                                    <th>Seance</th>
                                    <th >Justification</th>
                                    <th width="4%"></th>
                                </tr>
                            </tfoot>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $('select option').each(
        function () {
            $(this).attr("title", $(this).text());
    });
</script>
<script>
    //Display Only Date till today // 
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#dateID').attr('max', maxDate);

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicescolarite/resources/views/attendance/class.blade.php ENDPATH**/ ?>