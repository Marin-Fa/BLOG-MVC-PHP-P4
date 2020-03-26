let section = '#section';
let mouse = document.querySelector('.mouse');

mouse.addEventListener('click', () => {

    document.querySelector(section).scrollIntoView({block: "start", behavior: "smooth"});
})