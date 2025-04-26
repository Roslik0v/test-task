<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать контакт</title>
</head>
<body>
<h1>Редактировать контакт: {{ $contact->name }}</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('contacts.update', $contact->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <label for="name">Имя:</label>
    <input type="text" name="name" id="name" value="{{ $contact->name }}"><br>

    <label for="phone">Телефон:</label>
    <input type="text" name="phone" id="phone" value="{{ old('phone', $contact->phone) }}"><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email', $contact->email) }}"><br>

    <button type="submit">Обновить контакт</button>
</form>


@if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
