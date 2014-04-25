function genkeys() {
    $.get('/api.php?func=genkeys',
        function (o) {
            var keys = JSON.parse(o);

            $('#dsa_x').val(keys['x']);
            $('#dsa_y').val(keys['y']);
            $('#dsa_q').val(keys['q']);
            $('#dsa_s').val(keys['s']);
        }
    );
    return true;
}

function auth() {

    $.ajax({
        type: "POST",
        url: '/api.php?func=auth',
        data: {
            s: $('#dsa_s').val(),
            q: $('#dsa_q').val(),
            y: $('#dsa_y').val() },
        success: function (o) {
            var data = JSON.parse(o);

            $('#date_in').text(data['date_in']);
            $('#result').text(data['result']);
        }
    });
}

function start() {
    genkeys();
    auth();
}