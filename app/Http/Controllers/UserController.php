<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function index(Request $request) : View
    {
        $users = $this->getUsers($request);
        return view('backend.users.list', compact([
            'users',
        ]));
    }

    public function create () : View
    {
        return view('backend.users.create');
    }

    public function store () : RedirectResponse
    {
        return redirect()->back()->with('status', [
            'type' => 'success',
            'msg' => __('user.store.successful')
        ]);
    }

    public function edit () : View
    {
        return view('');
    }

    public function update () : RedirectResponse
    {
        return redirect()->back()->with('status', [
            'type' => 'success',
            'msg' => __('user.edit.successful')
        ]);
    }

    public function getUsers(Request $request) : LengthAwarePaginator
    {
        $preparedQ = null;
        if($request->get('query'))
            $preparedQ = '%' . str_replace(' ', '%', $request->get('query')) . '%';

        return User::withTrashed()
            ->when($request->get('query'), function (Builder $query) use ($preparedQ) {
                $query->where('id', 'LIKE', $preparedQ)
                    ->orwhere('name', 'LIKE', $preparedQ)
                    ->orwhere('email', 'LIKE', $preparedQ)
                    ->orderBy('id')
                    ->orderBy('name')
                    ->orderBy('email');
            })
            ->paginate(20)
            ->withQueryString();
    }

}
