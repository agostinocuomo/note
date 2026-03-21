const buttons = document.querySelectorAll('.show-btn');

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      // Creo lo sfondo semi-trasparente
      const overlayBg = document.createElement('div');
      overlayBg.classList.add('overlay-background');
      document.body.appendChild(overlayBg);

      // Creo la textarea overlay
      const overlay = document.createElement('textarea');
      overlay.classList.add('overlay');
      overlay.placeholder = "Scrivi qui...";
      document.body.appendChild(overlay);

      overlay.focus();

      // Chiudo overlay cliccando sullo sfondo o premendo ESC
      function removeOverlay() {
        overlay.remove();
        overlayBg.remove();
      }

      overlayBg.addEventListener('click', removeOverlay);
      overlay.addEventListener('keydown', (e) => {
        if(e.key === "Escape") {
          removeOverlay();
        }
      });
    });
  });

