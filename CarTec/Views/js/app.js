const menuBtn = document.querySelector('.menu-btn');
const menuList = document.querySelector('.nav-items');
const body = document.querySelector('body');

const backdrop = document.createElement('div');
backdrop.classList.add('backdrop');

if (menuBtn) {
  menuBtn.onclick = () => {
    if (menuList.classList.contains('flex')) { 
      menuList.style.animation = "slide-to-left 500ms ease forwards"    

      if (body) body.removeChild(backdrop)
      
      setTimeout(() => {
        menuList.classList.remove('flex');        
      }, 500);      
    } else {
      menuList.classList.add('flex');
      menuList.style.animation = "slide-from-left 500ms ease forwards"

      body.prepend(backdrop);
    }
  }
}

handleLoadingButton = {
  show(btn) {
    btn.innerHTML = `
      <span class='spinner'>
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      <span>`
  },

  hide(btn, value) {
    btn.innerHTML = value
  }
}