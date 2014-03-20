$(function() {
  alert();
  $('button').on('click', function() {
    var form = $(this).parents('form').
    var name = form.find('input[name="name"]');
    var password = form.find('input[name="password"]');
    alert(name + ' ' + password);
    return false;
  });      
});
