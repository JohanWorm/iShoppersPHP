<div class="container contianer-body">
    
    <div class="col-md-8 offset-md-2">

        <ol class="breadcrumb">
            <li>
                <a href="?c=Usuario">
                    Usuarios
                </a>
            </li>
        </ol>

        <div class="card card-outline-secondary">
            <div class="card-header">
                <h1 class="page-header text-center">
                    <?php if (isset($detail)) {
                        echo $detail->usuario_nombres . ' ' . $detail->usuario_apellidos;
                    } else {
                        echo 'Nuevo usuario';
                    } ?>
                </h1>
            </div>
            <div class="card-body">
                <form class="form" action="?c=Usuario&a=Guardar" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
                    <input class="form-control" type="hidden" name="usuario_id" value="<?php if (isset($detail)) { echo $detail->usuario_id; }?>">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Nombres</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="usuario_nombres" type="text" value="<?php if (isset($detail)) { echo $detail->usuario_nombres; }?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Apellidos</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="usuario_apellidos" type="text" value="<?php if (isset($detail)) { echo $detail->usuario_apellidos; } ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="usuario_email" type="email" value="<?php if (isset($detail)) { echo $detail->usuario_email; } ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Rol</label>
                        <div class="col-lg-9">
                            <select name="usuario_rol" class="form-control" value="<?php if (isset($detail)) { echo $detail->usuario_rol; } ?>">
                                <?php foreach ($roles as $row) : ?>
                                <option value="<?php echo $row->rol_id; ?>" <?php if($detail->usuario_rol === $row->rol_id) echo 'selected="selected"';?>>
                                    <?php echo $row->rol_nombre; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Teléfono</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="usuario_telefono" type="text" value="<?php if (isset($detail)) { echo $detail->usuario_telefono; } ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Celular</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="usuario_celular" type="text" value="<?php if (isset($detail)) { echo $detail->usuario_celular; } ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 text-center">
                            <a href="?c=Usuario">
                                <button type="button" class="btn btn-secondary">
                                    Regresar
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>