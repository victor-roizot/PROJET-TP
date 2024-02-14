
/* MENU BURGER */
openBtn = document.getElementById('openBtn');
closeBtn = document.getElementById('closeBtn');
sideMenu = document.querySelector('.nav-center');

openBtn.addEventListener('click', ()=>{
    sideMenu.style.right = '0px';
})

closeBtn.addEventListener('click', ()=>{
    sideMenu.style.right = '-200px';
})

window.addEventListener('click', (e)=>{
    if(e.target != sideMenu && e.target != openBtn && e.target != document.querySelector('ul')){
        sideMenu.style.right = '-200px';
    }
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