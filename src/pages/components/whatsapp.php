<style>
    .whatsapp-container {
        position: fixed;
        right: 40px;
        bottom: 50px;
        z-index: 1000;
        display: flex;
        align-items: center;
        gap: 15px;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .whatsapp-container:hover {
        transform: scale(1.1);
    }

    .whatsapp-bubble {
        background: #25d366;
        color: white;
        padding: 8px 16px;
        border-radius: 20px 20px 0 20px;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        white-space: nowrap;
        opacity: 1;
        transform: translateX(0);
        transition: all 0.3s ease;
        pointer-events: none;
    }

    .whatsapp-icon {
        width: 60px;
        height: 60px;
        background: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        transition: all 0.3s ease;
        border: 2px solid #fff;
    }

    .whatsapp-icon img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .whatsapp-container {
            right: 15px;
            bottom: 60px;
            gap: 8px;
        }
        .whatsapp-bubble {
            padding: 6px 12px;
            font-size: 10px;
            border-radius: 12px 12px 0 12px;
        }
        .whatsapp-icon {
            width: 45px;
            height: 45px;
        }
        .whatsapp-container:hover {
            transform: scale(1.05);
        }
    }
</style>

<a href="/" target="_blank" id="whatsapp" class="whatsapp-container fadeInUp-animation pulse-animation">
    <div class="whatsapp-bubble">
        ¿Quieres una web así? Escríbeme
    </div>
    <div class="whatsapp-icon">
        <img src="/assets/img/whatsapp.jpeg" alt="WhatsApp">
    </div>
</a>

<script>
    async function initWhatsapp() {
      const whatsappBtn = document.getElementById("whatsapp");
      if (!whatsappBtn) return;

      try {
        const res = await fetch("/api/contact.php");
        const data = await res.json();

        let url =
          data.url +
          "?text=Hola, vi tu página y me interesa una web para mi negocio";

        whatsappBtn.href = url;
      } catch (err) {
        console.error("WhatsApp init error:", err);
      }
    }

    initWhatsapp();
</script>