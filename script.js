



function jogar(numero) {

    
    if(document.getElementById(numero).innerHTML == '' && hasFinished() == false) {  
        if(hasStarted() == false) {
            let n = Math.floor(Math.random() * 2)

            if(n == 0)
                var quem = 'O'
            else 
                var quem = 'X'

        } else {
            var quem = document.getElementById('quem').innerHTML
        }

        var numero = numero
        var quadrado = document.getElementById(numero)
        quadrado.innerHTML = quem

        mudar()
        
    } else if(hasFinished() == true) {
        if(document.getElementById('quem').innerHTML == 'X')
            document.getElementById('vitoria').innerHTML = 'O WINS'
        else
            document.getElementById('vitoria').innerHTML = 'X WINS'
    }

    
}

function hasStarted() {
    var quem = document.getElementById('quem')
    if(quem.innerHTML == undefined)
        return false
    else 
        return true
}

function comecar() {
    let n = Math.floor(Math.random() * 2)

        if(n == 0)
            var quem = 'O'
        else 
            var quem = 'X'

    document.getElementById('quem').innerHTML = quem
}

function mudar() {
    var quem = document.getElementById('quem')

    if(quem.innerHTML == 'O') {
        quem.innerHTML = ''
        quem.innerHTML = 'X'

    } else {
        quem.innerHTML = ''
        quem.innerHTML = 'O'
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
    else 
        return false


}

function colorir(numero) {
    var quem = document.getElementById('quem').innerHTML
    var quadrado = document.getElementById(numero)
    
    if(quem == 'X' && quadrado.innerHTML == ''){
        quadrado.style.backgroundColor = '#F25534'
    } else if(quadrado.innerHTML == ''){
        quadrado.style.backgroundColor = '#34BBF2'

    }

        

}

function descolorir(numero) {
    var quadrado = document.getElementById(numero)
    
    if(quadrado.innerHTML == '')
        quadrado.style.backgroundColor = 'white'
}