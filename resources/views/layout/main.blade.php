<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>


        body {
            background:#0f172a;
            color:#e5e7eb;
            font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Arial,sans-serif;
            margin:0;
        }

        /* центральная колонка */
        .page {
            width:600px;
            margin:40px auto;
        }

        /* заголовки */
        h3,h5{
            color:#f1f5f9;
            margin-bottom:6px;
        }

        /* форма поиска */
        .worker-form{
            padding:12px;
            border:1px solid #334155;
            border-radius:8px;
            background:#111827;
            margin:20px 0;
        }

        .worker-form input{
            background:#1e293b;
            border:1px solid #334155;
            color:#e5e7eb;
            border-radius:6px;
            padding:6px 8px;
            margin:4px;
        }

        .worker-form input::placeholder{
            color:#94a3b8;
        }

        /* карточка работника */
        .worker-card{
            background:#111827;
            border:1px solid #334155;
            border-radius:8px;
            padding:10px;
            margin-bottom:10px;
        }

        /* кнопки */
        button,.btn{
            background:#2563eb;
            border:none;
            color:white;
            padding:6px 12px;
            border-radius:6px;
        }

        button:hover,.btn:hover{
            background:#1d4ed8;
        }
        .worker-form input[name="from"],
        .worker-form input[name="to"]{
            width:92px;
        }
        /* карточки работников */
        .bg-light{
            background:#111827 !important;
            color:#e5e7eb !important;
            border:1px solid #334155 !important;
        }

        /* текст внутри */
        .bg-light a,
        .bg-light form,
        .bg-light div{
            color:#e5e7eb;
        }

        /* кнопка удалить */
        input[type="submit"]{
            background:#ef4444;
            color:white;
            border:none;
            padding:4px 10px;
            border-radius:6px;
        }
    </style>
</head>


<body>

<div class="page">

    <h3>Таблица рабочих</h3>
    <h5>Система управления персоналом</h5>

    @yield('content')

</div>

</body>
</html>
