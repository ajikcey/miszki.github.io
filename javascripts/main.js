$(function() {
  $('button').on('click', function() {
    var form = $(this).parents('form');
    var name = form.parent().find('input[name="name"]');
    name.find('div').text(name.val());
    var password = form.find('input[name="password"]');
    password.parent().find('div').text(password.val());
  });      
});
