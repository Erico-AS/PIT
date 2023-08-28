const menu = document.querySelector('.menu');
const NavMenu = document.querySelector('.nav-menu');

menu.addEventListener('click', () => {
    menu.classList.toggle('ativo');
    NavMenu.classList.toggle('ativo');
})

function scrollToBottom() {
  const contactSection = document.getElementById("contact");
        const contactSectionPosition = contactSection.getBoundingClientRect().top;

        // Define um deslocamento para rolar um pouco menos (por exemplo, 50 pixels)
        const offset = 80;

        // Realiza o scroll até a seção "Contact Us" com o deslocamento ajustado
        window.scrollBy({
            top: contactSectionPosition - offset,
            behavior: "smooth"
        });
    }

document.getElementById('scrollButton').addEventListener('click', function() {
  // Rola a página para baixo em uma velocidade suave
  window.scrollTo({
    top: document.body.scrollHeight,
    behavior: 'smooth'
  });
});