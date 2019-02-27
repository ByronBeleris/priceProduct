angular.module('app').controller('ProductController', ['$scope', '$http', '$timeout', function ($scope, $http, $timeout) {
    $scope.products = {
        productCodes: [],
        accountNumber: ''
    };


    function showLoader() {
        $('#loadingOverlay').show();
    }

    function hideLoader() {
        $('#loadingOverlay').hide();
    }

    $scope.search = function () {
        if( $scope.products.productCodes.length === 0 )
        {
            swal({
                title: "Product code can't be empty!",
                icon: "warning",
                buttons: true,
            });
        }
        else
        {
            showLoader();
            var result = $scope.products.productCodes.map(res => res.text);
            var data = {
                products: result,
                accountNumber: $scope.products.accountNumber
            };
            var response = $http.post(SearchProducts, data);
            response.then(function (data) {
                $scope.productModels = null;
                if (data.data.Status === 'success') {
                    $scope.productModels = data.data.Model;
                    console.log($scope.productModels);
                }
                else
                {
                    swal({
                        title: "Product not found.",
                        text: data.data.Messages[0].Text,
                        icon: "warning",
                        buttons: true,
                    });
                }
                hideLoader();
            });
        }

    };

}]);