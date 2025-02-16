document.addEventListener('DOMContentLoaded', () => {

  const productBtn = document.getElementById('task-menu-button');
  const megaMenu = document.getElementById('task-menu-dropdown');

  productBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    megaMenu.classList.toggle('hidden');
  });
  document.addEventListener('click', (ev) => {
    if (!megaMenu.contains(ev.target) && ev.target !== productBtn) {
      megaMenu.classList.add('hidden');
    }
  });
});
