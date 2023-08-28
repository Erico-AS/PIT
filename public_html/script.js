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

/*document.getElementById('search-button').addEventListener('click', function() {
    var searchTerm = document.getElementById('search-input').value.toLowerCase();
    var allElements = document.querySelectorAll('*');
  
    // Armazena o conteúdo original em um objeto para restauração posterior
    var originalContents = {};
  
    // Faz a busca e destaca as correspondências
    for (var i = 0; i < allElements.length; i++) {
      var element = allElements[i];
      var content = element.innerText.toLowerCase();
  
      if (content.includes(searchTerm)) {
        var html = element.innerHTML;
        var highlightedHtml = html.replace(new RegExp(searchTerm, 'gi'), '<mark>$&</mark>');
  
        // Armazena o conteúdo original do elemento antes de destacar
        originalContents[i] = html;
  
        // Substitui o conteúdo pelo conteúdo destacado
        element.innerHTML = highlightedHtml;
      }
    }
  
    // Limpa as alterações e restaura o conteúdo original
    function clearSearchResults() {
      for (var key in originalContents) {
        if (originalContents.hasOwnProperty(key)) {
          allElements[key].innerHTML = originalContents[key];
        }
      }
    }
  
    // Adiciona um ouvinte de evento para limpar os resultados de busca
    document.getElementById('search-input').addEventListener('input', function() {
      clearSearchResults();
    });
  });

  $(document).ready(function() {
    $('a[href^="#"]').on('click', function(event) {
      var target = $(this.getAttribute('href'));
      if (target.length) {
        event.preventDefault();
        $('html, body').stop().animate({
          scrollTop: target.offset().top
        }, 1000);
      }
    });
  });*/
  