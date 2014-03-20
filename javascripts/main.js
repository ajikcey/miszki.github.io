$(function() {
  $('button').on('click', function() {
    var form = $(this).parents('form');
    var name = form.find('input[name="name"]').val();
    var password = form.find('input[name="password"]').val();
    alert(name + ' ' + password);
    return false;
  });      
});
