<div class="row justify-content-center h-100">
        <div class="col-lg-8 mt-5 mt-lg-0">
            <div class="col-sm-12 align-self-center text-center">
                <div class="card shadow">
                    <div class="card-body">
                        <h1>Categoria Roles</h1>
                        <?php /* if($rolesaccess->getrolaccess_addroles() == 1){include_once 'view_agregarroles.php'; }*/ ?>
                        <?php  if($rolesaccess->getrolaccess_modificarroles() == 1){include_once 'view_modificarroles.php'; } ?>
                        <?php /* if($rolesaccess->getrolaccess_asignarroles() == 1){include_once 'view_asignarroles.php'; }*/ ?>
                        <?php /* if($rolesaccess->getrolaccess_deletroles() == 1){include_once 'view_eliminarroles.php'; }*/ ?>
                    </div>
                </div>
            </div>
        </div>
    </div>