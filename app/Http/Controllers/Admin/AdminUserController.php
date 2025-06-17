<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $currentUser = auth()->user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|integer|between:1,4',
        ]);

        $newRole = (int) $validatedData['role'];

        // Заборонити адміністратору змінювати свою ж роль
        if ($currentUser->id === $user->id && $newRole !== $user->role) {
            return redirect()->back()
                ->withErrors(['role' => 'Ви не можете змінити свою роль.'])
                ->withInput();
        }

        // Заборонити змінювати роль користувачам з роллю адміністратора (2) іншим адміністраторам
        if ($user->role === 2 && $currentUser->role === 2 && $currentUser->id !== $user->id) {
            return redirect()->back()
                ->withErrors(['role' => 'Ви не можете змінювати роль іншому адміністратору.'])
                ->withInput();
        }

        // Заборонити змінювати роль завідувачу (роль 1)
        if ($user->role === 1 && $newRole !== 1) {
            return redirect()->back()
                ->withErrors(['role' => 'Ви не можете змінювати роль завідувача.'])
                ->withInput();
        }

        // Заборонити адміністратору призначати роль вищу за його власну роль
        if ($newRole < $currentUser->role) {
            return redirect()->back()
                ->withErrors(['role' => 'Ви не можете призначити роль вищу за вашу.'])
                ->withInput();
        }

        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'Користувача оновлено.');
    }

    public function destroy(User $user)
    {
        $currentUser = auth()->user();

        if ($currentUser->id === $user->id) {
            return redirect()->back()->withErrors(['error' => 'Ви не можете видалити себе.']);
        }

        if ($user->role === 2 && $currentUser->role === 2) {
            return redirect()->back()->withErrors(['error' => 'Ви не можете видалити іншого адміністратора.']);
        }

        if ($user->role === 1 && $currentUser->role === 2) {
            return redirect()->back()->withErrors(['error' => 'Ви не можете видалити завідувача.']);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Користувача видалено.');
    }
}
