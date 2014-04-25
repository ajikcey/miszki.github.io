<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <meta name="description" content="DSA"/>
    <link rel="stylesheet" href="/style.css">
    <title>DSA</title>
</head>
<body>

<table>
    <tr>
        <td>
            <h3>Генерация ключей и подписи</h3>

            <div>Время генерации ключей:</div>
            <textarea id="dsa_q"></textarea>

            <div>Закодированное время секретным ключом:</div>
            <textarea id="dsa_s"></textarea>

            <div>Секретный ключ:</div>
            <textarea id="dsa_x" disabled></textarea>

            <div>Открытый ключ:</div>
            <textarea id="dsa_y"></textarea>
        </td>
        <td>
            <h3>Запрос на аутентификацию</h3>

            <p>Данные: <span id="date_in"></span></p>

            <p>Результат: <b id="result"></b></p>
        </td>
    </tr>
</table>

<button onclick="genkeys()">Генерация ключей</button>
<button onclick="auth()">Аутентификация</button>


</div>
<!-- jquery -->
<script src="/jquery.js"></script>
<!-- script -->
<script src="script.js"></script>
</body>
</html>