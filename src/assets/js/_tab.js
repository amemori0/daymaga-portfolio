document.addEventListener('DOMContentLoaded', () => {
  const tabs = document.querySelectorAll(".c-tab[role='tab']");
  const panels = document.querySelectorAll('.c-tab__panel');

  const switchTab = (selectedTab) => {
    // タブの切り替え
    tabs.forEach(tab => {
      tab.setAttribute('aria-selected', 'false');
      tab.setAttribute('tabindex', '-1');
    });
    selectedTab.setAttribute('aria-selected', 'true');
    selectedTab.setAttribute('tabindex', '0');

    // パネルの切り替え
    panels.forEach(panel => {
      delete panel.dataset.status;
    });
    const targetPanel = document.getElementById(selectedTab.getAttribute('aria-controls'));
    if (targetPanel) {
      targetPanel.dataset.status = 'active';
    }
  };

  // クリックで切り替え
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      switchTab(tab);
    });

    // キーボード操作（左右矢印キー）
    tab.addEventListener('keydown', (e) => {
      const tabArray = Array.from(tabs);
      const currentIndex = tabArray.indexOf(tab);

      if (e.key === 'ArrowRight') {
        const nextTab = tabArray[currentIndex + 1] || tabArray[0];
        nextTab.focus();
        switchTab(nextTab);
      }

      if (e.key === 'ArrowLeft') {
        const prevTab = tabArray[currentIndex - 1] || tabArray[tabArray.length - 1];
        prevTab.focus();
        switchTab(prevTab);
      }
    });
  });
});