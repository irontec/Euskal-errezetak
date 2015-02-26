'use strict';

// Ionic Starter App, v0.9.20

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js

angular.module('EuskalErrezetak.controllers', []);

angular.module('EuskalErrezetak', ['ionic', 'config', 'EuskalErrezetak.controllers', 'ngResource', 'pascalprecht.translate'])
    .config(function($stateProvider, $urlRouterProvider, $translateProvider) {

        $stateProvider

        .state('app', {
            url: '/app',
            abstract: true,
            templateUrl: 'modules/menu/views/menu.html',
            controller: 'MenuCtrl'
        })

        .state('app.categories', {
            url: '/categories',
            views: {
                'menuContent': {
                    templateUrl: 'modules/categories/views/list.html',
                    controller: 'CategoriesCtrlList'
                }
            }
        })

        .state('app.category', {
            url: '/categories/:id',
            views: {
                'menuContent': {
                    templateUrl: 'modules/categories/views/category.html',
                    controller: 'CategoriesCtrlView'
                }
            }
        })

        .state('app.recipe', {
            url: '/recipes/:id',
            views: {
                'menuContent': {
                    templateUrl: 'modules/recipes/views/recipe.html',
                    controller: 'RecipesCtrl'
                }
            }
        })

        .state('app.staticPages', {
            url: '/static-page/:id',
            views: {
              'menuContent' :{
                templateUrl: 'modules/staticPages/views/staticPage.html',
                controller: 'StaticPagesCtrl'
              }
            }
          })
          
          .state('app.search', {
            url: '/search/:name/:tag/:category',
            views: {
              'menuContent' :{
                templateUrl: 'modules/search/views/search.html',
                controller: 'SearchCtrl'
              }
            }
          })

      // if none of the above states are matched, use this as the fallback
      $urlRouterProvider.otherwise('/app/categories');
        
        
        $translateProvider.translations('es', {
            'Resultados': 'Resultados',
            'Nombre de la receta': 'Nombre de la receta',
            'Atras': 'Atras',
            'Ingredientes': 'Ingredientes',
            'Categorias': 'Categorias',
            'Categoria': 'Categoria',
            'paginas': 'paginas',
            'Buscador': 'Buscador',
            'Etiqueta': 'Etiqueta',
            'Etiquetas': 'Etiquetas',
            'Buscar': 'Buscar',
            'Siguenos en': 'Siguenos en'
        });

        $translateProvider.translations('eu', {
            'Resultados': 'Bilaketaren emaitzak',
            'Nombre de la receta': 'Errezetaren izena',
            'Atras': 'Atzera',
            'Ingredientes': 'Osagaiak',
            'Categorias': 'Kategoriak',
            'Categoria': 'Kategoria',
            'paginas': 'Atalak',
            'Buscador': 'Bilatzailea',
            'Etiqueta': 'Etiketa',
            'Etiquetas': 'Etiketak',
            'Buscar': 'Bilatu',
            'Siguenos en': 'Jarrai gaitzazu'
        });
        
        $translateProvider.preferredLanguage('eu');

    })
    .run(function($ionicPlatform) {
    
        if (window.StatusBar) {
            // org.apache.cordova.statusbar required
            StatusBar.hide();
            ionic.Platform.fullScreen();
        }

        $ionicPlatform.ready(function() {
            if(window.cordova && window.cordova.plugins.Keyboard) {
                cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
        }
            
        });
    })
    .constant(
        'baseUrl', 'http://test213.irontec.com/EuskalErrezetak/'
    );