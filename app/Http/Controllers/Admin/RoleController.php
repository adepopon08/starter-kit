<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data = [
            'roles' => Role::search(request()->search)->paginate(1),
        ];
        return view('admin.pages.role.index', $data);
    }

    public function create()
    {
        return view('admin.pages.role.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required'
        ]);

        $created = Role::create($validated);
        if ($created) {
            return redirect()->route('admin.roles.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.roles.index')->with('error', 'Data gagal disimpan.');
    }

    public function edit($id)
    {
        $data = [
            'role' => Role::find($id)
        ];
        return view('admin.pages.role.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'role' => 'required'
        ]);

        $created = Role::find($id);
        $created->update($validated);
        if ($created) {
            return redirect()->route('admin.roles.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.roles.index')->with('error', 'Data gagal disimpan.');
    }

    public function destroy($id)
    {
        $model = Role::find($id)->delete();
        if ($model) {
            return redirect()->route('admin.roles.index')->with('success', 'Data berhasil dihapus.');
        }
        return redirect()->route('admin.roles.index')->with('error', 'Data gagal dihapus.');
    }
}
