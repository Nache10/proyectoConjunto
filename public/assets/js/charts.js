

var genericAjax = function (url, data, type, callBack) {
    $.ajax({
        url: url,
        data: data,
        type: type,
        dataType : 'json', // fuerza que la devolución no sea en texto sino json
    })
    .done(function( res ) {   // Suele ser texto, pero carmelo ha hecho que la llamada te devuelva un 
                              // json(variable con formato json).
        console.log('ajax done');
        console.log( res );
        callBack( res );
    })
    .fail(function( xhr, status, errorThrown ) {
        console.log('ajax fail');
        console.log(xhr.responseJSON.message);
    })
    .always(function( xhr, status ) {
        console.log('ajax always');
    });
};

genericAjax('/wordpressconjunto/api/conexionespacceso',null,'get',function( res ){
    
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: res.labelsGraph1 ,
            datasets: [{
                label: ['Conections for each Access Point'],
                data: res.countGraph1,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(99, 214, 230, 0.2)',
                    'rgba(122, 34, 189, 0.2)',
                    'rgba(212, 21, 72, 0.2)',
                    
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(99, 214, 230, 1)',
                    'rgba(122, 34, 189, 1)',
                    'rgba(212, 21, 72, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    }); 
    
});

$('#modelo').change(function(){
    var valor = $(this).val();
    genericAjax('/wordpressconjunto/api/access1',{modelo:valor},'post',function( res ){
        var nachosets = [    
                        { 
                            data: res.cuenta,
                            label: res.modelo,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            fill: false
                        }
                    ];
    $('#thirdChart').empty();
    var ctx = document.getElementById('thirdChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels:res.fechas,
            datasets: nachosets,
        },
        options: {
        title: {
          display: true,
          text: 'Connections on '+res.modelo,
        }
        }
    });
        
    });
});
genericAjax('/wordpressconjunto/api/access1',{modelo:'CTP-A'},'post',function( res ){
    var nachosets = [    
                    { 
                        data: res.cuenta,
                        label: res.modelo,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false
                    }
                ];
$('#thirdChart').empty();
var ctx = document.getElementById('thirdChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels:res.fechas,
        datasets: nachosets,
    },
    options: {
    title: {
      display: true,
      text: 'Connections on '+res.modelo,
    }
    }
});
    
});