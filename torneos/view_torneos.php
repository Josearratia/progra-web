<div class="row justify-content-center h-100">
    <div class="col-lg-8 mt-5 mt-lg-0">
        <div class="col-sm-12 align-self-center text-center">
            <div class="card shadow">
                <div class="card-body">
                    <h1>Categoria Torneos</h1>
                     <?php /*  if($rolesaccess->getrolaccess_addtorneo() == 1){include_once 'view_agregartorneos.php'; } */?> 
                    <?php  if($rolesaccess->getrolaccess_modificartorneo() == 1){include_once 'view_modificartorneos.php'; } ?>
                    <?php /* if($rolesaccess->getrolaccess_delettorneo() == 1){include_once 'view_eliminartorneos.php'; }*/ ?>
                </div>
            </div>
        </div>
    </div>
</div>