var scotchApp = angular.module('caja_chica', [])

    .controller('listadoController', ["$scope","$http","$timeout","$window", function ($scope, $http, $timeout,$window)
    {


        $scope.myBoxes= [];

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


    }

    ]);