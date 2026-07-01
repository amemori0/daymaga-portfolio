document.querySelectorAll('.c-tag').forEach(tag => {
  tag.addEventListener('click', () => {
    const isPressed = tag.getAttribute('aria-pressed') === 'true';
    tag.setAttribute('aria-pressed', isPressed ? 'false' : 'true');
  });
});