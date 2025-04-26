<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакт</title>
</head>
<body>
<h1>Контакт: {{ $contact->name }}</h1>
<p><strong>Телефон:</strong> {{ $contact->phone }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
</body>
<form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот контакт?');">
    @csrf
    @method('DELETE') <!-- Указываем, что это DELETE-запрос -->

    <button type="submit" class="btn btn-danger">Удалить</button>
</form>
</html>
