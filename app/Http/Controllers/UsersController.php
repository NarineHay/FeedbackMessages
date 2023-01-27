<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function exportExcel(){
        $file_name = 'users_'.date('Y_m_d').'.xlsx';
        return Excel::download(new UserExport, $file_name);
    }

    public function exportExcel_api(){
        $file_name = 'users_'.date('Y_m_d').'.xlsx';

        $contents = Excel::store(new UserExport, "public/users_excel/$file_name");
        $path = Storage::disk('public')->path("/users_excel/$file_name");
        echo $path;

    }
}
