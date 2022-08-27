
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

const toggleActive = (element) => {
    element.classList.toggle("active");
};

const notActive = (element) => {
    element.classList.remove("active");
}


// Tornar Nav mobile ativa

const toggleMobileNav = () => {
   toggleActive(navList);
   document.body.classList.toggle("mobile-nav-active");
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
        document.body.classList.remove("mobile-nav-active");
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
       toggleActive(link);
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
    toggleActive(navSearch);
    setTimeout(() => navSearchBar.focus(), 50);
})

closeNavSearchBtn.addEventListener("click", () => notActive(navSearch))



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

// const backToTopBtn = select(".back-to-top");

// if (backToTopBtn) {
//     const toggleBackToTopButton = () => {
//         if (document.body.scrollY > 50) {
//            toggleActive(backToTopBtn);
//         } else {
//             notActive(backToTopBtn);
//         }
//     }

//     document.body.addEventListener("scroll", toggleBackToTopButton);
//     document.body.addEventListener("load", toggleBackToTopButton);
// }

