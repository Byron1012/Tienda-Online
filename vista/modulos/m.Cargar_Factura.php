<main class="page faq-page">
    <section class="clean-block clean-faq dark">
        <div class="container">
            <div class="block-heading">

                <h2 class="text-info">Listado de Facturas</h2>
                <p>Muestra todas las facturas generadas por el usuario actual.</p>
            </div>
            <div class="block-content"
                <!-- Start: Tabla de Facturar -->
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Listado de Facturas</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table table-hover" id="TablaProductos">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subtotal</th>
                                        <th>Iva</th>
                                        <th>total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $alm = new Factura(); 
                                    $alm->id = $_SESSION['id'];
                                    //echo "hola ".$alm->id;
                                   /* $alm->Obtener($id); echo $_REQUEST['id'];
                                    if (is_array($alm->Obtener(@$_REQUEST['id'])) || is_object(@$alm->Obtener($_REQUEST['id'])))*/
                                    foreach ($alm->Obtener($alm->id) as $r): ?>
                                        <tr>
                                            <td><?php echo @$r->id; ?></td>
                                            <td><?php echo @$r->subtotal; ?></td>
                                            <td><?php echo @$r->iva; ?></td>
                                            <td><?php echo @$r->total; ?></td>
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

