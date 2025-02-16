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

  // Maybe add this JS to prevent default behavior for submenu links.
  document.querySelectorAll('#task-menu-dropdown li[data-item]').forEach((menuItem) => {
    const link = menuItem.querySelector('a');
    const submenu = menuItem.querySelector('ul');

    if (submenu) {
      link.addEventListener('click', (event) => {
        event.preventDefault();
      });
    }
  });

});
