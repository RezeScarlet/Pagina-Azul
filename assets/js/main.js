
// --------------------
// FUNÇÕES
// --------------------

// Função para selecionar elementos
const select = (element, all = false) => {
    if (all) {
        return Array.from(document.querySelectorAll(element));
    } else {
        return document.querySelector(element);
    }
}


// Funções para colocar e tirar classe .active
const active = (element) => {
    element.classList.add("active");
};

const notActive = (element) => {
    element.classList.remove("active");
}


// Tornar Nav mobile ativa
const toggleMobileNav = () => {
   active(navList);
   document.body.classList.toggle("mobile-nav-opened");
}



// --------------------
// NAVBAR
// --------------------

const menuToggler = select(".menu-toggler");
const closeMenuBtn = select(".nav__close-btn");
const navList = select(".nav__list");

menuToggler.addEventListener("click", toggleMobileNav)
closeMenuBtn.addEventListener("click", toggleMobileNav)

window.addEventListener("click", (e) => {
    let target = e.target.parentElement;

    if (target === menuToggler) return;

    if (e.target !== navList) {
        notActive(navList)
        document.body.classList.remove("mobile-nav-opened");
    }
})



// --------------------
// TORNAR LINKS DA NAVBAR ATIVOS
// --------------------

const pageId = document.body.id;
const navLinks = select(".nav__link", true);

navLinks.forEach((link) => {
    if (!pageId) return;

    if (link.innerText.toLowerCase() === pageId) {
       active(link);
    }
})



// --------------------
// ATIVAR BARRA DE PESQUISA DA NAV
// --------------------

const navSearch = select(".nav__search-form");
const navSearchBar = select(".nav__search-bar");

const openNavSearchBtn = select("#open-nav-search-btn");
const closeNavSearchBtn = select("#close-nav-search-btn");

openNavSearchBtn.addEventListener("click", () => {
    active(navSearch);
    setTimeout(() => navSearchBar.focus(), 50);
})

closeNavSearchBtn.addEventListener("click", () => notActive(navSearch))



// --------------------
// SELECT
// --------------------

const selectElements = select("[data-select]", true) 

if (selectElements) {
    selectElements.forEach((selectEl) => {
        selectEl.addEventListener("click", () => {
            selectEl.classList.toggle("active");
        })

        const options = selectEl.querySelectorAll("[data-select-option]");
        const text = selectEl.querySelector("[data-select-text]");
        const input = selectEl.querySelector("input");

        options.forEach((option) => {
            const value = option.dataset.selectOption;

            option.addEventListener("click", () => {
                input.value = value;    
                text.textContent = option.textContent;

                options.forEach((option) => { notActive(option); })
                active(option);
            })
        })
    })
}


// --------------------
// SCROLLER
// --------------------

const sliders = select(".slider", true);

if (sliders) {
    sliders.forEach((slider) => {
   
        // BOTÕES DE CONTROLE
        let scroller = slider.querySelector("[data-slide]");
        let controls = slider.querySelectorAll("[data-control]");
        
        controls.forEach((btn) => {
            let scroll = btn.dataset.control === "right" ? 200 : -200;

            btn.addEventListener("click", () => { 
                scroller.scrollLeft += scroll;
            })
        })

        // MOVER AO DESLIZAR
        let isDown = false;
        let startX;
        let scrollLeft;
    
        scroller.addEventListener("mousedown", (e) => {
            e.preventDefault();
            
            isDown = true;
            startX = e.pageX - scroller.offsetLeft;
            scrollLeft = scroller.scrollLeft;
        })
    
        scroller.addEventListener("mouseleave", (e) => {
            isDown = false;
        })
    
        scroller.addEventListener("mouseup", (e) => {
            isDown = false;
        })
    
        scroller.addEventListener("mousemove", (e) => {
            if (!isDown) return;
            e.preventDefault();

            const x = e.pageX - scroller.offsetLeft;
            const movimento = x - startX;
            scroller.scrollLeft = scrollLeft - movimento;
        })
    })
}



// --------------------
// BOTÃO DE VOLTA AO TOPO
// --------------------

const backToTopBtn = select(".back-to-top");

if (backToTopBtn) {
    const toggleBackToTopButton = () => {
        if (window.scrollY > 50) {
           backToTopBtn.classList.add("active");
        } else {
            notActive(backToTopBtn);
        }
    }

    window.addEventListener("scroll", toggleBackToTopButton);
    window.addEventListener("load", toggleBackToTopButton);
}




// --------------------
// ABRIR E FECHAR MODALS
// --------------------

const modalOpenButtons = select("[data-modal-target]", true);
const modalCloseButtons = select("[data-modal-close]", true);

if (modalOpenButtons && modalCloseButtons) {
    modalOpenButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const target = select(button.dataset.modalTarget);
            active(target);
            document.body.classList.toggle("modal-opened");
        })
    })
    
    modalCloseButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const target = button.closest(".modal");
            notActive(target);
            document.body.classList.remove("modal-opened");
        })
    })
    
    window.addEventListener("click", (e) => {
        let target = e.target;
    
        if (target.classList.contains("modal")) {
            notActive(target);
            document.body.classList.remove("modal-opened");
        }
    })
}



// --------------------
// FORMATAR STRINGS
// --------------------

// Função para formatar strings
const formatString = (string, format) => {
    const cleaned = ('' + string).replace(/\D/g, '');
    let stringFormat = format;
    let regex;

    if (stringFormat === "mobile-phone") {
        regex = /^(\d{2})(\d{5})(\d{4})$/
    } else { 
        return string;
    }

    match = cleaned.match(regex);

    if (match) {
        return '(' + match[1] + ') ' + match[2] + '-' + match[3]
    }

    return string;
}


const elementsToFormat = select("[data-format]", true);

if (elementsToFormat) {
    elementsToFormat.forEach((element) => {
        let formatTo = element.dataset.format;
        element.innerText = formatString(element.innerText, formatTo);
    })
}

