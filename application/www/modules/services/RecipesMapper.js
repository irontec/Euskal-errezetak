'use strict';

angular.module('EuskalErrezetak.controllers').factory('RecipesMapper', function($http, $resource, baseUrl) {
    
    var urlGet = baseUrl + '/rest/recipes';
    
    var Recipes = $resource(urlGet, null, {
        'update': {
            method: 'PUT'
        }
    });
    
    return Recipes;
    
});