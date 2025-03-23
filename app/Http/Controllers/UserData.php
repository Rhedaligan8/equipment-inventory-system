<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserData extends Controller
{
    public function getUsersData()
    {
        $query = User::select(['user_id', 'username', 'role', 'status', 'created_at', 'updated_at']);
        return DataTables::of($query)->make(true);
    }
}
