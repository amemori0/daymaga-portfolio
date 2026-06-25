window.addEventListener('scroll', function() {
  const header = document.querySelector('[data-status="fixed"]');
  const scrollTop = document.documentElement.scrollTop || document.body.scrollTop || 0;

  if (scrollTop > 120) {
    header.dataset.scroll = 'active';
  } else {
    delete header.dataset.scroll;
  }
});