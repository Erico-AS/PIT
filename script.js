const signinBtn = document.querySelector('.signinBtn');
const signupBtn = document.querySelector('.signupBtn');
const formBx = document.querySelector('.formBx');
const body = document.querySelector('body')
const formulario = document.querySelector('#formulario')
const btnMud = document.querySelector('#btnMud')
const titulo = document.querySelector('h3')
const esqueceuSenha = document.querySelector('a')


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

    btnMud.value = "Cadastrar"
    titulo.textContent = "Cadastrar - Formap"
    esqueceuSenha.style.visibility = 'hidden'
}

signinBtn.onclick = function(){
    formBx.classList.remove('active')
    body.classList.remove('active')

    btnMud.value = "Login"
    titulo.textContent = "Login - Formap"
    esqueceuSenha.style.visibility = 'inherit'


    formulario.removeChild(inpConfirmar)
    formulario.removeChild(inpNome)
}