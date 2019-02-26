angular.module('app').controller('PriceController', ['$scope', '$http', '$timeout', function ($scope, $http, $timeout) {
    $scope.interval = 10000;
    $scope.currentPage = 0;
    $scope.resultSize = 5;
    $scope.prices = [];

    function showLoader() {
        $('#loadingOverlay').show();
    }

    function hideLoader() {
        $('#loadingOverlay').hide();
    }

    $scope.getPrices = function () {
        $http.get('./files/live_prices.json')
            .then(function (data) {
                hideLoader();
                $scope.prices = data.data;
            })
            .then(function () {
                $scope.nextGetPrices = $timeout($scope.getPrices, $scope.interval);
            });
    };

    $scope.numberOfPages = function () {
        return Math.ceil($scope.prices.length / $scope.resultSize);
    };

    showLoader();
    $scope.getPrices();

    $scope.$on('$destroy', function () {
        if ($scope.nextGetPrices) {
            $timeout.cancel($scope.nextGetPrices);
        }
    });

    $scope.$watch('search', function (newValue, oldValue) {
        if (oldValue !== newValue) {
            $scope.currentPage = 0;
        }
    }, true);

}])
    .filter('StartFrom', function () {
        return function (input, start) {
            start = +start;
            return input.slice(start);
        }
    });