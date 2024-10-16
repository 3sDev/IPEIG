<?php $__env->startSection('title', 'Modifier les codes des étudiants'); ?>
<?php $__env->startSection('contentPage'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
        <h3 class="m-0">Notes des étudiants</h3>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo e(url('dashboards')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(url('devoirs')); ?>">Liste des devoirs</a></li>
        <li class="breadcrumb-item active">Notes des étudiants</li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<style>
.inputStyle {
background: none !important;
border: none !important;
width: 50px;
}

.fa {
color:rgb(73, 73, 73)
}

.textable {
overflow: hidden;
text-overflow: ellipsis;
display: -webkit-box;
-webkit-line-clamp: 1; /* number of lines to show */
-webkit-box-orient: vertical;
}

input[type="radio"]:checked + .card {
background: #f1f1f1;
}

.card.backgroundCard {
background: #f1f1f1;
}

input[type=radio]:checked  + .card{
background: #3057d5;
border-color: #3057d5;
transform: scale(1.2);
opacity: 1;
}

input[type=radio]:focus + .card{
box-shadow: 0 0 0 4px rgba(48, 86, 213, 0.2);
border-color: #3056d5;
}

.cardLabel{
cursor: pointer;
}

.cardLabel:hover{
border: 1px solid #3056d5;
}

.infos{
    width: 100% !important;
    border: none;
}
</style>


<link rel="stylesheet" href="<?php echo e(URL::asset('css/components.css')); ?>" />

<div class="row">
    <?php if(session('message')): ?>
    <h5><?php echo e(session('message')); ?></h5>
        <?php endif; ?>
    <div class="col-12">
        <div class="card" id="printPage">
            <div class="card-header">
                <a href="<?php echo e(url('devoirs')); ?>" class="btn btn-primary float-right">Retour</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <form action="" method="POST" >
                    <?php echo csrf_field(); ?>

                    <?php $__currentLoopData = $devoirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $devoir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <center><h5><b>Classe :</b> <?php echo e($devoir->classe->abbreviation); ?></h5>
                    <h5><b>Enseignant :</b> <?php echo e($devoir->teacher->full_name); ?></h5>
                    <h5><b>Matière :</b> <?php echo e($devoir->matiere->subjectLabel.' - '.$devoir->matiere->description); ?></h5><br>
                    <table class="table table-striped" style="border:1px solid white; table-layout:fixed; width:75% !important">
                        <tr>
                            <th>Année universitaire</th>
                            <th>Semestre</th>
                            <th>Type Devoir</th>
                            
                        </tr>
                        <tr>
                            <td><?php echo e($devoir->annee); ?></td>
                            <td><?php echo e($devoir->semestre); ?></td>
                            <td><?php echo e($devoir->type_devoir); ?></td>
                        </tr>
                    </table>
                    </center>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <br>                      
                </form>
                <center>
                    <table id="example1" class="table table-bordered table-striped" style="padding-right:5px; table-layout:fixed; width:80% !important">
                        <thead>
                            <tr>
                                <th width="15%">CIN</th>
                                <th width="35%">Nom et Prénom</th>
                                <th width="20%" class="text-center">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $devoirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $devoir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <?php $__currentLoopData = $codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->pivot->note == '999'): ?>
                                    <tr style="background-color: #ffc0c0">
                                <?php else: ?>
                                    <tr>
                                <?php endif; ?>    
                            
                                    <td><span><?php echo e($item->cin); ?></span></td> 
                                    <td><span><?php echo e($item->prenom .' '. $item->nom); ?></span></td> 
                                    
                                    <?php if($item->pivot->note == '999'): ?>
                                    <td align="center">
                                        <span>A</span>
                                    </td>
                                    <?php else: ?>
                                    <td align="center">
                                        <span><?php echo e($item->pivot->note); ?></span>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                    <button id="print" class="btn btn-secondary" onclick="printContent('id name of your div');" >Imprimer</button>
                </center>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<script>
    function printContent(el){
    var restorepage = $('printPage').html();
    var printcontent = $('#' + el).clone();
    $('printPage').empty().html(printcontent);
    window.print();
    $('printPage').html(restorepage);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutscolarite.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/serviceexamen/resources/views/devoir/code.blade.php ENDPATH**/ ?>