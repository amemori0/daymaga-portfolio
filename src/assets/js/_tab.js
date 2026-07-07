document.addEventListener('DOMContentLoaded', () => {
  const tabs = document.querySelectorAll(".c-tab__item[role='tab']");
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
      let targetTab = null;

      if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
        targetTab = tabArray[currentIndex + 1] || tabArray[0];
      }

      if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
        targetTab = tabArray[currentIndex - 1] || tabArray[tabArray.length - 1];
      }

      if (targetTab) {
        e.preventDefault();
        targetTab.focus();
        switchTab(targetTab);
      }
    });
  });
});