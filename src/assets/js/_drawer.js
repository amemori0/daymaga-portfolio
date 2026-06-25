document.addEventListener("DOMContentLoaded", () => {
  const drawerButtons = document.querySelectorAll(".p-header__drawer");
  const drawerCloseButton = document.querySelector(".p-header__drawer-close"); // 追加
  const drawer = document.getElementById("drawer");
  const drawerNavItems = drawer.querySelectorAll("a");

  const openMenu = () => {
    drawer.dataset.status = "open";
    drawer.setAttribute("aria-hidden", "false");
    drawerButtons.forEach(btn => {
      btn.setAttribute("aria-expanded", "true");
      btn.setAttribute("aria-label", "メニューを閉じる");
    });
    document.body.dataset.drawerOpen = "true";
  };

  const closeMenu = () => {
    delete drawer.dataset.status;
    drawer.setAttribute("aria-hidden", "true");
    drawerButtons.forEach(btn => {
      btn.setAttribute("aria-expanded", "false");
      btn.setAttribute("aria-label", "メニューを開く");
    });
    delete document.body.dataset.drawerOpen;
  };

  const toggleMenu = () => {
    if (drawer.dataset.status === "open") {
      closeMenu();
    } else {
      openMenu();
    }
  };

  const handleResize = () => {
    if (window.innerWidth > 1340 && drawer.dataset.status === "open") {
      closeMenu();
    }
  };

  const clickOuter = (event) => {
    if (
      drawer.dataset.status === "open" &&
      !drawer.contains(event.target) &&
      !Array.from(drawerButtons).some(btn => btn.contains(event.target))
    ) {
      closeMenu();
    }
  };

  drawerButtons.forEach(btn => {
    btn.addEventListener("click", toggleMenu);
  });

  // ×ボタンクリックで閉じる
  drawerCloseButton.addEventListener("click", closeMenu);

  window.addEventListener("resize", handleResize);
  document.addEventListener("click", clickOuter);

  drawerNavItems.forEach(item => {
    item.addEventListener("click", () => {
      closeMenu();
    });
  });
});