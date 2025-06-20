<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Вивести список користувачів
    public function index()
{
    $users = User::paginate(10);
    return view('admin.users.index', compact('users'));
}

    
    public function create()
    {
        return view('chief.users.create');
    }

    // Зберегти нового користувача
   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|confirmed|min:8',
        'role' => 'required|string|in:chief,admin,doctor,nurse,pharmacist,adminpharmacist',

    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'role' => $validated['role'],
    ]);

    return redirect()->route('chief.users.index')->with('success', 'Користувача створено!');
}

    // Показати деталі користувача
    public function show(User $user)
    {
        return view('chief.users.show', compact('user'));
    }

    // Форма редагування користувача
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('chief.users.edit', compact('user'));
    }

    // Оновити користувача (без зміни паролю)
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'nullable|in:1,2,3,4,5,6',
            'status' => 'nullable|in:active,inactive',
        ]);

        // Якщо користувач редагує самого себе і він chief або admin — не дозволяти змінювати роль і статус
        if (in_array($user->role, [1, 2]) && auth()->id() === $user->id) {
            unset($validated['role'], $validated['status']);
        }

        $user->update($validated);

        return redirect()->route('chief.users.index')->with('success', 'Користувача оновлено');
    }

    // Видалити користувача
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('chief.users.index')->with('success', 'Користувача видалено');
    }
}
