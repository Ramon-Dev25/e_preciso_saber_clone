// notificações
function showNotification(type, title, message, duration = 5000) {
  const container = document.getElementById("notification-container") || (() => {
    const div = document.createElement("div");
    div.id = "notification-container";
    div.classList.add("notification-container");
    document.body.appendChild(div);
    return div;
  })();

  const notification = document.createElement("div");
  notification.className = `notification note-${type}`;
  notification.innerHTML = `
        <div class="notification-header">
            <span class="icon-notification"><i class="fa-solid fa-bell"></i></span>
            <span class="title-notification">${title}</span>
            <span class="time-notification">agora</span>
        </div>
        <div class="notification-body">${message}</div>
    `;

  container.prepend(notification);

  setTimeout(() => {
    notification.style.opacity = "0";
    notification.style.transform = "translateY(-20px)";
    setTimeout(() => notification.remove(), 500);
  }, duration);
}