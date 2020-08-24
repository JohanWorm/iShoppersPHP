<div class="container contianer-body">
    
    <div class="col-md-8 offset-md-2">

        <ol class="breadcrumb">
            <li>
                <a href="?c=Subcategoria">
                    Subcategorias
                </a>
            </li>
        </ol>

        <div class="card card-outline-secondary">
            <div class="card-header">
                <h1 class="page-header text-center">
                    <?php if (isset($detail)) {
                        echo $detail->subcategoria_nombre;
                    } else {
                        echo 'Nueva subcategoría';
                    } ?>
                </h1>
            </div>
            <div class="card-body">
                <form class="form" action="?c=Subcategoria&a=Guardar" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
                    <input class="form-control" type="hidden" name="subcategoria_id" value="<?php if (isset($detail)) { echo $detail->subcategoria_id; }?>">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="subcategoria_nombre" type="text" value="<?php if (isset($detail)) { echo $detail->subcategoria_nombre; }?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Descripción</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="subcategoria_descripcion" value="<?php if (isset($detail)) { echo $detail->subcategoria_descripcion; } ?>">
                                <?php if (isset($detail)) { echo $detail->subcategoria_descripcion; } ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Categoría</label>
                        <div class="col-lg-9">
                            <select name="subcategoria_categoria" class="form-control" value="<?php if (isset($detail)) { echo $detail->subcategoria_categoria; } ?>">
                                <?php foreach ($categorias as $row) : ?>
                                <option value="<?php echo $row->categoria_id; ?>" <?php if(isset($detail) && $detail->subcategoria_categoria === $row->categoria_id) echo 'selected="selected"';?>>
                                    <?php echo $row->categoria_nombre; ?>
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