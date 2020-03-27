let mouse = document.querySelector('.mouse');

mouse.addEventListener('click', () => {

    document.querySelector('.scroll-to').scrollIntoView({block: "start", behavior: "smooth"});
})