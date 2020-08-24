<div class="container contianer-body">
    
    <div class="col-md-8 offset-md-2">

        <ol class="breadcrumb">
            <li>
                <a href="?c=Categoria">
                    Categorias
                </a>
            </li>
        </ol>

        <div class="card card-outline-secondary">
            <div class="card-header">
                <h1 class="page-header text-center">
                    <?php if (isset($detail)) {
                        echo $detail->categoria_nombre;
                    } else {
                        echo 'Nueva categoría';
                    } ?>
                </h1>
            </div>
            <div class="card-body">
                <form class="form" action="?c=Categoria&a=Guardar" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
                    <input class="form-control" type="hidden" name="categoria_id" value="<?php if (isset($detail)) { echo $detail->categoria_id; }?>">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="categoria_nombre" type="text" value="<?php if (isset($detail)) { echo $detail->categoria_nombre; }?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Descripción</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="categoria_descripcion" value="<?php if (isset($detail)) { echo $detail->categoria_descripcion; } ?>">
                                <?php if (isset($detail)) { echo $detail->categoria_descripcion; } ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Tienda</label>
                        <div class="col-lg-9">
                            <select name="categoria_tienda" class="form-control" value="<?php if (isset($detail)) { echo $detail->categoria_tienda; } ?>">
                                <?php foreach ($tiendas as $row) : ?>
                                <option value="<?php echo $row->tienda_id; ?>" <?php if(isset($detail) && $detail->categoria_tienda === $row->tienda_id) echo 'selected="selected"';?>>
                                    <?php echo $row->tienda_nombre; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 text-center">
                            <a href="?c=Categoria">
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