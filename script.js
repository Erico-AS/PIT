const signinBtn = document.querySelector('.signinBtn');
const signupBtn = document.querySelector('.signupBtn');
const formBx = document.querySelector('.formBx');
const body = document.querySelector('body')
const formulario = document.querySelector('#formulario')
const btnMud = document.querySelector('#btnMud')

var inpNome = document.createElement('input')
inpNome.type = "text"
inpNome.placeholder = "Digite seu nome completo"

var inpConfirmar = document.createElement('input')
inpConfirmar.type = "Password"
inpConfirmar.placeholder = "Confirme sua senha"

signupBtn.onclick = function(){
    formBx.classList.add('active')
    body.classList.add('active')

    formulario.appendChild(inpConfirmar)
    formulario.appendChild(inpNome)

    btnMud.innerText = "Cadastrar"

}

signinBtn.onclick = function(){
    formBx.classList.remove('active')
    body.classList.remove('active')

    btnMud.innerText = "Logar"

    formulario.removeChild(inpConfirmar)
    formulario.removeChild(inpUser)
    formulario.removeChild(inpNome)

}