
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

// window.Vue = require('vue');

import './bootstrap';
import 'angular';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });
var app = angular.module("mainApp", []);

app.controller("ProgramsController", function($scope, $http) {
    $scope.programs = [];
     $scope.edit_program = [];

    // List tasks
    $scope.loadPrograms = function () {
        $http.get('programs')
            .then(function success(e) {
                // console.log('hello');
                $scope.programs = e.data.programs;
            });
    };
    $scope.loadPrograms();
    $scope.errors = [];

    $scope.program = {
        name: '',
        description: ''
    };
    $scope.initProgram = function () {
        $scope.resetForm();
        $("#add_program_model").modal('show');
    };

    // Add new Task
    $scope.addProgram = function () {
        $http.post('programs', {
            name: $scope.program.name,
            description: $scope.program.description
        }).then(function success(e) {
            $scope.resetForm();
            $scope.programs.push(e.data.programs);
            $("#add_program_model").modal('hide');

        }, function error(error) {
            console.log(error.data.message);
            //$scope.recordErrors(error);
        });
    };

    $scope.recordErrors = function (error) {
        console.log(error.data);
        if (error.data.errors.name) {
            $scope.errors.push(error.data.errors.name[0]);
        }

        if (error.data.errors.description) {
            $scope.errors.push(error.data.errors.description[0]);
        }
    };

    $scope.resetForm = function () {
        $scope.program.name = '';
        $scope.program.description = '';
        $scope.errors = [];
    };

    // initialize update action
    $scope.initEdit = function (index) {
        $scope.errors = [];
        $scope.edit_program = $scope.programs[index];
        console.log($scope.edit_program);
        $("#update_program_model").modal('show');
    };

    // update the given task
    $scope.updateProgram = function () {
        $http.patch('programs/' + $scope.edit_program.id, {
            name: $scope.edit_program.name,
            description: $scope.edit_program.description
        }).then(function success(e) {
            $scope.errors = [];
            console.log(e);
            $("#update_program_model").modal('hide');
        }, function error(error) {
            console.log(error.data.message);
            ///$scope.recordErrors(error);
        });
    };

    //delete program
    $scope.programDelete =function(index){
        let conf = confirm("Do you ready want to delete this program?");
        if (conf === true) {
            $http.delete('programs/' + $scope.programs[index].id)
            .then(function success(response){
                console.log(response.data.message);
                $scope.programs.splice(index, 1);

            })
        }
    }
});