'use strict';

angular.module('EuskalErrezetak.controllers').factory('CategoriesMapper', function($http, $resource) {
    
    var urlGet = 'http://test218.irontec.com/EuskalErrezetak/rest/categories';
    
    var Categories = $resource(urlGet, null, {
        'update': {
            method: 'PUT'
        }
    });
    
    return Categories;
    
});