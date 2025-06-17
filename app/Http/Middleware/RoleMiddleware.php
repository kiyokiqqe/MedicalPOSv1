<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles  Масив ролей (ключів з $roleMap або чисел)
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Якщо користувач не авторизований — заборонити доступ
        if (!Auth::check()) {
            abort(403, 'Доступ заборонено');
        }

        // Мапа ролей: назва => числовий код (з users.role)
        $roleMap = [
            'chief' => 1,
            'admin' => 2,
            'doctor' => 3,
            'nurse' => 4,
            //
            'pharmacist' => 5,
            'adminpharmacist' => 6,
            //
            'chief_or_admin' => [1, 2],
        ];

        $allowedRoles = [];

        foreach ($roles as $role) {
            if (isset($roleMap[$role])) {
                if (is_array($roleMap[$role])) {
                    $allowedRoles = array_merge($allowedRoles, $roleMap[$role]);
                } else {
                    $allowedRoles[] = $roleMap[$role];
                }
            } elseif (is_numeric($role)) {
                // Якщо передано число як рядок — перетворюємо в int
                $allowedRoles[] = (int) $role;
            }
            // Якщо роль не знайдена і не число — ігноруємо
        }

        // Якщо список дозволених ролей пустий — доступ заборонено
        if (empty($allowedRoles)) {
            abort(403, 'Доступ заборонено');
        }

        $userRole = Auth::user()->role;

        // Перевіряємо, чи роль користувача в списку дозволених
        if (!in_array($userRole, $allowedRoles, true)) {
            abort(403, 'Доступ заборонено');
        }

        return $next($request);
    }
}
