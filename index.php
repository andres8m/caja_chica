<!DOCTYPE html>
<html lang="en">
<head>
  <title>Caja Chica</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script type="text/javascript" src="index.js"></script>


</head>
<body>

<div class="jumbotron text-center">
  <h1>Caja Chica</h1>
  <p>En esta sección podrá configurar el valor inical de la caja chica y agregar facturas.</p> 
</div>
  
<div class="container">
      <div class="row">

                       <div class="col-md-2">
                              <h3 for="">Valor inicial</h3>
                        </div>

                         <div class="col-md-6">
                           
                                <form id="frmajax" method="POST">
                                          <div class="input-group">
                                            <br>
                                               <br>
                                              <span class="input-group-addon">Q</span>
                                              <span class="input-group-addon">0.00</span>
                                              <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="valueQ" id="valueQ">

                                          </div>
                                </form>
                              
                            </div>
                            <div class="col-md-4">
                                  <button type="button" class="btn btn-primary" id="btnguardar">Guardar</button>
                            </div>
          </div>

<br>
<br>
  <div class="row">
     <div class="col-md-4">
       <form id="frmajaxfactura" method="POST">
                      <h3 for="">Agregar Nuevo</h3>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de Documento</label>
                        <select class="form-control" id="selectDocType" name="selectDocType">
                          <option value="Factura">Factura</option>
                          <option value="Recibo">Recibo</option>
                        </select>
                      </div>

                    <div class="input-group">
                      <span class="input-group-addon">Q</span>
                      <span class="input-group-addon">0.00</span>
                      <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="valorDinero" 
                      name="valorDinero">
                    </div>
                    <br>

                    <div class="input-group">
<!--                       <span class="input-group-addon" id="basic-addon1">Nota</span>
 -->                 <input type="text" class="form-control" placeholder="Nota" 
                      aria-describedby="basic-addon1" id="notaDesc" name="notaDesc">
                    </div>
                      <br>
                    <div class="form-group">
                         <input type="date" class="form-control" id="documentDate" name="documentDate">
                    </div>
                    <br>            
                    <button type="button" class="btn btn-primary" id="btnguardarFactura" disabled="true">Guardar</button>
                </form>


      </div>

      <div class="col-md-6">
            <h3 for="">Facturas Añadidas</h3>
            <br>
            <div id="mainFacturas">
                <ul class="list-group">

                </ul>
            </div>    
                
      </div>

       <div class="col-md-2">
                  <h3 for="">Totales</h3>
                  <br>         
                  <br>

                  <div class="form-group">
                     <p>Valor Inicial 
                    <input type="text" id="inputValorInicial" class="form-control" disabled="true"></p>           
                
                  </div>
                 
                   <p>Total facturas <input type="text" id="inputFacturas" class="form-control" disabled="true"></p>           
                  
                  <p>Restante <input type="text" id="test3" class="form-control" disabled="true"></p>
                  <br>
                 
                  <button type="button" class="btn btn-primary" id="saveCaja" name="saveCaja" disabled="true">Guardar Caja</button>
        </div>

  </div>







</div>

</body>
</html>

<style>
  body{
    padding-bottom: 10%;
  }
</style>
