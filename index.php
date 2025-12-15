<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Alpemania</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <header class="site-header">
      <div class="wrap">
         <h1>Alpemania</h1>
      </div>
   </header>

   <main class="wrap">
      <section class="hero" id="hero">
         <div class="left-images">
            <img src="Images/image-1.jpg" alt="image-1" class="img img-1">
            <img src="Images/image-2.jpg" alt="image-2" class="img img-2">
            <img src="Images/image-3.jpg" alt="image-3" class="img img-3">
               <img src="Images/image-1.svg" alt="image-1" class="img img-1">
               <img src="Images/image-2.svg" alt="image-2" class="img img-2">
               <img src="Images/image-3.svg" alt="image-3" class="img img-3">
         </div>

         <div class="right-text">
            <div class="content" id="heroContent">
               <h2>Bienvenue</h2>
               <p>Texte descriptif à droite des images. Cette section glisse légèrement vers la gauche au chargement pour venir se positionner à côté des images.</p>
               <p>Ajoutez vos images dans le dossier <code>Images/</code> nommées <code>image-1.jpg</code>, <code>image-2.jpg</code>, <code>image-3.jpg</code>.</p>
            </div>
         </div>
      </section>

      <section class="slides" aria-label="Diaporama automatique">
         <div class="slide active">
            <img src="Images/image-1.svg" alt="slide1">
            <div class="slide-text">Slide 1 — Texte interne</div>
         </div>
         <div class="slide">
            <img src="Images/image-2.svg" alt="slide2">
            <div class="slide-text">Slide 2 — Autre texte</div>
         </div>
         <div class="slide">
            <img src="Images/image-3.svg" alt="slide3">
            <div class="slide-text">Slide 3 — Encore du texte</div>
         </div>
      </section>

      <section class="contact">
         <h3>Contact</h3>
         <form action="send_mail.php" method="post">
            <label>Nom<input type="text" name="name" required></label>
            <label>Email<input type="email" name="email" required></label>
            <label>Message<textarea name="message" required></textarea></label>
            <button type="submit">Envoyer</button>
         </form>
      </section>
   </main>

   <footer class="site-footer">
      <div class="wrap footer-inner">
         <div class="social">
            <a href="https://github.com/" target="_blank" rel="noopener">GitHub</a>
            <a href="https://www.linkedin.com/" target="_blank" rel="noopener">LinkedIn</a>
            <a href="resume.pdf" target="_blank" rel="noopener">PDF</a>
         </div>
         <div class="copyright">© Alpemania</div>
      </div>
   </footer>

   <script>
      // Hero slide-in
      window.addEventListener('load', function(){
         setTimeout(function(){
            document.getElementById('heroContent').classList.add('slide-left');
         }, 200);
      });

      // Automatic slides
      (function(){
         let idx = 0;
         const slides = document.querySelectorAll('.slides .slide');
         function show(i){
            slides.forEach((s,si)=>{
               s.classList.toggle('active', si===i);
            });
         }
         function next(){
            idx = (idx+1) % slides.length; show(idx);
         }
         setInterval(next, 3500);
      })();
   </script>
</body>
</html>