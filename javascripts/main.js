$(function() {
  $('button').on('click', function() {
    var form = $(this).parents('#form');
    var name = form.find('input[name="name"]');
    name.parent().find('span').html(name.val());
    var password = form.find('input[name="password"]');
    password.parent().find('span').html(password.val());
  });      
});


// использование Math.round() даст неравномерное распределение!
function getRandomInt(min, max)
{
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
