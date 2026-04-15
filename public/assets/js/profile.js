async function getProfile() {
  try {
    const res = await fetch("/api/profile/get.php");

    if (res.status === 204) {
      return null;
    }

    if (!res.ok) {
      throw new Error(`Error ${res.status}`);
    }

    const profile = await res.json();
    return profile;
  } catch (err) {
    console.error(err);
    return null;
  }
}

const profileData = document.getElementById("profileData");

async function main() {
  const data = await getProfile();
  if (!data) {
    window.location.href = "/login";
    return;
  }
  profileData.elements["email"].value = data["profile"]["email"];
  profileData.elements["name"].value = data["profile"]["name"];
  profileData.elements["address"].value = data["profile"]["address"];
  profileData.elements["phone"].value = data["profile"]["phone"];
}

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

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".fadeInUp-animation").forEach((el) => {
    observer.observe(el);
  });
});

main();

document.getElementById("profileData").addEventListener("submit", async (e) => {
  e.preventDefault();

  const password = document.getElementById("password").value;
  const confirm = document.getElementById("confirm_password").value;
  const errorEl = document.getElementById("error");

  errorEl.textContent = "";

  if (password !== confirm && password) {
    errorEl.textContent = "Las contraseñas no coinciden";
    return;
  }

  const formData = new FormData(e.target);

  const res = await fetch("/api/profile/update.php", {
    method: "POST",
    body: formData,
  });

  const data = await res.json();

  if (data.success) {
    alert("Perfil actualizado con exito!");
    window.location.href = "/profile";
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
