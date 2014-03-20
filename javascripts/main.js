$(function() {
  $('button').on('click', function() {
    var form = $(this).parents('#form');
    var name = form.find('input[name="name"]');
    name.parent().find('span').html(name.val());
    var password = form.find('input[name="password"]');
    password.parent().find('span').html(password.val());
  });      
});
