var tabla;

function init() {
    
}

async function getReportTme() {
    var dataValues = null
    var fechaIni = document.getElementById('desde').value
    var fechaFin = document.getElementById('hasta').value
    if(fechaIni && fechaFin){

        $.ajax({
            url: '../../controllers/reporte.php?op=reporteTme',
            method: 'POST',
            dataType: 'json',
            data: {
                fechaIni,
                fechaFin,
            },
            success: function (responseData) {

                $('#tme_table').DataTable( {
                    "aProcessing": true,
                    "aServerSide": true,
                    dom: 'Bfrtip',
                    "searching": true,
                    lengthChange: true,
                    colReorder: true,
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5',
                    ],
                    data: responseData
                } );

                let fechas = getFechas(responseData)
                let espera = getAlmacenados(responseData)
                let total = getEsperados(responseData)
                console.log(fechas)
                charBar('myChart','Minutos Espera',espera,'Atendidos',total,fechas)
                
            }, error: function(error) {
                console.log("error",error)
            }
        })
    }else{
        console.log("faltan fechas")
    }
}

function getFechas(obj) {
    let fechas = []
    obj.forEach(item => {
        fechas.push(item.fecha_cita)
    })
    return fechas
}

function getAlmacenados(obj) {
    let espera = []
    obj.forEach(item => {
        espera.push(item.espera)
    })
    return espera
}

function getEsperados(obj) {
    let total = []
    obj.forEach(item => {
        total.push(item.total)
    })
    return total
}


function charBar(idDiv,label1,data1,label2,data2,ejex) {
    var ctx = document.getElementById(idDiv).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ejex,
            datasets: [{
                label: label1,
                data: data1,

                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                ],
                hoverOffset: 4
            },
            {
                label: label2,
                data: data2,

                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',

                ],
                hoverOffset: 4
            },]

        },

        options: {
            scales: {
                y: {
                    beginAtZero: true

                }
            }
        }
    });

}