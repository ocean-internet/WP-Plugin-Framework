'use strict';

angular.module('MyPluginApp', ['ngRoute'])
    .run(['$http', function($http) {

        //To flag requests as ajax (for server side detection)
        $http.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    }])
    .config(['$locationProvider', function($locationProvider) {

        //To set up #! mode
        $locationProvider.html5Mode(false).hashPrefix('!');
    }]);
