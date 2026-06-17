<section class="section-intro">
  <div class="section-heading">
    <span class="section-kicker">Chi sono</span>
    <h2>Un unico riferimento per i piccoli lavori che non vuoi rimandare.</h2>
  </div>
  <div class="intro-grid">
    <div class="intro-copy">
      <p>
        Mi chiamo Antonio e mi occupo di manutenzione domestica con attenzione ai dettagli,
        puntualita' e soluzioni pratiche. Lavoro su interventi che devono essere fatti bene,
        senza complicare la vita al cliente.
      </p>
      <p>
        Seguo riparazioni, montaggi, piccoli lavori elettrici e sistemazioni per abitazioni private
        e piccoli uffici. L'obiettivo e' semplice: risolvere il problema in tempi rapidi
        e lasciare tutto in ordine.
      </p>
    </div>
    <aside class="trust-card">
      <h3>Perche' mi scelgono</h3>
      <ul class="check-list">
        <li>Comunicazione chiara prima dell'intervento</li>
        <li>Preventivi senza sorprese</li>
        <li>Massima cura per casa e ambienti</li>
        <li>Disponibilita' anche per urgenze leggere</li>
      </ul>
    </aside>
  </div>
</section>

<section class="services-section">
  <div class="section-heading">
    <span class="section-kicker">Servizi</span>
    <h2>I lavori piu' richiesti</h2>
    <p>Interventi pratici per la casa, dalla manutenzione quotidiana alle sistemazioni che richiedono mano esperta.</p>
  </div>

  <div class="service-grid">
    <article class="service-card">
      <span class="card-icon" aria-hidden="true">&#9889;</span>
      <h3>Impianti e piccoli guasti</h3>
      <p>Punti luce, prese, collegamenti, controlli e piccoli interventi elettrici domestici.</p>
    </article>
    <article class="service-card">
      <span class="card-icon" aria-hidden="true">&#129521;</span>
      <h3>Montaggi e fissaggi</h3>
      <p>Mensole, mobili, supporti TV, accessori bagno e arredi da installare con precisione.</p>
    </article>
    <article class="service-card">
      <span class="card-icon" aria-hidden="true">&#127912;</span>
      <h3>Ritocchi e finiture</h3>
      <p>Tinteggiature leggere, sistemazioni e piccoli lavori per rimettere in ordine gli ambienti.</p>
    </article>
    <article class="service-card">
      <span class="card-icon" aria-hidden="true">&#128295;</span>
      <h3>Riparazioni domestiche</h3>
      <p>Piccoli elettrodomestici, componenti usurati e problemi pratici da risolvere rapidamente.</p>
    </article>
  </div>
</section>

<section class="steps-section">
  <div class="section-heading">
    <span class="section-kicker">Metodo</span>
    <h2>Come lavoro</h2>
  </div>
  <div class="steps-grid">
    <article class="step-card">
      <span>1</span>
      <h3>Primo contatto</h3>
      <p>Mi scrivi o mi chiami, descrivi il lavoro e valutiamo subito la soluzione piu' adatta.</p>
    </article>
    <article class="step-card">
      <span>2</span>
      <h3>Preventivo chiaro</h3>
      <p>Definiamo tempi, costi e materiali necessari senza giri inutili.</p>
    </article>
    <article class="step-card">
      <span>3</span>
      <h3>Intervento ordinato</h3>
      <p>Eseguo il lavoro con attenzione, lasciando l'ambiente pulito e funzionante.</p>
    </article>
  </div>
</section>

<section class="gallery-section">
  <div class="section-heading">
    <span class="section-kicker">Lavori eseguiti</span>
    <h2>Alcuni interventi recenti</h2>
    <p>Una selezione di lavori reali per mostrare il tipo di attivita' che seguo piu' spesso.</p>
  </div>
  <div class="gallery-toolbar">
    <p class="gallery-hint">Su mobile puoi scorrere la galleria con il dito oppure usare i pulsanti.</p>
    <div class="gallery-controls" aria-label="Controlli galleria">
      <button type="button" class="gallery-control prev" aria-label="Foto precedente">&#10094;</button>
      <button type="button" class="gallery-control next" aria-label="Foto successiva">&#10095;</button>
    </div>
  </div>
  <div class="carousel-wrapper" tabindex="0" role="region" aria-label="Galleria dei lavori eseguiti">
    <div class="carousel" id="work-gallery">
      <?php
      $dir = __DIR__ . "/media/";
      $url = $basePath . "/view/media/";

      if (is_dir($dir)) {
          $images = glob($dir . "*.{webp,jpg,jpeg,png}", GLOB_BRACE);
          $images = array_slice($images, 0, 12);

          if (!empty($images)) {
              $position = 1;
              foreach ($images as $file) {
                  $img = basename($file);
                  echo '<img data-real="1" tabindex="0" loading="lazy" width="220" height="160" src="' . $url . $img . '" alt="Lavoro eseguito ' . $position . '" aria-label="Apri immagine del lavoro ' . $position . '">';
                  $position++;
              }

              foreach ($images as $file) {
                  $img = basename($file);
                  echo '<img loading="lazy" width="220" height="160" src="' . $url . $img . '" alt="" aria-hidden="true" tabindex="-1">';
              }
          } else {
              echo '<p class="gallery-empty">Cartella vuota</p>';
          }
      } else {
          echo '<p class="gallery-empty">Cartella non trovata</p>';
      }
      ?>
    </div>
  </div>
</section>

<section class="reviews-section">
  <div class="section-heading">
    <span class="section-kicker">Recensioni</span>
    <h2>Fiducia prima di tutto</h2>
    <p>Chi cerca un manutentore vuole soprattutto serieta', puntualita' e chiarezza. E' quello che porto in ogni intervento.</p>
  </div>

  <div class="review-grid">
    <article class="review-card">
      <div class="review-stars">&#11088; &#11088; &#11088; &#11088; &#11088;</div>
      <p>"Lavoro preciso, puntuale e pulito. Comunicazione chiara dall'inizio alla fine."</p>
      <strong>Cliente privato</strong>
    </article>
    <article class="review-card">
      <div class="review-stars">&#11088; &#11088; &#11088; &#11088; &#11088;</div>
      <p>"Ottimo per piccoli lavori che richiedono attenzione e mano pratica. Consigliato."</p>
      <strong>Intervento domestico</strong>
    </article>
    <article class="review-cta">
      <h3>Hai gia' lavorato con me?</h3>
      <p>Lascia una recensione e aiuta altri clienti a capire subito come lavoro.</p>
      <a class="cta-primary" href="https://www.google.it/search?hl=it-RO&sxsrf=ANbL-n5XBhW9r9pcZ7I98AXvJPtDKEYoKQ:1769009345607&si=AL3DRZEsmMGCryMMFSHJ3StBhOdZ2-6yYkXd_doETEE1OR-qORV8xPycDCMAL74hjJQ6iSRIqnDWiDx1X1LYsRX-__Ng_lNBcvgwDN-nLavupeNDsXxBRl19u2KYoEH0N328YKTxKTgNuw_hFIV8B2WKnbhQK9v5kjdL7Jf5nzJEwG46SddjUDc%3D&q=Antonio+Manutentore+-Tuttofare+Recensioni&aic=0" target="_blank" rel="noopener noreferrer">Scrivi una recensione</a>
    </article>
  </div>
</section>

<section class="contact contact-section">
  <div class="section-heading">
    <span class="section-kicker">Contatti</span>
    <h2>Hai un lavoro da sistemare?</h2>
    <p>Mandami una foto, spiegami il problema o chiamami direttamente: rispondo in modo rapido e concreto.</p>
  </div>

  <div class="contact-layout">
    <div class="contact-actions">
      <a class="contact-pill" href="tel:+393920064573">+39 392 006 4573</a>
      <a class="contact-pill" href="mailto:info@antoniomanutentore.it">info@antoniomanutentore.it</a>
      <a class="contact-pill is-highlight" href="https://wa.me/393920064573" target="_blank" rel="noopener noreferrer">Apri WhatsApp</a>
    </div>
    <div class="contact-meta">
      <p><strong>Zona di intervento:</strong> Costigliole Saluzzo (CN) e dintorni</p>
      <p><strong>Disponibilita':</strong> tutti i giorni fino alle 20:00</p>
      <p><strong>Ideale per:</strong> manutenzioni, montaggi, ritocchi e riparazioni domestiche</p>
    </div>
  </div>
</section>
