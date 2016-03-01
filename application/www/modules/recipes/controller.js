'use strict';

angular.module('EuskalErrezetak.controllers')

.controller('RecipesCtrl', function($scope, $ionicLoading, $stateParams, $ionicNavBarDelegate, RecipesMapper, baseUrl, ErrorCall, $ionicScrollDelegate, $rootScope) {

    $rootScope.slideHeader = false;
    $rootScope.slideHeaderPrevious = 0;


    var recipes = new RecipesMapper();
    $scope.urlImg = baseUrl + '/image';

    $ionicLoading.show({
        template: 'Cargando... <i class="ion-loading-a"></i>'
    });

    recipes.$get({id: $stateParams.id}).then(function(data) {
        $scope.recipe = data.recipes;
        $ionicLoading.hide();
    }).catch(function(errorCallback) {
        $ionicLoading.hide();
        ErrorCall.Message('Arazoren bat gertatu da errezetak kargatzean.');
    });

    $scope.isShowGoBack = $ionicNavBarDelegate.showBar();

    $scope.myGoBack = function() {
        $ionicNavBarDelegate.back();
    };

    $scope.openFB = function() {
        console.log("asfasdf");

        // window.open(elem.href, "_system");
        // return false;
    };

})

.filter('to_trusted', ['$sce', function($sce){
        return function(text) {
            return $sce.trustAsHtml(text);
        };
    }])

.directive('scrollWatch', function($rootScope) {
  return function(scope, elem, attr) {
    var start = 0;
    var threshold = 50;

    elem.bind('scroll', function(e) {
      if(e.detail.scrollTop - start > threshold) {
        $rootScope.slideHeader = true;
      } else {
        $rootScope.slideHeader = false;
      }
      if ($rootScope.slideHeaderPrevious >= e.detail.scrollTop - start) {
        $rootScope.slideHeader = false;
      }
      $rootScope.slideHeaderPrevious = e.detail.scrollTop - start;
      $rootScope.$apply();
    });
  };
});
