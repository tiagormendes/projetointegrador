// Exemplo de animação ao carregar a página
window.addEventListener("load", () => {
    gsap.from(".elemento-animado", { opacity: 0, y: -50, duration: 1 });
  });
  