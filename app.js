// Gerador de imagens aleatórias infinitas em uma grid (futuramente será substituido por informações do BD e não será aleatório)

// Detecta onde esta a classe que sera editada
const container = document.querySelector('.container')

//                Str com o link das API 
// depois do "random=" fica o número identificando a imagem
// os dois números determinam a resolução (/300/300)
let URL = "https://picsum.photos/300/300.jpg?random="

// Função que gera um número aleatório para colocar no link
function getRandNum(){
    let num = Math.floor(Math.random() * 10000);
    return num
}




// Função que mostra as imagens
function loadImages(numImages = 40){
    let i = 0;
    while (i < numImages){
        const img = document.createElement('img')
        const div = document.createElement('div')
        let rand = getRandNum()
        div.classList.add("box") 
        if (rand%10==0) {
            URL = "https://picsum.photos/626/626.jpg?random="
                div.classList.add("quadrado-grande")
        } else if (rand%15==0) {
            URL = "https://picsum.photos/939/626.jpg?random="
            div.classList.add("retanguluzao")

        } else {
            URL = "https://picsum.photos/300/300.jpg?random="
            div.classList.add("quadradinho")
        }
        img.src = `${URL}${rand}`
        container.appendChild(div)
        div.appendChild(img)
        i++
    }

}

loadImages()

// receber valores do css
// const element = document.querySelector('.quadradinho')
// const style = getComputedStyle(element)
// const color = style.width;
// console.log(color);

// Detecta se o usuaria chegou no final do scroll, e caso seja chama a função de mostrar imagens

window.addEventListener('scroll', () => {
    if(window.scrollY + window.innerHeight >= document.documentElement.scrollHeight) {
        loadImages()
    }
})