function jogar(number) { 
    var nome = document.getElementsByClassName('eu')[0].innerHTML

    if(myTurn(nome) == true && hasFinished() == false) { 
        if(document.getElementById(number).innerHTML == '' && hasFinished() == false) {  
                if(hasStarted() == false) {
                    let n = Math.floor(Math.random() * 2)

                    if(n == 0) {
                        var who = 'O'
                    } else {
                        var who = 'X'
                    }

                } else {
                    var who = document.getElementById('who').innerHTML
                }
                
                if(myTurn(nome) == true){
                        
                    var number = number
                    var square = document.getElementById(number)
                    square.innerHTML = who

                    mudar()
                }
                
        }
    
        //AGORA O RESULTADO SAI NA MESMA JOGADA EM QUE ACABA
        if(hasFinished() == true) {
            if(document.getElementById('who').innerHTML == 'X')
                document.getElementById('win').innerHTML = 'O WINS'
            else
                document.getElementById('win').innerHTML = 'X WINS'
        } else if(hasFinished() == 'tie') {
            document.getElementById('win').innerHTML = 'TIE'    
        }
        //SOMENTE SE FOR SELECIONADO MULTIPLAYER
        if(hasFinished() == true) 
            var gameOver = 'true'
        else if(hasFinished() == false)
            var gameOver = 'false'
        else if(hasFinished() == 'tie')
            var gameOver = 'tie'

        var hora = playMultiplayer(gameOver, number)

        waitingPlay(hora)
    }

}   

function hasStarted() {
    var who = document.getElementById('who')
    if(who.innerHTML == undefined)
        return false
    else 
        return true
}

function comecar() {
    var nome = document.getElementsByClassName('eu')[0].innerHTML
    var who = 'O'
    document.getElementById('who').innerHTML = who


    if(myTurn(nome) != true) {
        waitingPlay()
    }


}

function mudar() {
    var who = document.getElementById('who')

    if(who.innerHTML == 'O') {
        who.innerHTML = ''
        who.innerHTML = 'X'

    } else {
        who.innerHTML = ''
        who.innerHTML = 'O'
    }
}

function hasFinished() {
    
    var um = document.getElementById('um').innerHTML
    var dois = document.getElementById('dois').innerHTML
    var tres = document.getElementById('tres').innerHTML

    var quatro = document.getElementById('quatro').innerHTML
    var cinco = document.getElementById('cinco').innerHTML
    var seis = document.getElementById('seis').innerHTML

    var sete = document.getElementById('sete').innerHTML
    var oito = document.getElementById('oito').innerHTML
    var nove = document.getElementById('nove').innerHTML

        if(um == dois && dois == tres && um != '') 
            return true
        else if(um == quatro && quatro == sete && um != '')
            return true
        else if(um == cinco && cinco == nove && um != '')
            return true
        else if(dois == cinco && cinco == oito && dois != '') 
            return true
        else if(tres == cinco && cinco == sete && tres != '') 
            return true
        else if(tres == seis && seis == nove && tres != '')
            return true
        else if(quatro == cinco && cinco == seis && quatro != '') 
            return true
        else if(sete == oito && oito == nove && sete != '')
            return true
        else if(um != '' && dois != '' && tres != '' && quatro != '' && cinco != '' && seis != '' && sete != '' && oito != '' && nove != '')
            return 'tie'
        else 
            return false

    

}

function colorir(number, via) {
    var via = via
    var nome = document.getElementsByClassName('eu')[0].innerHTML
    
    if(myTurn(nome) == true) {
        var who = document.getElementById('who').innerHTML
        var square = document.getElementById(number)
        
        if(who == 'X' && square.innerHTML == ''){
            square.style.backgroundColor = '#F25534'
        } else if(square.innerHTML == ''){
            square.style.backgroundColor = '#34BBF2'

        }
    } else if(via == 'viaResponse'){
        var who = document.getElementById('who').innerHTML
        var square = document.getElementById(number)
        
        if(who == 'X' && square.innerHTML == ''){
            square.style.backgroundColor = '#F25534'
        } else if(square.innerHTML == ''){
            square.style.backgroundColor = '#34BBF2'

        }
    }
}

function descolorir(number) {
    var square = document.getElementById(number)
    
    if(square.innerHTML == '')
        square.style.backgroundColor = 'white'
}


function playMultiplayer(gameOver, number) {
    var jogo = document.getElementById('jogo').innerHTML
    var player = document.getElementsByClassName('eu')[0].innerHTML


    axios({
        method: 'get',
        url: 'jogada.php',
        params: {
            gameOver: gameOver,
            number: number,
            waiting: 'false',
            jogo: jogo,
            player: player
        }
    })
    .then(function (response) {
        return response.data.hora
    })

}  

function waitingPlay(hora) {
    var jogo = document.getElementById('jogo').innerHTML

    axios({
        method: 'get',
        url: 'jogada.php',
        params: {
            waiting: 'true',
            jogo: jogo,
            hora: hora
        }
    })
    .then(function (response) {

        colorir(response.data.number, 'viaResponse')
        document.getElementById(response.data.number).innerHTML = document.getElementById('who').innerHTML
        mudar()
        if(response.data.gameOver == 'true'){
            if(document.getElementById('who').innerHTML == 'X')
                document.getElementById('win').innerHTML = 'O WINS'
            else
                document.getElementById('win').innerHTML = 'X WINS'
        } else if(response.data.gameOver == 'tie') {
            document.getElementById('win').innerHTML = 'TIE'    
        }

    })

    .catch(function (error) {
        setTimeout(waitingPlay(hora), 200)    
    })

}

function myTurn(nome) {
    var player1 = document.getElementById('player1').innerHTML
    var player2 = document.getElementById('player2').innerHTML
    var who = document.getElementById('who').innerHTML
    
    if(nome == player1 && who == 'O')
        return true
    else if(nome == player1 && who == 'X')
        return false
    else if(nome == player2 && who == 'O')
        return false
    else if(nome == player2 && who == 'X')
        return true
}
