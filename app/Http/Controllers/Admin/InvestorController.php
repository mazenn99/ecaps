<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\User;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investor = User::query()->paginate(20);
        return view('admin.invest.index', compact('investor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.invest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'phone' => 'required', 'username' => 'required|unique:users,username', 'password' => 'required']);
        User::create(['name' => $request->input('name'), 'phone' => $request->input('phone'), 'username' => $request->input('username') , 'password' => bcrypt($request->input('password'))]);
        return redirect(route('invest.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.invest.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.invest.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate(['name' => 'required', 'phone' => 'required', 'username' => 'required']);
        $user->update(['name' => $request->input('name'), 'username' => $request->input('username'), 'phone' => $request->input('phone'), 'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password]);
        return redirect(route('invest.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invest = Investment::findOrFail($id);
        $invest->delete();
        return redirect(route('invest.show' , $invest->user_id));
    }

    public function storeInvest(Request $request) {
        $request->validate(['amount' => 'required' , 'user' => 'required' , 'date' => 'required']);
        $user = User::findOrFail($request->input('user'));
        $user->investments()->create(['amount' => $request->input('amount') , 'investment_date' => $request->input('date')]);
        return redirect(route('invest.show' , $user->id));
    }

    public function investHistory($id) {
        $user = User::findOrFail($id);
        return view('admin.invest.add_invest', compact('user'));
    }
}
