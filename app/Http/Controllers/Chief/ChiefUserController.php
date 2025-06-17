<?php

namespace App\Http\Controllers\Chief;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ChiefUserController extends Controller
{
    // Відображення списку користувачів з пагінацією
    public function index()
    {
        $users = User::paginate(10);
        return view('chief.users.index', compact('users'));
    }

    // Форма створення нового користувача
    public function create()
    {
        return view('chief.users.create');
    }

    // Збереження нового користувача у базу
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|integer|in:1,2,3,4',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'status' => 1, // або за замовчуванням, якщо потрібно
        ]);

        return redirect()->route('chief.users.index')->with('success', 'Користувача створено');
    }

    // Показ інформації про конкретного користувача
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('chief.users.show', compact('user'));
    }

    // Форма редагування користувача
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('chief.users.edit', compact('user'));
    }

    // Оновлення користувача в базі
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|integer|in:1,2,3,4',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('chief.users.index')->with('success', 'Користувача оновлено');
    }

    // Видалення користувача
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('chief.users.index')->with('success', 'Користувача видалено');
    }
}
