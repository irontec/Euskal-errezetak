'use strict';

angular.module('EuskalErrezetak.controllers').factory('SocialNetworksMapper', function($http, $resource, baseUrl) {
    
    var urlGet = baseUrl + '/rest/social-networks';
    
    var Categories = $resource(urlGet, null, {
        'update': {
            method: 'PUT'
        }
    });
    
    return Categories;
    
});