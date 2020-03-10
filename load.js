function carregarJogo() {
    var jogo = document.getElementById('jogo').innerHTML
    var player1 = document.getElementById('player1').innerHTML
    var nome = document.getElementsByClassName('eu')[0].innerHTML

    axios({
        method: 'get',
        url: 'carregarjogo.php',
        params: {
            jogo: jogo
        }
    })
    .then(function (response) {
        var json = response.data
        var n = Object.keys(json).length

        for(let i = 0; i < n; i++){
            var jogador = json[i].player
            var number = json[i].numero
            var square = document.getElementById(number)

            if(jogador == player1){
                square.style.backgroundColor = '#34BBF2'
                square.innerHTML = 'O'
            } else {
                square.style.backgroundColor = '#F25534'
                square.innerHTML = 'X'
            }
            if(i == n-1) {
                if(i%2 == 0) {
                    document.getElementById('who').innerHTML = "X"
                } else {
                    document.getElementById('who').innerHTML = "O"
                }
            }
                
        }

        if(myTurn(nome) != true) {
            waitingPlay()
        }
    })
}


