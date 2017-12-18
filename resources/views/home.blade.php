@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-primary btn-xs pull-right" ng-click="initProgram()">
                        + Add New Program
                    </button>
                    My Program
                </div>

                <div class="panel-body">
                <p> Processing Time :-<?php echo(microtime());?></p>
                    <table class="table table-bordered table-striped table-responsive " ng-if="programs.length>0">
                        <tbody>
                        <tr>
                            <th>
                                SN.
                            </th>
                            <th>
                                Program Name
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        <tr ng-repeat="(index, program) in programs">
                            <td>@{{index + 1}}</td>
                            <td>@{{program.name}}</td>
                            <td>@{{program.description}}</td>
                            <td>
                                <button  class="btn btn-primary btn-xs" ng-click="initEdit(index)">Edit</button>
                                <button class="btn btn-danger btn-xs" ng-click="programDelete(index)">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="add_program_model">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Program</h4>
            </div>
            <form ng-submit="addProgram()">
            <div class="modal-body">

                <div class="alert alert-danger" ng-if="errors.length > 0">
                    <ul>
                        <li ng-repeat="error in errors">@{{ error }}</li>
                    </ul>
                </div>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Program Name" class="form-control" ng-model="program.name">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                              placeholder="Program Description" ng-model="program.description"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="update_program_model" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Program</h4>
            </div>
            <form ng-submit="updateProgram()">
            <div class="modal-body">

                <div class="alert alert-danger" ng-if="errors.length > 0">
                    <ul>
                        <li ng-repeat="error in errors">@{{ error }}</li>
                    </ul>
                </div>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" placeholder="Program Name" class="form-control"
                           ng-model="edit_program.name">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea cols="30" rows="5" class="form-control"
                              placeholder="Program Description" ng-model="edit_program.description"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
