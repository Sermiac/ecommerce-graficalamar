<footer class="site-footer">
    <div class="footer-columns">
        <div class="footer-column">
            <h3>Sobre nosotros</h3>
            <ul>
                <li><a href="/">Nuestra Historia</a></li>
                <li><a href="/">Misión y Visión</a></li>
                <li><a href="/">Sostenibilidad</a></li>
                <li><a href="/">Trabaja con nosotros</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Soporte</h3>
            <ul>
                <li><a href="/">Centro de ayuda</a></li>
                <li><a href="/">Envíos y Entregas</a></li>
                <li><a href="/">Devoluciones</a></li>
                <li><a href="/">Términos y Condiciones</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Contacto</h3>
            <ul>
                <li><a id="footer-whatsapp" href="/">WhatsApp</a></li>
                <li><a href="/">Correo electrónico</a></li>
                <li><a href="/">Ubicación</a></li>
                <li><a href="/">Redes Sociales</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2027 GrafiCalamar, Todos los derechos reservados, Desarrollado por <a href="https://sermiac.github.io/" target="_blank">Sermiac</a></p>
    </div>
</footer>

<script>
(async function() {
  const whatsappLink = document.getElementById("footer-whatsapp");
  if (!whatsappLink) return;
  try {
    const res = await fetch("/api/contact.php");
    const data = await res.json();
    if (data.url) {
      whatsappLink.href = data.url;
      whatsappLink.target = "_blank";
    }
  } catch (err) {
    console.error("Footer WhatsApp error:", err);
  }
})();
</script>
