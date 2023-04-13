const card__items = document.querySelector('.block');
resizeWindow(card__items);

window.addEventListener('resize', (e) => {
  resizeWindow(card__items);
});

function resizeWindow(card__items) {
  
  card__items.style.width = `${window.innerWidth / 3}px`;
  card__items.style.height = `${window.innerHeight / 3}px`;
  card__items.innerHTML = `
  <p>window.innerWidth: ${window.innerWidth}</p>
  <p>window.innerHeight: ${window.innerHeight}</p>
  `;
}