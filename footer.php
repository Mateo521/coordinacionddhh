<footer class="bg-[#080F20] py-12">
    <div class="max-w-7xl mx-auto px-6">
      <div class="border-t border-white/5 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
        <p class="text-white/20 text-xs">© <?php echo date('Y'); ?> Coordinación General de Derechos Humanos · UNSL</p>
        <p class="text-white/20 text-xs">Av. Ejército de los Andes 950 · San Luis, Argentina</p>
      </div>
    </div>
  </footer>

  <script>
    document.getElementById('menuBtn').addEventListener('click', () => {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          const offset = 64;
          const top = target.getBoundingClientRect().top + window.scrollY - offset;
          window.scrollTo({ top, behavior: 'smooth' });
          document.getElementById('mobileMenu').classList.add('hidden');
        }
      });
    });
  </script>

  <?php wp_footer(); ?>
</body>
</html>