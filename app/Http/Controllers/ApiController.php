<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class ApiController extends Controller
{
    //
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        $inputs = $request->all();

        $status = 'inactive';
        if (array_key_exists('status', $inputs)) {
            if (strtolower($inputs['status']) === 'active')
                $status = strtolower($inputs['status']);
        } else {
            if ($user->status !== '') $status = $user->status;
        }

        $data_update['status'] = $status;

        $position = null;
        if (array_key_exists('position', $inputs))
            $position = strtoupper($inputs['position']);
        else
            $position = $user->position;

        $data_update['position'] = $position;

        $user->update($data_update);

        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
