
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



// --------------------
// NAVBAR
// --------------------

const menuToggler = select(".menu-toggler");
const closeMenuBtn = select(".nav__close-btn");
const navList = select(".nav__list");

menuToggler.addEventListener("click", () => {
    active(navList);
})

closeMenuBtn.addEventListener("click", () => {
    notActive(navList);
})

window.addEventListener("click", (e) => {
    let target = e.target.parentElement;

    if (target === menuToggler) return;

    if (e.target !== navList) {
        notActive(navList)
    }
})


const navSearchBar = select(".nav__search");
const navSearchBtn = select("#search-btn");

navSearchBtn.addEventListener("click", () => navSearchBar.focus())



// --------------------
// SCROL HORIZONTAL
// --------------------

const sliders = select(".slider", true);

if (sliders) {
    sliders.forEach((slider) => {
   
        // BOTÕES DE CONTROLE

        let scroller = slider.querySelector("[data-slide]");
        let controls = slider.querySelectorAll("[data-control]");

        
        controls.forEach((btn) => {
            let scroll = btn.dataset.control === "left" ? -200 : 200;

            btn.addEventListener("click", () => { 
                scroller.scrollLeft += scroll;
            })
        })

        // MOVER AO DESLIZAR

        let isDown = false;
        let startX;
        let scrollLeft;
    
        scroller.addEventListener("mousedown", (e) => {
            isDown = true;
    
            startX = e.pageX - scroller.offsetLeft;
            scrollLeft = scroller.scrollLeft;
        })
    
        scroller.addEventListener("mouseleave", () => {
            isDown = false;
        })
    
        scroller.addEventListener("mouseup", () => {
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
    const toggle = () => {
        if (window.scrollY > 50) {
            active(backToTopBtn);
        } else {
            notActive(backToTopBtn);
        }
    }

    window.addEventListener("load", toggle);
    window.addEventListener("scroll", toggle);
}
