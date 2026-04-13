const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.1 },
);

document
  .getElementById("registerForm")
  .addEventListener("submit", async (e) => {
    e.preventDefault();

    const password = document.getElementById("password").value;
    const confirm = document.getElementById("confirm_password").value;
    const errorEl = document.getElementById("error");

    errorEl.textContent = "";

    if (password !== confirm) {
      errorEl.textContent = "Las contraseñas no coinciden";
      return;
    }

    const formData = new FormData(e.target);

    const res = await fetch("/api/register.php", {
      method: "POST",
      body: formData,
    });

    const data = await res.json();

    if (data.success) {
      window.location.href = "/login";
    } else {
      alert(data.error);
    }
  });

const logoutBtn = document.getElementById("logoutBtn");

if (logoutBtn) {
  logoutBtn.addEventListener("click", async () => {
    try {
      const res = await fetch("/api/logout.php", { method: "POST" });

      const data = await res.json();

      if (data.success === true) {
        window.location.href = "/";
      } else {
        console.error("Error al cerrar sesión:", data);
      }
    } catch (err) {
      console.error("Error de conexión:", err);
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".fadeInUp-animation").forEach((el) => {
    observer.observe(el);
  });
});
