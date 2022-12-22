const bodyElement = document.querySelector("body");

const Modal = {
  open(title, body, actionText, onAction) {
    Modal.create(title, body, actionText, onAction);
  },

  close() {
    const modalNode = document.querySelector('.modal');
    const backdropNode = document.querySelector('.backdrop');

    if (bodyElement.parentNode) {
      bodyElement.removeChild(modalNode);
      bodyElement.removeChild(backdropNode);
    }
  },

  create(title, body, actionText = 'OK', onAction) {
    const modalDiv = document.createElement("div");
    const backdrop = document.createElement("div");

    modalDiv.classList.add("modal");
    backdrop.classList.add("backdrop");

    modalDiv.innerHTML = `
      <header>
        <h3 class="title">
          ${title}
        </h3>

        <button class="close-btn" onclick="${Modal.close()}">
          <i class="fas fa-times"></i>
        </button>
      </header>

      <section class="modal-body">
        <p>
          ${body}
        </p>
      </section>

      <footer>
        <button type="button" onclick="${onAction}">
          <i class="fas fa-check"></i>
          ${actionText}
        </button>
      </footer>
    `;

    bodyElement.prepend(modalDiv);
    bodyElement.prepend(backdrop);
  },
};
