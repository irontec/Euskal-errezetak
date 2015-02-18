'use strict';

angular.module('EuskalErrezetak.controllers').factory('StaticPagesMapper', function($http, $resource) {
    
    var urlGet = 'http://test218.irontec.com/EuskalErrezetak/rest/static-pages';
    
    var Categories = $resource(urlGet, null, {
        'update': {
            method: 'PUT'
        }
    });
    
    return Categories;
    
});