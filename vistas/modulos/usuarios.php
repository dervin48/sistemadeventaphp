  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!--   <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"> -->
            <h1>

            Administrar Usuarios
            </h1>
            
          <!-- </div> -->
          <!-- <div class="breadcrumb"> -->

            <ol class="breadcrumb">
              <li> <a href="inicio"> <i class="fa fa-dashboard"></i>Inicio</a></li>
              <li class="active">Administrar Usuarios</li>
            </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            
              Agregar Usuario

          </button>

          </div>

        <div class="box-body">
      

            <table class="table table-bordered table-striped tablas">

              <thead>

                <tr>
                  <th>#</th>
                  <th>nombre</th>
                  <th>Usuario</th>
                  <th>Foto</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Ultimo Login</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                
                <tr>
                  <td>1</td>
                  <td>Usuario Administrador</td>
                  <td>admin</td>
                  <td><img src="vistas/img/default/anonimous.png" class="img-thumbnail" width="40px"></td>
                  <td>Administrador</td>
                  <td><button class="btn btn-success btn-xs"> Activado</button></td>
                  <td>2013-12-11 12:05:32</td>

                  <td>
                    <div class="btn-group">

                      <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                    </div>
                </tr>

              </tbody>




            </table>


     
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>




<!-- Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog"> 

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">


      <div class="modal-header" style="background:#3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Usuario</h4>
      </div>

      <div class="modal-body">
      
      <div class="box-body">

        <!-- Agregar nombre  -->

        <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-user"></i></span>

            <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingrese nombre" required>
            
          </div>
        
      </div>

      <!-- ENTRADA PARA EL USUARIO  -->

      <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-key"></i></span>

            <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingrese Usuario" required>
            
          </div>

        </div>

 <!-- ENTRADA PARA EL contrasena -->

      <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-lock"></i></span>

            <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Password" required>
            
          </div>

        </div>

         <!-- ENTRADA PARA EL USUARIO  -->

      <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-users"></i></span>

            <select class="form-control input-lg" name="nuevoPerfil">
              

              <option value="">Selectionar Perfil</option>

              <option value="Administrador">Administrador</option>

              <option value="Especial">Especia;</option>

              <option value="Vendedor">Vendedor</option>

            </select>
            
          </div>

        </div>

        <!-- entrada para subir la foto -->

        <div class="form-group">

        <div class="panel ">

          SUBIR FOTO
          

        </div>

        <input type="file" id="nuevaFoto" name="nuevaFoto">

        <p class="help-block">Perso MAximo de la foto 200mb</p>

        <img src="vistas/img/default/anonimous.png" class="img-thumbnail" width="100px">

        </div>

      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-defuault pull left" data-dismiss="modal">Salir</button>


        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </form>
      </div>
    </div>

  </div>
</div>

  







