
<section>
  <h2>Chi sono</h2>
    <p>
        Mi chiamo Antonio e lavoro come manutentore tuttofare.
        Offro servizi di manutenzione ordinaria per tutta la casa,
        con un approccio serio, preciso e professionale.
    </p>
    <p>
        Il mio obiettivo è fornire <strong>soluzioni rapide ed efficaci per ogni esigenza</strong>,
        aiutando i clienti a risolvere piccoli e grandi problemi domestici
        in modo semplice e senza stress.
    </p>
    <p>
        Mi occupo di numerosi interventi di manutenzione e riparazione,
        sia per abitazioni private che per piccoli uffici,
        garantendo sempre attenzione ai dettagli e lavori ben eseguiti.
    </p>
</section>

<section>
  <h2>Servizi offerti</h2>
    <ul class="services-list">
        <li><span class="icon">⚡</span> Manutenzione elettrica domestica</li>
        <li><span class="icon">🎨</span> Tinteggiatura di interni e ritocchi murali</li>
        <li><span class="icon">🧱</span> Montaggio di mensole e scaffalature</li>
        <li><span class="icon">🪑</span> Montaggio e smontaggio mobili</li>
        <li><span class="icon">📺</span> Installazione a parete di TV e altri schermi</li>
        <li><span class="icon">🔧</span> Ripristino e riparazione piccoli elettrodomestici</li>
        <li><span class="icon">🌀</span> Riparazione aspirapolveri e piccoli apparecchi</li>
        <li><span class="icon">🏠</span> Altri piccoli lavori domestici su richiesta</li>
    </ul>

</section>

<section>
  <h2>Perché scegliermi</h2>
    <ul class="why-list">
        <li><span class="icon">✅</span> Massima serietà e professionalità</li>
        <li><span class="icon">⏱️</span> Interventi rapidi e puntuali</li>
        <li><span class="icon">🧠</span> Soluzioni pratiche per ogni esigenza</li>
        <li><span class="icon">💰</span> Preventivi gratuiti e senza sorprese</li>
        <li><span class="icon">🤝</span> Chiarezza e disponibilità verso il cliente</li>
    </ul>
</section>
<section>
  <h2>Alcuni lavori eseguiti</h2>

  <div class="carousel-wrapper">
    <div class="carousel">
      <?php
        // Cambia solo questa se il tuo sito non è /manutenzione
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/view/media/';
        $url = '/view/media/';

        if (is_dir($dir)) {

          $images = glob($dir . '*.{webp,jpg,jpeg,png}', GLOB_BRACE);

          // ✅ limita le immagini (consigliato) per non caricare troppo
          $images = array_slice($images, 0, 12);

          if (!empty($images)) {

              // immagini reali
              foreach ($images as $file) {
                $img = basename($file);
                echo '<img data-real="1" loading="lazy" width="220" height="160" src="' . $url . $img . '" alt="Lavoro eseguito">';
              }

              // duplicati per loop infinito (NO data-real)
              foreach ($images as $file) {
                $img = basename($file);
                echo '<img loading="lazy" width="220" height="160" src="' . $url . $img . '" alt="Lavoro eseguito">';
              }

          } else {
            echo '<p style="text-align:center;color:#999;">Cartella vuota</p>';
          }

        } else {
          echo '<p style="text-align:center;color:#999;">Cartella non trovata</p>';
        }
      ?>
    </div>
  </div>
</section>

<section>
  <h2>Recensioni dei clienti</h2>

  <p style="text-align:center">
    Hai utilizzato i miei servizi?<br>
    <strong>Lascia una recensione su Google!</strong>
  </p>

  <div style="text-align:center; margin-top:1rem;">
    <a href="https://www.google.it/search?hl=it-RO&sxsrf=ANbL-n5XBhW9r9pcZ7I98AXvJPtDKEYoKQ:1769009345607&si=AL3DRZEsmMGCryMMFSHJ3StBhOdZ2-6yYkXd_doETEE1OR-qORV8xPycDCMAL74hjJQ6iSRIqnDWiDx1X1LYsRX-__Ng_lNBcvgwDN-nLavupeNDsXxBRl19u2KYoEH0N328YKTxKTgNuw_hFIV8B2WKnbhQK9v5kjdL7Jf5nzJEwG46SddjUDc%3D&q=Antonio+Manutentore+-Tuttofare+Recensioni&aic=0" target="_blank"
       style="display:inline-block; padding:12px 20px; background:#fbbc05; color:#000;
              border-radius:8px; font-weight:600; text-decoration:none;">
      ⭐ Scrivi una recensione
    </a>
  </div>
</section>


<section class="contact">
  <h2>Contatti</h2>
    <p>        <strong>Telefono:</strong>
        <a href="tel:+393920064573">+39 392 006 4573</a>
    </p>
    <p>        <strong>Email:</strong>
        <a href="mailto:info@antoniomanutentore.it">info@antoniomanutentore.it</a>
    </p>
    <p>
        <strong>Zona di intervento:</strong><br>
        Costigliole Saluzzo (CN) e dintorni
    </p>
    <p>
        <strong>Orari:</strong><br>
        Tutti i giorni fino alle ore 20:00
    </p>
</section>