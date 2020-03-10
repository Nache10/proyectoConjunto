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


$('input[type="radio"]').click(function(){
    
    if($(this).val()==='dia'){
        genericAjax('/wordpressconjunto/api/getrankingday',null,'get',function(res){
            getAppend(res);
            if(res.top1 === null){
                var nachosets = [];
            } else if (res.top2 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                    ];
            } else if (res.top3 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                    ];

            } else if (res.top4 === null){
                    var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                    ];
            }else if (res.top5 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top4.fechas,
                            label: res.top4.mac,
                            borderColor: "#e8c3b9",
                            fill: false
                        }
                    ];
            }else{
                var nachosets = [    
                            { 
                                data: res.top1.fechas,
                                label: res.top1.mac,
                                borderColor: "#3e95cd",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top2.fechas,
                                label: res.top2.mac,
                                borderColor: "#8e5ea2",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top3.fechas,
                                label: res.top3.mac,
                                borderColor: "#3cba9f",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top4.fechas,
                                label: res.top4.mac,
                                borderColor: "#e8c3b9",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top5.fechas,
                                label: res.top5.mac,
                                borderColor: "#c45850",
                                fill: false
                            }
                    ];
            }
            $('#rankingChart').empty();
            var ctx = document.getElementById('rankingChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: res.fechaslabel,
                    datasets: nachosets,
                },
                options: {
                title: {
                  display: true,
                  text: 'Connections through time'
                }
                }
            }); 
        });
    }else if ($(this).val()==='semana'){
        genericAjax('/wordpressconjunto/api/getrankingweek',null,'get',function(res){
            getAppend(res);
            if(res.top1 === null){
                var nachosets = [];
            } else if (res.top2 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                    ];
            } else if (res.top3 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                    ];

            } else if (res.top4 === null){
                    var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                    ];
            }else if (res.top5 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top4.fechas,
                            label: res.top4.mac,
                            borderColor: "#e8c3b9",
                            fill: false
                        }
                    ];
            }else{
                var nachosets = [    
                            { 
                                data: res.top1.fechas,
                                label: res.top1.mac,
                                borderColor: "#3e95cd",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top2.fechas,
                                label: res.top2.mac,
                                borderColor: "#8e5ea2",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top3.fechas,
                                label: res.top3.mac,
                                borderColor: "#3cba9f",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top4.fechas,
                                label: res.top4.mac,
                                borderColor: "#e8c3b9",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top5.fechas,
                                label: res.top5.mac,
                                borderColor: "#c45850",
                                fill: false
                            }
                    ];
            }
            $('#rankingChart').empty();
            var ctx = document.getElementById('rankingChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: res.fechaslabel,
                    datasets: nachosets,
                },
                options: {
                title: {
                  display: true,
                  text: 'Connections through time'
                }
                }
            }); 
        });
    }else if ($(this).val()==='mes'){
        genericAjax('/wordpressconjunto/api/getrankingmonth',null,'get',function(res){
            getAppend(res);
            if(res.top1 === null){
                var nachosets = [];
            } else if (res.top2 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                    ];
            } else if (res.top3 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                    ];

            } else if (res.top4 === null){
                    var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                    ];
            }else if (res.top5 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top4.fechas,
                            label: res.top4.mac,
                            borderColor: "#e8c3b9",
                            fill: false
                        }
                    ];
            }else{
                var nachosets = [    
                            { 
                                data: res.top1.fechas,
                                label: res.top1.mac,
                                borderColor: "#3e95cd",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top2.fechas,
                                label: res.top2.mac,
                                borderColor: "#8e5ea2",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top3.fechas,
                                label: res.top3.mac,
                                borderColor: "#3cba9f",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top4.fechas,
                                label: res.top4.mac,
                                borderColor: "#e8c3b9",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top5.fechas,
                                label: res.top5.mac,
                                borderColor: "#c45850",
                                fill: false
                            }
                    ];
            }
            $('#rankingChart').empty();
            var ctx = document.getElementById('rankingChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: res.fechaslabel,
                    datasets: nachosets,
                },
                options: {
                title: {
                  display: true,
                  text: 'Connections through time'
                }
                }
            }); 
        });
    }else if ($(this).val()==='ano'){
        genericAjax('/wordpressconjunto/api/getrankingyear',null,'get',function(res){
            getAppend(res);
            if(res.top1 === null){
                var nachosets = [];
            } else if (res.top2 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                    ];
            } else if (res.top3 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                    ];

            } else if (res.top4 === null){
                    var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                    ];
            }else if (res.top5 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top4.fechas,
                            label: res.top4.mac,
                            borderColor: "#e8c3b9",
                            fill: false
                        }
                    ];
            }else{
                var nachosets = [    
                            { 
                                data: res.top1.fechas,
                                label: res.top1.mac,
                                borderColor: "#3e95cd",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top2.fechas,
                                label: res.top2.mac,
                                borderColor: "#8e5ea2",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top3.fechas,
                                label: res.top3.mac,
                                borderColor: "#3cba9f",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top4.fechas,
                                label: res.top4.mac,
                                borderColor: "#e8c3b9",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top5.fechas,
                                label: res.top5.mac,
                                borderColor: "#c45850",
                                fill: false
                            }
                    ];
            }
            $('#rankingChart').empty();
            var ctx = document.getElementById('rankingChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: res.fechaslabel,
                    datasets: nachosets,
                },
                options: {
                title: {
                  display: true,
                  text: 'Connections through time'
                }
                }
            }); 
        });
    }else if ($(this).val()==='siempre'){
       genericAjax('/wordpressconjunto/api/getrankingever',null,'get',function(res){
            getAppend(res);
            if(res.top1 === null){
                var nachosets = [];
            } else if (res.top2 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                    ];
            } else if (res.top3 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                    ];

            } else if (res.top4 === null){
                    var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                    ];
            }else if (res.top5 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top4.fechas,
                            label: res.top4.mac,
                            borderColor: "#e8c3b9",
                            fill: false
                        }
                    ];
            }else{
                var nachosets = [    
                            { 
                                data: res.top1.fechas,
                                label: res.top1.mac,
                                borderColor: "#3e95cd",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top2.fechas,
                                label: res.top2.mac,
                                borderColor: "#8e5ea2",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top3.fechas,
                                label: res.top3.mac,
                                borderColor: "#3cba9f",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top4.fechas,
                                label: res.top4.mac,
                                borderColor: "#e8c3b9",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top5.fechas,
                                label: res.top5.mac,
                                borderColor: "#c45850",
                                fill: false
                            }
                    ];
            }
            $('#rankingChart').empty();
            var ctx = document.getElementById('rankingChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: res.fechaslabel,
                    datasets: nachosets,
                },
                options: {
                title: {
                  display: true,
                  text: 'Connections through time'
                }
                }
            });
        });
    }
    
});
var getAppend = function(res){
    $('#rellenarTabla').empty();
    $('#rellenarTabla').append(function(){
        var conexiones = res.conexiones;
        var count = 1;
        var salida = '';
        conexiones.forEach(function(conexion){
            salida += '<tr><td>'+count+'</td><td>'+conexion.mac+'</td><td>'+conexion.count+'</td></tr>'; 
            count = count+1;
        });
        return salida;
    });
}



$('#enviarform').click(function( e ){
    e.preventDefault();
});

genericAjax('/wordpressconjunto/api/getrankingever',null,'get',function(res){
            getAppend(res);
            if(res.top1 === null){
                var nachosets = [];
            } else if (res.top2 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                    ];
            } else if (res.top3 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                    ];

            } else if (res.top4 === null){
                    var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                    ];
            }else if (res.top5 === null){
                var nachosets = [
                        { 
                            data: res.top1.fechas,
                            label: res.top1.mac,
                            borderColor: "#3e95cd",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top2.fechas,
                            label: res.top2.mac,
                            borderColor: "#8e5ea2",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top3.fechas,
                            label: res.top3.mac,
                            borderColor: "#3cba9f",
                            fill: false
                        }
                        ,
                        { 
                            data: res.top4.fechas,
                            label: res.top4.mac,
                            borderColor: "#e8c3b9",
                            fill: false
                        }
                    ];
            }else{
                var nachosets = [    
                            { 
                                data: res.top1.fechas,
                                label: res.top1.mac,
                                borderColor: "#3e95cd",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top2.fechas,
                                label: res.top2.mac,
                                borderColor: "#8e5ea2",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top3.fechas,
                                label: res.top3.mac,
                                borderColor: "#3cba9f",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top4.fechas,
                                label: res.top4.mac,
                                borderColor: "#e8c3b9",
                                fill: false
                            }
                            ,
                            { 
                                data: res.top5.fechas,
                                label: res.top5.mac,
                                borderColor: "#c45850",
                                fill: false
                            }
                    ];
            }
            $('#secondChart').empty();
            var ctx = document.getElementById('rankingChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: res.fechaslabel,
                    datasets: nachosets,
                },
                options: {
                title: {
                  display: true,
                  text: 'Connections through time'
                }
                }
            });
        });

