<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Створити користувача</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f7fafc;
        }
        h2 {
            font-weight: 600;
            font-size: 1.25rem;
            color: #2d3748;
            margin-bottom: 20px;
        }
        form {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgb(0 0 0 / 0.1);
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #4a5568;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #cbd5e0;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        button, a.button-link {
            padding: 10px 16px;
            font-weight: 600;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            display: inline-block;
            text-align: center;
        }
        button {
            background-color: #48bb78; /* green-600 */
            color: white;
            border: none;
        }
        button:hover {
            background-color: #38a169; /* green-700 */
        }
        a.button-link {
            background-color: #718096; /* gray-500 */
            color: white;
        }
        a.button-link:hover {
            background-color: #4a5568; /* gray-600 */
        }
        .error {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: -12px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h2>Створити користувача</h2>

    <form action="{{ route('chief.users.store') }}" method="POST">
        @csrf

        <label for="name">Ім'я</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="password_confirmation">Підтвердження пароля</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <label for="role">Роль</label>
        <select id="role" name="role" required>
            <option value="">Оберіть роль</option>
            <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Завідувач</option>
            <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Адміністратор</option>
            <option value="3" {{ old('role') == '3' ? 'selected' : '' }}>Лікар</option>
            <option value="4" {{ old('role') == '4' ? 'selected' : '' }}>Медсестра</option>
        </select>
        @error('role')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="buttons">
            <button type="submit">Створити</button>
            <a href="{{ route('chief.users.index') }}" class="button-link">Скасувати</a>
        </div>
    </form>

</body>
</html>
