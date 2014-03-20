$(function() {
  $('button').on('click', function() {
    var form = $(this).parents('#form');
    var name = form.find('input[name="name"]');
    alert(name.val());//name.parent().find('div').html(name.val());
    var password = form.find('input[name="password"]');
    password.parent().find('div').html(password.val());
  });      
});
