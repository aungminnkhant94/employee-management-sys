<?php

namespace App\Traits;

use App\Traits\permissionTrait;

trait PermissionTrait
{
    public function hasPermission()
    {
        //For Departments
        if
        (!isset(auth()->user()->role->permission['name']['department']["can-add"]) && \Route::is('departments.create'))
        {
            return abort(401);
        }
        
        if
        (!isset(auth()->user()->role->permission['name']['department']["can-edit"]) && \Route::is('departments.edit'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['department']["can-view"]) && \Route::is('departments.index'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['department']["can-delete"]) && \Route::is('departments.delete'))
        {
            return abort(401);
        }

        //For Roles

        if
        (!isset(auth()->user()->role->permission['name']['role']["can-add"]) && \Route::is('roles.create'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['role']["can-edit"]) && \Route::is('roles.edit'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['role']["can-view"]) && \Route::is('roles.index'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['role']["can-delete"]) && \Route::is('roles.delete'))
        {
            return abort(401);
        }

        //For Permissions
        if
        (!isset(auth()->user()->role->permission['name']['permission']["can-add"]) && \Route::is('permissions.create'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['permission']["can-edit"]) && \Route::is('permissions.edit'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['permission']["can-view"]) && \Route::is('permissions.index'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['permission']["can-delete"]) && \Route::is('permissions.delete'))
        {
            return abort(401);
        }

        //For Users

        if
        (!isset(auth()->user()->role->permission['name']['user']["can-add"]) && \Route::is('users.create'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['user']["can-edit"]) && \Route::is('users.edit'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['user']["can-view"]) && \Route::is('users.index'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['user']["can-delete"]) && \Route::is('users.delete'))
        {
            return abort(401);
        }

        //For Leaves
        if
        (!isset(auth()->user()->role->permission['name']['leave']["can-add"]) && \Route::is('leaves.create'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['leave']["can-edit"]) && \Route::is('leaves.edit'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['leave']["can-view"]) && \Route::is('leaves.index'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['leave']["can-delete"]) && \Route::is('leaves.delete'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['leave']["can-control"]) && \Route::is('leaves.show'))
        {
            return abort(401);
        }

        //For Notices

        if
        (!isset(auth()->user()->role->permission['name']['notice']["can-add"]) && \Route::is('notices.create'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['notice']["can-edit"]) && \Route::is('notices.edit'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['notice']["can-view"]) && \Route::is('notices.index'))
        {
            return abort(401);
        }

        if
        (!isset(auth()->user()->role->permission['name']['notice']["can-delete"]) && \Route::is('notices.delete'))
        {
            return abort(401);
        }

    }
}