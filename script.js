function genkeys() {
    $.get('/api.php?func=genkeys',
        function (o) {
            var keys = JSON.parse(o);

            $('#dsa_g').text(keys['g']);
            $('#dsa_p').text(keys['p']);
            $('#dsa_q').text(keys['q']);
            $('#dsa_x').text(keys['x']);
            $('#dsa_y').text(keys['y']);
            $('#dsa_r').text(keys['r']);
            $('#dsa_s').text(keys['s']);
        }
    );
    return true;
}

function auth() {

    //alert(r);

    $.ajax({
        type: "POST",
        url: '/api.php?func=auth',
        data: { r: $('#dsa_r').text(),
            s: $('#dsa_s').text(),
            q: $('#dsa_q').text(),
            g: $('#dsa_g').text(),
            p: $('#dsa_p').text(),
            y: $('#dsa_y').text() },
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