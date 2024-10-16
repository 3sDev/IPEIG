<?php $__env->startSection('title', 'Pointage Enseignants'); ?>
<?php $__env->startSection('contentPage'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Gestion des pointages</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Gestion des pointages</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


<style>
.demandEnvoyee {
    background-color: #d9f00e85;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 10%;
}

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
.btn-link{color: white;}
.btn-link:hover{color: white;}
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
                    <h5>Pointage Enseignants
                        <a href="<?php echo e(url('dashboards')); ?>" class="btn btn-danger float-right">Retour</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="container" style="margin-top: 10px;">
                        <form action="<?php echo e(url('create-pointage')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <b>Liste des enseignants</b>
                                        <select name="teacher_id" class="form-control" required>
                                            <option value="" disabled selected>Séléctionner Enseignant</option>
                                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($teacher->id); ?>"> <?php echo e($teacher->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>                                    
                                    </div>
                                    <br>
                                </div>

                                

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <b>Choisir Date</b>
                                        <input type="date" name="pointage_date" id="dateID" class="form-control">                                 
                                    </div>
                                </div>

                                <div class="col-lg-2"></div>
                                
                            </div>

                            <div class="form-group">
                                <center>
                                    <button type="submit" class="btn btn-primary btn-info btn-just-icon like text-center">pointage</button>
                                </center>
                            </div>
                        </form>

                        <hr><br>
                        <h4><b>Liste de tous les pointages des enseignants</b></h4><br>
                        <div class="container-tab">
                            <ul class="nav nav-pills mb-6" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-seance-tab" data-toggle="pill" href="#pills-seance" role="tab" aria-controls="pills-seance" aria-selected="true">Semestre 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-voeux-tab" data-toggle="pill" href="#pills-voeux" role="tab" aria-controls="pills-voeux" aria-selected="false">Semestre 2</a>
                                </li>
                            </ul>
                        </div>

                        
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane show fade active" id="pills-seance" role="tabpanel" aria-labelledby="pills-seance-tab">
                            <div class="col-lg-12" style="text-align:left !important;">
                                <div class="form-group">
                                    <br>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="17%">Type</th>
                                                <th>Enseignant</th>
                                                <th>Matière</th>
                                                <th>Jour</th>
                                                <th width="10%">Séance</th>
                                                <th>Salle</th>
                                                <th width="14%">Date</th>
                                                <th>Semestre</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $pointages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pointage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <tr>
                                            <td>
                                                <?php if($pointage->lat): ?>
                                                    <span class="demandEncours">Enseignant</span>
                                                <?php else: ?> 
                                                    <span class="demandTraitee">Chef département</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($pointage->teacher->full_name); ?></td>
                                            <td><?php echo e($pointage->nom_matiere); ?>  (<?php echo e($pointage->type_matiere); ?>)</td>
                                            <td><?php echo e($pointage->jour); ?></td>
                                            <td><?php echo e($pointage->heure_debut); ?>-<?php echo e($pointage->heure_fin); ?></td>
                                            <td><?php echo e($pointage->salle); ?></td>
                                            <td><?php echo e($pointage->date_pointage ?? 'null'); ?></td>
                                            <td><?php echo e($pointage->semestre); ?></td>
                                            
                                            <td class="text-center">
                                                
                                                <?php if($pointage->lat): ?>
                                                    <center>-</center>
                                                <?php else: ?> 
                                                    <a href="<?php echo e(url('edit-pointage/'.$pointage->id)); ?>" class="btn btn-link btn-info btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($pointage->lat): ?>
                                                    <center>-</center>
                                                <?php else: ?> 
                                                    <form action="<?php echo e(url('delete-pointage/'.$pointage->id)); ?>" onsubmit="return confirm('Are you sure to delete this data?')">
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
                                                <th>Enseignant</th>
                                                <th>Matière</th>
                                                <th>Jour</th>
                                                <th>Séance</th>
                                                <th>Salle</th>
                                                <th>Date</th>
                                                <th>Semestre</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
        
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show fade" id="pills-voeux" role="tabpanel" aria-labelledby="pills-voeux-tab">
                            <div class="col-lg-12" style="text-align:left !important;">
                                <div class="form-group">
                                    <br>
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="17%">Type</th>
                                                <th>Enseignant</th>
                                                <th>Matière</th>
                                                <th>Jour</th>
                                                <th width="10%">Séance</th>
                                                <th>Salle</th>
                                                <th width="14%">Date</th>
                                                <th>Semestre</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $pointageS2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pointage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <tr>
                                            <td>
                                                <?php if($pointage->lat): ?>
                                                    <span class="demandEncours">Enseignant</span>
                                                <?php else: ?> 
                                                    <span class="demandTraitee">Chef département</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($pointage->teacher->full_name); ?></td>
                                            <td><?php echo e($pointage->nom_matiere); ?>  (<?php echo e($pointage->type_matiere); ?>)</td>
                                            <td><?php echo e($pointage->jour); ?></td>
                                            <td><?php echo e($pointage->heure_debut); ?>-<?php echo e($pointage->heure_fin); ?></td>
                                            <td><?php echo e($pointage->salle); ?></td>
                                            <td><?php echo e($pointage->date_pointage ?? 'null'); ?></td>
                                            <td><?php echo e($pointage->semestre); ?></td>
                                            
                                            
                                            <td class="text-center">
                                                
                                                <?php if($pointage->lat): ?>
                                                    <center>-</center>
                                                <?php else: ?> 
                                                    <a href="<?php echo e(url('edit-pointage/'.$pointage->id)); ?>" class="btn btn-link btn-info btn-just-icon edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($pointage->lat): ?>
                                                    <center>-</center>
                                                <?php else: ?> 
                                                    <form action="<?php echo e(url('delete-pointage/'.$pointage->id)); ?>" onsubmit="return confirm('Are you sure to delete this data?')">
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
                                                <th>Enseignant</th>
                                                <th>Matière</th>
                                                <th>Jour</th>
                                                <th>Séance</th>
                                                <th>Salle</th>
                                                <th>Date</th>
                                                <th>Semestre</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>

                    </div>

                        
                        
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
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/chefdepartement/resources/views/pointage/class.blade.php ENDPATH**/ ?>