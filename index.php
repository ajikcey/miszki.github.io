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

            <p>g: <span id="dsa_g"></span></p>

            <p>p: <span id="dsa_p"></span></p>

            <p>q: <span id="dsa_q"></span></p>

            <p>x: <span id="dsa_x"></span></p>

            <p>y: <span id="dsa_y"></span></p>

            <p>r: <span id="dsa_r"></span></p>

            <p>s: <span id="dsa_s"></span></p>

            <p>hash: <span id="dsa_hash"></span></p>
        </td>
        <td>
            <h3>Запрос на аутентификацию</h3>

            <p>Дата принятия сообщения: <span id="date_in"></span></p>

            <p>Подпись: <span id="sign"></span></p>

            <p>Расшифровка подписи: <span id="sign_decode"></span></p>

            <p>Разница во времени: <span id="date_dif"></span></p>

            <p>Результат: <b id="result"></b></p>
        </td>
    </tr>
</table>

<button onclick="start()">Аутентификация</button>
<button onclick="genkeys()">Генерация ключей</button>
<button onclick="auth()">Аутентификация</button>


</div>
<!-- jquery -->
<script src="/jquery.js"></script>
<!-- crypto -->
<script src="/sha256.js"></script>
<!-- script -->
<script src="script.js"></script>
</body>
</html>