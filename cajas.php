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


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-materialize/0.2.2/angular-materialize.min.js"></script>

    <script type="text/javascript" src="cajas.js"></script>


</head>

<div class="jumbotron text-center">
    <h1>Cajas Chicas</h1>
    <p>En esta sección encontrará una colección con sus cajas chicas creadas, en las cuales podrá agregar o editar documentos/facturas.</p>
</div>

<body ng-app="caja_chica" ng-controller="listadoController">


<div class="container">


<!--    <ul class="collection animated fadeIn">-->
<!--    <li class="collection-item" ng-repeat="x in myBoxes">{{x.fecha_hora}}</li>-->
<!--    </ul>-->

    <div ng-if="step==1">

        <div class="row">
            <div class="col-md-9" >

            </div>
            <div class="col-md-3" >
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCreateCash">Añadir nueva caja</button>
            </div>

            <div class="modal fade" id="modalCreateCash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Añadir caja</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">



                            <div class="input-group">
                                <span class="input-group-addon">Q</span>
                                <span class="input-group-addon">0.00</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="valorDinero"
                                       name="valorDinero" ng-model="newCash.value">
                            </div>
                            <br>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="createCash()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <br>

        <table class="table" >
            <thead>
            <tr>
                <th scope="col">Numero de Caja</th>
                <th scope="col">Fecha y hora</th>
                <th scope="col">Valor</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr  ng-repeat="x in myBoxes | orderBy:'-fecha_hora'"">
            <td>{{x.id}}</td>
            <td>{{x.fecha_hora}}</td>
            <td>{{x.valor_inicial | currency:"Q. "}}</td>
            <td><button type="button" class="btn btn-primary btn-sm" ng-click="getDetails(x)">Editar</button></td>
            </tr>
            </tbody>
        </table>

    </div>






    <div ng-if="step==2">
        <div class="row">
            <div align="center">
                <h3>Caja numero {{activeCashObj.id}}</h3>
            </div>

        </div>

        <div class="row">
            <h5>Valor inicial de la caja: {{activeCashObj.valor_inicial | currency:"Q. "}}</h5>
        </div>

        <div class="row">
            <table class="table" >


                <br>
                <thead>
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Tipo de documento</th>
                    <th scope="col">Valor de documento</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr  ng-repeat="x in activeCashArray">
                    <td>{{x.id}}</td>
                    <td>{{x.tipo_documento}}</td>
                    <td>{{x.valor_documento | currency:"Q. "}}</td>
                    <td>{{x.nota}}</td>
                    <td>{{x.date}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" ng-click="deleteDoc(x)">Eliminar</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <br>
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Añadir nuevo documento
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Añadir documento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Tipo de Documento</label>
                                <select class="form-control" id="selectDocType" name="selectDocType" ng-model="activeDocument.type">
                                    <option value="Factura">Factura</option>
                                    <option value="Recibo">Recibo</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Q</span>
                                <span class="input-group-addon">0.00</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="valorDinero"
                                       name="valorDinero" ng-model="activeDocument.value">
                            </div>
                            <br>

                            <div class="input-group">
                               <input type="text" class="form-control" placeholder="Nota" aria-describedby="basic-addon1"
                                      id="notaDesc" name="notaDesc" ng-model="activeDocument.note">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="date" class="form-control" id="documentDate" name="documentDate">
                            </div>
                            <br>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="insertDocument()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
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
