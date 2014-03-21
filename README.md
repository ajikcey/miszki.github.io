miszki.github.io
================

<a href="http://ajikcey.github.io/miszki.github.io/" target="_blank">Демо</a>

Лабораторная работа №3 по предмету Методы и средства защиты информации

<b>Задание:</b>
Реализовать протокол аутентификации на основе ассиметричной схемы (сетевой вариант).
Алгоритм цифровой подписи: DSA.
Можно (нужно!) взять готовую реализацию алгоритма цифровой подписи.

АЛГОРИТМ ЦИФРОВОЙ ПОДПИСИ DSA
================
Алгоритм цифровой подписи DSA (Digital Signature Algorithm) был предложен в 1991 году Национальным институтом стандартов и технологии США (National Institute of Standards and Technology – NIST) и стал стандартом США в 1993 году. Алгоритм DSA является развитием алгоритмов цифровой подписи Эль Гамаля и К.Шнорра. Ниже приводятся процедуры генерации ключей, генерации подписи и проверки подписи в алгоритме DSA.

Генерация ключей DSA
=========
Отправитель и получатель электронного документа используют при вычислениях большие целые числа:<i>g</i> и <i>p</i> – простые числа, длиной <i>L</i> битов каждое <i>(512 <= L <= 1024)</i>;

<i>q</i> – простое число длиной 160 бит (делитель числа <i>(p – 1)</i>. Числа <i>g, p, q</i> являются открытыми и могут быть общими для всех пользователей сети.

Отправитель выбирает случайное целое число <i>x, 1 < x < q</i>. Число <i>x</i> является <b>секретным ключом</b> отправителя для формирования электронной цифровой подписи.

Затем отправитель вычисляет значение <i>y = g^x mod p</i>.

Число <i>y</i> является <b>открытым ключом</b> для проверки подписи отправителя. Число <i>y</i> передается всем получателям документов.
Генерация подписи DSA
===========
Этот алгоритм предусматривает использование односторонней функции хеширования <i>h(×)</i>.В первой версии стандарта DSS рекомендована функция SHA-1 и, соответственно, битовая длина подписываемого числа 160 бит. Сейчас SHA-1 уже не является достаточно безопасной.

Для того чтобы подписать сообщение <i>M</i>, участник A выполняет следующие шаги:

Шаг 1 – выбирает случайное целое <i>k</i> в интервале <i>[1, q – 1]</i>.

Шаг 2 – вычисляет <i>r = (g^k mod p) mod q</i>.

Шаг 3 – вычисляет <i>s = k^(-1)*{h(M) + x*r} mod q</i>, где <i>h</i> – соответствующая хеш-функция.

Шаг 4 – если <i>s = 0</i> тогда перейти к шагу 1. (Если <i>s = 0</i>, тогда <i>s^(-1) mod q</i> не существует; s требуется на шаге 2 процедуры проверки подписи.)

Шаг 5 – подпись для сообщения <i>М</i> есть пара целых чисел <i>(r, s)</i>.

Проверка подписи DSA
============
Для того чтобы проверить подпись <i>(r, s)</i> сообщения <i>М</i> от участника A, участник B делает следующие шаги:

Шаг 1 – Получает подлинную копию открытого ключа <i>y</i> участника А.

Шаг 2 – Вычисляет <i>w = s^(-1)mod q</i> и хеш-значение сообщения <i>h(М)</i>.

Шаг 3 – Вычисляет значения <i>u1 = h(M)*w mod q</i> и <i>u2 = (r*w) mod q</i>.

Шаг 4 – Используя открытый ключ <i>y</i>, вычисляет значение <i>v = (g^(u1) * y^(u2) mod p) mod q</i>.

Шаг 5 – Признает подпись <i>(r, s)</i> под документом <i>M</i> подлинной, если <i>v = r</i>.

Поскольку <i>r</i> и <i>s</i> являются целыми числами, причем каждое меньше <i>q</i>, подписи DSA имеют длину 320 бит. Безопасность алгоритма цифровой подписи DSA базируется на трудностях задачи дискретного логарифмирования.

Источники
==========
http://monetcom.eu/joomla/webcontent/courses/ISTU/IS/IS_Lec9_ru.pdf

http://ru.wikipedia.org/wiki/DSA

