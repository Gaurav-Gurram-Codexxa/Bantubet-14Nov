<?php

namespace App\Http\Controllers;

use App\Library\DataTable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {
        return view('user');
    }

    public function changePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (!Hash::check($request->old_password, $user->password))
            return response()->json(['status' => false, 'message' => __('Old password does not match')]);

        if ($request->new_password !== $request->confirm_password)
            return response()->json(['status' => false, 'message' => __('Password does not match')]);

        $user->update(['password' => Hash::make($request->new_password)]);

        return response()->json(['status' => true, 'message' => __('Password changed')]);
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $is_admin = $request->is_admin ?? 0;
        $language = 'en';
        $currency = 'aoa';
        $timezone = '+00:00';


        User::create(compact(
            'name',
            'email',
            'password',
            'is_admin',
            'language',
            'currency',
            'timezone',
        ));

        return response()->json(['message' => 'success']);
    }

    public function update(Request $request, User $user)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['is_admin'] = $request->is_admin ?? 0;
        if (strlen($request->password) > 0)
            $data['password'] = Hash::make($request->password);


        $user->update($data);

        return response()->json(['message' => 'success']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'deleted successfully']);
    }

    public function list(Request $request)
    {
        $config = [
            'table' => 'users',
            'columns' => [
                'id',
                'name',
                'email',
                'id',
                'is_admin'
            ],
            'search_by' => ['name', 'email'],
            'order_by' => [],
            'where' => [],
            'joins' => [],
            'default_order' =>
            ['id' => 'DESC'],
        ];


        $data = DataTable::getData($config);

        $response = [];

        foreach ($data['data'] as $d) {
            $json = json_encode($d);
            $response[] = [
                $d->name,
                $d->email,
                $d->is_admin ? 'admin' : 'user',
                "<span title='Edit' class='fa fa-pencil mr-2' style='margin-right: 8px;' onclick='editUser($json)'></span><span title='Delete' class='fa fa-trash' onclick='deleteUser({$d->id})'></span>"
            ];
        }

        $data['data'] = $response;

        return response()
            ->json($data);
    }
}
