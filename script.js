function jogar(number) {
    
    if(document.getElementById(number).innerHTML == '' && hasFinished() == false) {  
        if(hasStarted() == false) {
            let n = Math.floor(Math.random() * 2)

            if(n == 0)
                var who = 'O'
            else 
                var who = 'X'

        } else {
            var who = document.getElementById('who').innerHTML
        }

        var number = number
        var square = document.getElementById(number)
        square.innerHTML = who

        mudar()  
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
}

function hasStarted() {
    var who = document.getElementById('who')
    if(who.innerHTML == undefined)
        return false
    else 
        return true
}

function comecar() {
    let n = Math.floor(Math.random() * 2)

        if(n == 0)
            var who = 'O'
        else 
            var who = 'X'

    document.getElementById('who').innerHTML = who
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

function colorir(number) {
    var who = document.getElementById('who').innerHTML
    var square = document.getElementById(number)
    
    if(who == 'X' && square.innerHTML == ''){
        square.style.backgroundColor = '#F25534'
    } else if(square.innerHTML == ''){
        square.style.backgroundColor = '#34BBF2'

    }

}

function descolorir(number) {
    var square = document.getElementById(number)
    
    if(square.innerHTML == '')
        square.style.backgroundColor = 'white'
}