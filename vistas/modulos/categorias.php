  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!--   <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"> -->
            <h1>

            Administrar Categorias
            </h1>
            
          <!-- </div> -->
          <!-- <div class="breadcrumb"> -->

            <ol class="breadcrumb">
              <li> <a href="inicio"> <i class="fa fa-dashboard"></i>Inicio</a></li>
              <li class="active">Administrar Categorias</li>
            </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
            
              Agregar Categoria

          </button>

          </div>

        <div class="box-body">
      

            <table class="table table-bordered table-striped dt-responsive tablas">

              <thead>

                <tr>
                  <th style="width:10px">#</th>
                  <th>Categoria</th>
                  <th>Acciones</th>

                </tr>
              </thead>

              <tbody>
                
                


                <?php

                  $item=null;
                  $valor=null;
                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);


                  var_dump($categorias);

                  foreach($categorias as $key => $value){

                    echo '<tr>

                      <td>'.($key+1).'</td>
                      <td class="text-uppercase">'.$value["categoria"].'</td>

                      <td>

                        <div class="btn-group">
                          <button class= "btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                        </div>
                        </td>
                        </tr>

                        <tr>';
                  }

                ?>

              </tbody>

            </table>


        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>


<!-- MODAL EDITAR Agregar  -->



<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog"> 

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">


      <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Categoria</h4>
      </div>

      <div class="modal-body">
      
      <div class="box-body">

        <!-- Agregar nombre  -->

        <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-th"></i></span>

            <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar Categoria" required>
            
          </div>
        
      </div>
    </div>
  </div>

  <!--=====================================
        PIE DEL MODAL
  ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Categoria</button>

        </div>
        <?php

        $crearCategoria = new ControladorCategorias();
        $crearCategoria -> ctrCrearCategoria();
        

        ?>


      </form>

    </div>

  </div>

</div>




<!-- MODAL EDITAR CATEGORIA -->
<div id="modalEditarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog"> 

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post">


      <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Categoria</h4>
      </div>

      <div class="modal-body">
      
      <div class="box-body">

        <!-- Agregar nombre  -->

        <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-th"></i></span>

            <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>
            

             <input type="hidden" name="idCategoria" id="idCategoria" required>
          </div>
        
      </div>
    </div>
  </div>

  <!--=====================================
        PIE DEL MODAL
  ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>
       <?php

        $editarCategoria = new ControladorCategorias();
        $editarCategoria -> ctrCrearCategoria();
        

        ?> 


      </form>

    </div>

  </div>

</div>








