<?php

namespace App\Http\Controllers;

use App\FtpUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $items = FtpUser::paginate();
        $pagination = $items->render();

        return view('pureftp.users', compact('items', 'pagination'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function batchDelete(Request $request)
    {
        FtpUser::whereKey($request->input('delete', []))->delete();
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
            $user = FtpUser::find($userid);
        } else {
            $user = new FtpUser(['Status' => 1]);
        }

        return view('pureftp.edit_user', compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $userid = $request->input('userid');
        if ($userid) {
            $user = FtpUser::find($userid);
        } else {
            $user = new FtpUser();
        }

        $newuser = $request->input('newuser', []);
        if ($newuser['Password']) {
            $newuser['Password'] = md5($newuser['Password']);
        } else {
            unset($newuser['Password']);
        }
        $user->fill($newuser)->save();
        return $this->showMessage(null, null, [
            ['继续添加', url('user/edit')],
            ['返回列表', url('user')]
        ]);
    }
}
