var scotchApp = angular.module('caja_chica', [])

    .controller('listadoController', ["$scope","$http","$timeout","$window", function ($scope, $http, $timeout,$window)
    {

        $scope.myBoxes= [];
        $scope.activeCashArray=[];
        $scope.step =1;
        $scope.activeDocument = {};
        $scope.activeCashObj={};
        $scope.newCash ={};

        $scope.createCash = function () {

            var request = $http({
                method: "post",
                url: "insertar.php",
                data: {
                    value: $scope.newCash.value
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });

            request.success(function (response) {
                    $scope.getAllCash();
                    alert("Caja creada con exito");
                },

                function errorCallback(response) {

                });

        };

        $scope.getAllCash = function () {
            $http.get("/caja_chica/listado.php").then
            (
                function(response)
                {
                    $scope.myBoxes = response.data;
                },
                function(error){
                    // console.log($scope.trialCompany);
                    $scope.errorsFounded = error.data.message;
                    alert($scope.errorsFounded);

                }
            );
        };

        $scope.getAllCash();



        $scope.getDetails = function (obj) {
            $http.get("/caja_chica/detalle_caja.php?link="+obj.id).then
            (
                function(response)
                {
                    // console.log(response);
                    $scope.activeCashObj =obj;
                    $scope.step =2;
                    $scope.activeCashArray = response.data;
                },
                function(error){
                    // console.log($scope.trialCompany);
                    $scope.errorsFounded = error.data.message;
                    alert($scope.errorsFounded);

                }
            );
        };

        $scope.deleteDoc = function (obj) {
            $http.get("/caja_chica/eliminar_documento.php?link="+obj.id).then
            (
                function(response)
                {
                  $scope.getDetails($scope.activeCashObj);
                },
                function(error){
                    // console.log($scope.trialCompany);
                    $scope.errorsFounded = error.data.message;
                    alert($scope.errorsFounded);

                }
            );
        };

        $scope.insertDocument = function () {

            var total = 0;

            for(var i=0; i<$scope.activeCashArray.length ;i++)
            {
                total = total + parseFloat($scope.activeCashArray[i].valor_documento);
            }
            total = total + parseFloat($scope.activeDocument.value);

            if(total > $scope.activeCashObj.valor_inicial)
            {
                alert("Documento sobrepasa el total");
            }
            else {
                var request = $http({
                    method: "post",
                    url: "functions.php",
                    data: {
                        type: $scope.activeDocument.type,
                        value: $scope.activeDocument.value,
                        note: $scope.activeDocument.note,
                        idCash: $scope.activeCashObj.id
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });

                request.success(function (response) {
                        $scope.getDetails($scope.activeCashObj);
                        // alert("exito");
                    },

                    function errorCallback(response) {
                        // $scope.message = "Sorry, something went wrong";
                        alert('error');
                    });
            }



        };




    }

    ]);