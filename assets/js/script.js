// Je sélectionne et je stocke
// l'icône burger
const icone = document.querySelector('.navbar-mobile i'); 
console.log(icone); 
// la DIV modal
const modal = document.querySelector('.modal'); 
console.log(modal); 

icone.addEventListener('click', function(){
    console.log("icone cliquée"); 
    modal.classList.toggle('change-modal'); 
    icone.classList.toggle('fa-times'); 
}); 

/* MODAL DELETE */
openModalBtn.addEventListener("click", () => {
    modalContainer.style.display = "flex"
})

closeModalBtn.addEventListener("click", () => {
    modalContainer.style.display = "none"
})

modalContainer.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        modalContainer.style.display = "none"
    }

})