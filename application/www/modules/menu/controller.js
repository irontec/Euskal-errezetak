'use strict';

angular.module('EuskalErrezetak.controllers').controller('MenuCtrl', function($scope, $location, $ionicSideMenuDelegate, CategoriesMapper, StaticPagesMapper, SocialNetworksMapper, TagsMapper, ErrorCall) {

    var categories = new CategoriesMapper();
    var staticPages = new StaticPagesMapper();
    var socialNetworks = new SocialNetworksMapper();
    var tags = new TagsMapper();

    categories.$get().then(function(data) {
        $scope.categories = data.categories;
    }).catch(function(errorCallback) {
        $ionicLoading.hide();
        ErrorCall.Message('Arazoren bat gertatu da datuak kargatzean.');
    });

    tags.$get().then(function(data) {
        $scope.tags = data.tags;
    }).catch(function(errorCallback) {
        $ionicLoading.hide();
        ErrorCall.Message('Arazoren bat gertatu da datuak kargatzean.');
    });

    staticPages.$get().then(function(data) {
        $scope.staticPages = data.staticpages;
    }).catch(function(errorCallback) {
        $ionicLoading.hide();
        ErrorCall.Message('Arazoren bat gertatu da datuak kargatzean.');
    });

    socialNetworks.$get().then(function(data) {
        $scope.socialNetworks = data.socialnetworks;
    }).catch(function(errorCallback) {
        $ionicLoading.hide();
        ErrorCall.Message('Arazoren bat gertatu da datuak kargatzean.');
    });

    $scope.href = function(url, target) {
        window.open(url, target);
    }

    $scope.search = function(search) {

        if (search !== undefined) {

            var name = 'all';
            var tag = 'all';
            var category = 'all';

            if (search.category !== undefined) {
                category = search.category;
            }

            if (search.tag !== undefined) {
                tag = search.tag;
            }

            if (search.recipe !== undefined) {
                name = search.recipe;
            }

            $location.url('/app/search/' + name + '/' + tag + '/' + category);
            $ionicSideMenuDelegate.toggleRight();

        }

    };

});
