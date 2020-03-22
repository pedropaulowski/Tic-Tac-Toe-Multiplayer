$('#fila').click(function(e) {
    var nick = document.getElementById('nick').innerHTML
    e.preventDefault()

    esperarFila(nick)

})

function esperarFila(nick) {
    axios({
        method: 'get',
        url: 'esperarfila.php',
        params: {
            fila : nick,
        }
    })
    .then(function (response) {
        var json = response.data
        if(json.msg != null)
            window.location.href="jogo.php?jogo="+json.msg+"&&nome="+nick
        if(json.jogo != null){
            window.location.href="jogo.php?jogo="+json.jogo+"&&nome="+nick
        }
    
    })
    .catch(function() {
        esperarFila(nick)
    })
}

$('#cancelar').click(function(e) {

    e.preventDefault()

    axios({
        method: 'get',
        url: 'sairdafila.php'

    })

})