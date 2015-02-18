'use strict';

angular.module('EuskalErrezetak.controllers').factory('SocialNetworksMapper', function($http, $resource) {
    
    var urlGet = 'http://test218.irontec.com/EuskalErrezetak/rest/social-networks';
    
    var Categories = $resource(urlGet, null, {
        'update': {
            method: 'PUT'
        }
    });
    
    return Categories;
    
});