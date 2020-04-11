<?php

namespace App\Http\Controllers\Administrator;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartment;
use App\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('name')->get();
        return view('departments.index', [
            'departments' => $departments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Requests\StoreDepartment $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartment $request)
    {
        $departmentData = $request->validated();

        $department = new Department();
        $department->name = $departmentData['name'];
        $department->save();

        return redirect(route('administrator.departments.index'));;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $department = Department::findByUuid($uuid)
            ->with('users');

        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $department = Department::findByUuid($uuid);
        return view('departments.edit', [
            'department' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Requests\StoreDepartment $request
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepartment $request, $uuid)
    {
        $departmentData = $request->validated();

        $department = Department::findByUuid($uuid);
        $department->name = $departmentData['name'];
        $department->save();

        return redirect(route('administrator.departments.index'));;
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function delete($uuid)
    {
        $department = Department::findByUuid($uuid);
        return view('departments.delete', [
            'department' => $department
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $department = Department::findByUuid($uuid);

        User::where('department_id', $department->id)
            ->update(['department_id' => null]);

        $department->delete();

        return redirect(route('administrator.departments.index'));
    }
}
