var scotchApp = angular.module('caja_chica', [])

    .controller('listadoController', ["$scope","$http","$timeout","$window", function ($scope, $http, $timeout,$window)
    {


        $scope.myBoxes= [];
        $scope.activeCash=[];
        $scope.activeCashId ="";
        $scope.step =1;


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

        $scope.getDetails = function (obj) {
            $http.get("/caja_chica/detalle_caja.php?link="+obj.id).then
            (
                function(response)
                {
                    // console.log(response);
                    $scope.activeCashObj =obj;
                    $scope.step =2;
                    $scope.activeCash = response.data;
                },
                function(error){
                    // console.log($scope.trialCompany);
                    $scope.errorsFounded = error.data.message;
                    alert($scope.errorsFounded);

                }
            );
        }


    }

    ]);