/* MODAL BURGER */
// Je sélectionne et je stocke
const icone = document.querySelector('.navbar-mobile i'); 
// la DIV modal
const modal = document.querySelector('.modal'); 

icone.addEventListener('click', function(){
    modal.classList.toggle('change-modal'); 
    icone.classList.toggle('fa-times'); 
}); 

/* MODAL DELETE */
openModalBtn.addEventListener("click", () => {
    modalContainer.style.display = "flex"
});

closeModalBtn.addEventListener("click", () => {
    modalContainer.style.display = "none"
});

modalContainer.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        modalContainer.style.display = "none"
    }
});