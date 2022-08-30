<?php
    require_once dirname(__FILE__) . '/funciones/funcionesInicio.php';

     $res =0;
     $datainfo = pantallaInicio();

    
 ?>
 <div class="wrap">
        <?php
             echo "<h1 class='wp-heading-inline'>" . get_admin_page_title() . "</h1>";
        ?>
         <a id="btnnuevo" class="page-title-action">Añadir nueva</a>

         <br><br><br>

         <?php 
          if($res){
        ?>
          <div class="alert alert-success" role="alert">
            Agregado correctamente!
          </div>
         <?php 
          }
          ?>

         <table class="wp-list-table widefat fixed striped pages">
                <thead>
                    <th >Id</th>
                    <th >Dato 1</th>
                    <th >Dato 2</th>
                    <th >ShortCode</th>
                    <th >Acciones</th>
                </thead>
                <tbody id="the-list">
                    <?php 
                        foreach ($datainfo as $key => $value) {
                           echo "
                                <tr>
                                    <td>".$value['Id']."</td>
                                    <td>".$value['Dato1']."</td>
                                    <td>".$value['Dato2']."</td>
                                    <td>[ENC id=".$value['Id']." ]</td>

                                    <td>
                                      <a data-id='".$value['Id']."' class='page-title-action btnBorrar'>Borrar</a>
                                    </td>
                                </tr>";
                        }

                    ?>
                </tbody>
        </table>


 </div>





<!-- Modal -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="modalnuevo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Nuevos datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       

            <div class="modal-body">
                <div style="    height: 73px;">                
                  <div class="form-group"> 
                    <label for="data1" class="col-sm-4 col-form-label">Dato 1</label>
                    <div class="col-sm-8">
                        <input type="text" id="data1" name="data1" style="width:100%;margin-bottom: 10px;">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="data2" class="col-sm-4 col-form-label">Dato 2</label>
                    <div class="col-sm-8">
                        <input type="text" id="data2" name="data2" style="width:100%">
                    </div>
                  </div>
                </div>

                     


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" name="btnguardar" id="btnguardar">Guardar</button>
            </div>
       

    </div>
  </div>
</div>

