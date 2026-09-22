<?php // VOLTIA Motors · Portada (PHP + parciales + formulario con backend) ?>
<?php require __DIR__ . '/partials/header.php'; ?>

<main id="top">
  <!-- HERO -->
  <section class="hero">
    <div class="blob b1"></div><div class="blob b2"></div>
    <div class="hero-txt">
      <p class="tag">⚡ Eléctricos · Híbridos · 0 emisiones</p>
      <h1>MANEJA EL<br><span class="grad">FUTURO</span> HOY</h1>
      <p class="lead">Voltia no vende autos. Entrega <strong>rayos con ruedas</strong>: 0–100 en 3,9 s, 520 km de autonomía y carga del 80% en 18 minutos.</p>
      <div class="cta-row">
        <a href="#modelos" class="btn neon big">Ver modelos 🚗</a>
        <a href="#prueba" class="btn ghost big">Prueba gratis</a>
      </div>
      <div class="stats">
        <div><strong><span class="count" data-n="520">0</span> km</strong><small>autonomía</small></div>
        <div><strong><span class="count" data-n="39" data-dec="1">0</span> s</strong><small>0–100 km/h</small></div>
        <div><strong><span class="count" data-n="18">0</span> min</strong><small>carga 80%</small></div>
      </div>
    </div>
    <div class="hero-art noselect" aria-hidden="true">
      <div class="showroom">
        <div class="ring"></div>
        <div class="plato"><div class="plato-luz"></div></div>
        <figure class="car3d">
          <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=1000&auto=format&fit=crop" alt="" draggable="false" fetchpriority="high"
            onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1000&auto=format&fit=crop'">
          <span class="shine"></span>
        </figure>
        <div class="badges"><span>⚡ 520 km</span><span>🚀 3,9 s 0–100</span></div>
      </div>
    </div>
  </section>

  <figure class="motion noselect" aria-label="Auto deportivo en movimiento en carretera">
    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1600&auto=format&fit=crop" alt="Deportivo negro en movimiento a alta velocidad" loading="lazy" draggable="false"
      onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1494976388531-d1058494cdd8?q=80&w=1600&auto=format&fit=crop'">
    <span class="vlines"></span>
    <figcaption>🔥 Así se siente un Voltia a 200 km/h <small>Foto en movimiento real · prueba la tuya gratis</small></figcaption>
  </figure>

  <div class="marquee noselect" aria-hidden="true"><div class="track">
    <span>⚡ VOLTIA-ONE ⚡ VOLTIA PULSE ⚡ VOLTIA TERRA ⚡ 0 EMISIONES ⚡ CARGA EN 18 MIN ⚡&nbsp;</span><span>⚡ VOLTIA-ONE ⚡ VOLTIA PULSE ⚡ VOLTIA TERRA ⚡ 0 EMISIONES ⚡ CARGA EN 18 MIN ⚡&nbsp;</span>
  </div></div>

  <!-- MODELOS (se cargan desde api/modelos.php con respaldo local) -->
  <section id="modelos" class="sec">
    <h2>Elige tu <span class="grad">rayo</span></h2>
    <div class="filters" role="group" aria-label="Filtrar modelos">
      <button class="chip active" data-f="all">Todos</button>
      <button class="chip" data-f="electrico">⚡ Eléctricos</button>
      <button class="chip" data-f="hibrido">🌿 Híbridos</button>
    </div>
    <div class="grid" id="grid"></div>
  </section>

  <!-- CONFIGURADOR -->
  <section id="configura" class="sec alt">
    <h2>Píntalo a tu <span class="grad">estilo</span></h2>
    <p>Toca un modelo, míralo girar en el plato y cambia su tono. Así se sentirá en tu garaje.</p>
    <div class="conf">
      <div class="model-btns" role="group" aria-label="Elegir modelo">
        <button class="mbtn sel" data-m="0">Voltia-One</button>
        <button class="mbtn" data-m="1">Pulse</button>
        <button class="mbtn" data-m="2">Terra 4x4</button>
      </div>
      <div class="showroom small">
        <div class="ring"></div>
        <div class="plato"><div class="plato-luz"></div></div>
        <figure class="car3d">
          <img id="conf-foto" src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=1000&auto=format&fit=crop" alt="Vista previa del modelo en el plato giratorio" draggable="false">
          <span class="shine"></span>
        </figure>
      </div>
      <div class="swatches" role="group" aria-label="Tono de pintura">
        <button class="sel" style="--c:#00e5ff" data-h="0deg" aria-label="Azul voltio"></button>
        <button style="--c:#ff2d78" data-h="140deg" aria-label="Rosa plasma"></button>
        <button style="--c:#a3ff12" data-h="60deg" aria-label="Lima neón"></button>
        <button style="--c:#ffb300" data-h="-40deg" aria-label="Ámbar"></button>
        <button style="--c:#7c3aed" data-h="90deg" aria-label="Violeta"></button>
        <button style="--c:#e8e8e8" data-h="0deg" data-bn="1" aria-label="Blanco luna"></button>
      </div>
      <p class="precio">Voltia-One · <strong id="conf-precio">$34.990</strong> <small>o $499/mes</small></p>
      <a href="#prueba" class="btn neon">Lo quiero 🙋</a>
    </div>
  </section>

  <!-- NOSOTROS -->
  <section id="nosotros" class="sec">
    <h2>Nacimos para <span class="grad">electrizar</span> Ecuador 🇪🇨</h2>
    <div class="cols">
      <div class="card float">🔋<h3>Batería con garantía 8 años</h3><p>Si baja del 80%, la cambiamos. Sin letra pequeña.</p></div>
      <div class="card float d2">🔌<h3>Carga gratis 1 año</h3><p>Red Voltia en Quito, Guayaquil y Cuenca.</p></div>
      <div class="card float d3">🛡️<h3>Blindaje total</h3><p>Mantenimiento incluido los primeros 30.000 km.</p></div>
    </div>
  </section>

  <!-- TESTIMONIOS -->
  <section id="testimonios" class="sec alt">
    <h2>Lo que <span class="grad">zumban</span> los dueños</h2>
    <div class="slider">
      <blockquote class="slide active">“Pasé de gastar $240 en gasolina a $35 de luz. El Voltia se pagó solo.”<cite>— Karla M., Quito · Voltia-One</cite></blockquote>
      <blockquote class="slide">“El configurador me enamoró y la prueba me convenció en 10 minutos.”<cite>— Diego P., Guayaquil · Pulse Híbrido</cite></blockquote>
      <blockquote class="slide">“Sube a la Mitad del Mundo sin despeinarse. Potencia brutal.”<cite>— Fernanda C., Cuenca · Terra 4x4</cite></blockquote>
      <div class="dots"><button class="dot active" aria-label="Opinión 1"></button><button class="dot" aria-label="Opinión 2"></button><button class="dot" aria-label="Opinión 3"></button></div>
    </div>
  </section>

  <!-- FORM (POST a guardar-prueba.php; el JS lo envía por fetch y muestra la respuesta) -->
  <section id="prueba" class="sec">
    <h2>Agenda tu prueba <span class="grad">gratis</span> ⚡</h2>
    <form id="form" class="form" action="guardar-prueba.php" method="POST" novalidate>
      <div><label for="nombre">Nombre:</label><input id="nombre" name="nombre" required placeholder="Tu nombre" autocomplete="name"></div>
      <div><label for="tel">WhatsApp:</label><input id="tel" name="tel" required placeholder="+593 ..." autocomplete="tel"></div>
      <div><label for="modelo">Modelo:</label><select id="modelo" name="modelo"><option>Voltia-One ⚡</option><option>Pulse Híbrido 🌿</option><option>Terra 4x4 ⚡</option></select></div>
      <button class="btn neon big" type="submit">Quiero mi prueba 🚀</button>
      <p id="ok" role="status"></p>
    </form>
  </section>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
