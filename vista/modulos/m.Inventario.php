<main class="page faq-page">
    <section class="clean-block clean-faq dark">
        <div class="container">
            <div class="block-heading">
                <ol class="breadcrumb" style="background-color: #ffffff;">
                    <li class="breadcrumb-item"><a href="#"><span>ADMIN</span></a></li>
                    <li class="breadcrumb-item active"><span>Inventario</span></li>
                </ol>
                <h2 class="text-info">Listado de Producto</h2>
                <p>Manejo del inventario de Video Juegos</p>
            </div>
            <div class="block-content"><a href="index.php?c=Juego&a=Ingreso_Juego"><button class="btn btn-primary" type="button" style="margin-bottom: 17px;">Añadir Video Juego</button></a>
                <!-- Start: Tabla de Empleados -->
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Listado de Juegos</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table table-hover" id="TablaProductos">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Juego</th>
                                        <th>Descripción</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>DLC</th>
                                        <th>Edición Limitada</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->model->Listar() as $r): ?>
                                        <tr>
                                            <td><?php echo $r->id; ?></td>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="<?php echo $r->url; ?>"><?php echo $r->nombre; ?></td>
                                            <td><br><?php echo $r->descripcionCorta; ?><br><br><br><br></td>
                                            <td><?php echo $r->cantidad; ?></td>
                                            <td><?php echo $r->precio; ?></td>
                                            <td><?php echo $r->edicionLimitada; ?></td>
                                            <td><?php echo $r->incluyeDLC; ?></td>
                                            <td>
                                                <span class="table-remove">               
                                                    <button id="EliminarJuego" class="btn btn-danger btn-sm border rounded edit" data-id="<?php echo $r->id; ?>" value="<?php echo $r->id; ?>"  type="button" data-toggle="modal" data-target="#ModalEliminar">Eliminar</button>
                                                </span>
                                                <span class="table-update">
                                                    <a class="btn btn-success btn-sm border rounded" style="width: 76px;" role="button" href="?c=Juego&a=Ingreso_Juego&id=<?php echo $r->id; ?>">Editar</a>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr></tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End: Tabla de Empleados -->
            </div>
        </div>
    </section>
    <div class="modal fade" role="dialog" tabindex="-1" id="ModalEliminar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Desea eliminar este video juego?</strong></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <p>Seleccione "Eliminar" a continuación si está listo para eliminar el juego.<br></p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-danger" name="JuegoId" id="JuegoId" type="button" onclick="EliminarJuego()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</main>

