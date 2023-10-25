<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class DatatableController extends Controller
{
    public function index()
    {
        return view('admin.pages.datatable.index');
    }

    public function lists(Request $request)
    {
        $columns = ['id', 'name', 'email', 'role_id'];
        if ($request->wantsJson()) {
            $data = User::query()->with(['role'])->latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a class="btn btn-primary btn-sm" href="' . route('admin.user.edit', $row->id) . '"><i class="bi bi-pen"></i></a>';
                    $actionBtn .= ' <a role="button"
                    onclick="showConfirmDialog(`Yakin anda akan menghapus data ini?`, () => destroy(`' . $row->id . '`))"
                    class="confirm-delete btn btn-danger btn-sm">
                    <i class="bi bi-trash"></i>
                </a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
