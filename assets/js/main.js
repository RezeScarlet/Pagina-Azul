
// --------------------
// FUNÇÕES
// --------------------

// Função para selecionar elementos

const $ = (element, all = false) => {
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



// --------------------
// NAVBAR
// --------------------

const menu_toggler = $(".menu-toggler");
const close_btn = $(".nav__close-btn");
const nav_list = $(".nav__list");

menu_toggler.addEventListener("click", () => {
    active(nav_list);
})

close_btn.addEventListener("click", () => {
    notActive(nav_list);
})

window.addEventListener("click", (e) => {
    let target = e.target.parentElement;

    if (target === menu_toggler) return;

    if (e.target !== nav_list) {
        notActive(nav_list)
    }
})


const nav_search = $(".nav__search");
const search_btn = $("#search-btn");

search_btn.addEventListener("click", () => nav_search.focus())

// --------------------



// --------------------
// SCROL HORIZONTAL
// --------------------

const sliders = $(".slider", true);

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



// --------------------
// BOTÃO DE VOLTA AO TOPO
// --------------------

const back_to_top = $(".back-to-top");

if (back_to_top) {
    const toggle = () => {
        if (window.scrollY > 50) {
            active(back_to_top);
        } else {
            notActive(back_to_top);
        }
    }

    window.addEventListener("load", toggle);
    window.addEventListener("scroll", toggle);
}

// --------------------
