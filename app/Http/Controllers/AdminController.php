<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view('pureftp.admin');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function wellcome(Request $request)
    {

        return view('pureftp.wellcome');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account(Request $request)
    {

        $items = User::all();

        return view('pureftp.account', compact('items'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function batchDelete(Request $request)
    {
        User::whereKey($request->input('delete', []))->delete();
        return $this->showMessage('信息已删除');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $userid = $request->input('userid');
        if ($userid) {
            $user = User::find($userid);
        } else {
            $user = new User();
        }


        return view('pureftp.edit_account', compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function storeAccount(Request $request)
    {
        $userid = $request->input('userid');
        if ($userid) {
            $newuser = User::find($userid);
        } else {
            $newuser = new User();
        }

        $user = $request->input('user', []);
        if ($user['password']) {
            $user['password'] = Hash::make($user['password']);
        } else {
            unset($user['password']);
        }

        $newuser->fill($user)->save();

        return $this->showMessage(null, null, [
            ['继续添加', url('admin/account/edit')],
            ['返回列表', url('admin/account')]
        ]);
    }
}
