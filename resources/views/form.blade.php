<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Форма</title>
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #f8f9fa;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card p-4">
                <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Введите ваше имя" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Введите ваш телефон" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Введите ваш email" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('#contactForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        try {
            const response = await fetch('/contact', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            });

            const result = await response.json();
            alert(result.success ? 'Заявка отправлена' : 'Ошибка');
        } catch (error) {
            alert('Ошибка при отправке формы');
            console.error(error);
        }
    });
</script>
</body>
</html>
