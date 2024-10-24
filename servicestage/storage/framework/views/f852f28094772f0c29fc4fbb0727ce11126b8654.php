<?php $__env->startSection('title', 'Créer une nouvelle localisation'); ?>
<?php $__env->startSection('contentPage'); ?>

<link rel='stylesheet' href='https://npmcdn.com/leaflet@0.7.7/dist/leaflet.css'>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Nouvelle localisation</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('maps')); ?>">Liste des localisations</a></li>
                <li class="breadcrumb-item active">Nouvelle localisation</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



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

                <div class="card-body">

                    <form action="<?php echo e(url('maps')); ?>" method="POST" onsubmit="return confirm('Êtes-vous sûr d\'ajouter cet element?')" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Titre</label>
                                    <input type="text" name="titre" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <br><hr><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Catégorie</label>
                                    <select name="categorie" class="form-control" data-size="8" data-style="btn btn-primary btn-round">
                                        <option value="Clubs">Clubs</option>
                                        <option value="Restaurants">Restaurants</option>
                                        <option value="Foyers et Locations">Foyers et Locations</option>   
                                        <option value="Centres Culturelles">Centres Culturelles</option> 
                                        <option value="Hopitaux et Urgences">Hopitaux et Urgences</option>    
                                        <option value="Moyennes de Transports">Moyennes de Transports</option>    
                                        <option value="Cafés et Salons de thé">Cafés et Salons de thé</option>    
                                        <option value="Services Universitaires">Services Universitaires</option>    
                                        <option value="Terrains et Salles de Sport">Terrains et Salles de Sport</option>    
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control"/>
                                </div>
                            </div>
                            <br><hr><br>
                            <div class="row" >
                                <div class="col-md-6">
                                    <div id="MapLocation" style="height:350px; width: 100%;"></div>
                                </div>
                                <div class="col-md-6" style="margin-top: 7%">
                                    <label for="">Laltitude</label>
                                    <input id="Latitude" name="lat" class="form-control" required/>
                                    
                                    <label for="" style="margin-top: 3%">Longtitude</label>
                                    <input id="Longitude" name="lng" class="form-control" required />
                                    
                                </div>
                            </div>
                            
                            
                            <br><br>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
        // use below if you want to specify the path for leaflet's images
        //L.Icon.Default.imagePath = '@Url.Content("~/Content/img/leaflet")';

        var curLocation = [0, 0];
        // use below if you have a model
        // var curLocation = [@Model.Location.Latitude, @Model.Location.Longitude];

        if (curLocation[0] == 0 && curLocation[1] == 0) {
            curLocation = [34.429660, 8.759418];
        }

        var map = L.map('MapLocation').setView(curLocation, 15);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        map.attributionControl.setPrefix(false);

        var marker = new L.marker(curLocation, {
            draggable: 'true'
        });

        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position, {
            draggable: 'true'
            }).bindPopup(position).update();
            $("#Latitude").val(position.lat);
            $("#Longitude").val(position.lng).keyup();
        });

        $("#Latitude, #Longitude").change(function() {
            var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
            marker.setLatLng(position, {
            draggable: 'true'
            }).bindPopup(position).update();
            map.panTo(position);
        });

        map.addLayer(marker);
        })
    </script>
     <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
     <script src='https://npmcdn.com/leaflet@0.7.7/dist/leaflet.js'></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlayoutenseignant.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/webroot/ENIGA/servicestage/resources/views/maps/create.blade.php ENDPATH**/ ?>