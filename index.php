<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="description" content="Miszki.github.io : Репозиторий для лабораторной работы №3 по методам и средствам защиты информации" />
    <link rel="stylesheet" type="text/css" media="screen" href="stylesheets/stylesheet.css">
    <title>Miszki.github.io</title>
  </head>
  <body>
    <form>
      <input type="text" name="name">
      <input type="text" name="password">
      <button>Отправить</button>
    </form>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
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
    </script>
  </body>
</html>