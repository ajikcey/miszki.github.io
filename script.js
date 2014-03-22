// Возведение числа в степень Math.pow(base, exponent)

/* 
	Ключи
*/
var secret_key = 0;
var public_key = 0;

$(function() {
	$('button').on('click', function() {
		var form = $(this).parents('#form');
		var name = form.find('input[name="name"]');
		name.parent().find('span').html(name.val());
		var password = form.find('input[name="password"]');
		password.parent().find('span').html(password.val());
	});
	$.post( "api.php", function(data) {
		alert( data );
	})
});

/* 
	Случайное целое между min и max
	использование Math.round() даст неравномерное распределение!
*/
function getRandomInt(min, max)
{
	return Math.floor(Math.random() * (max - min + 1)) + min;
}

/* 
	Генерация ключей (secret_key и public_key)
*/
function keys_generate() {
	
}

/* 
	Генерация псевдопростых чисел (p и q) для использования в алгоритме
*/
function simple_num_generate() {
	
}

/*
	Создание подписи
	1 Выбор случайного числа k \in (0,q)
	2 Вычисление r=(g^k \mod p) \mod q
	3 Вычисление s=k^{-1}(H(m)+x*r) \mod q
	4 Выбор другого k, если оказалось, что r=0 или s=0
*/
function signature_post() {
	var q = 0; // ???
	var p = 0; // ???
	var x = 0; // ???
	var m = 0; // ???
	var k = getRandomInt(0, q);
	var r = (Math.pow(g, k) % p) % q;
	var hash = CryptoJS.SHA256(m);
	var s = Math.pow(k, -1)*(hash + x*r) % q;
}

/*
	Проверка подписи
	1 Вычисление w=s^{-1} \mod q
	2 Вычисление u_1 = H(m)\cdot w \mod q
	3 Вычисление u_2 = r\cdot w \mod q
	4 Вычисление v = (g^{u_1}\cdot y^{u_2} \mod p) \mod q 
*/
function signature_verification() {
	
}
