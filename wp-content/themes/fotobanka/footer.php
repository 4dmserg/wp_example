<div class="footer py-4">
    <?php get_template_part('parts/copyright') ?>
</div>

  </div>
  
    <?php wp_footer(); ?>
  
  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
     start_print();
  </script>
  <span id="langvar" style="display: none;"><?php echo apply_filters('wpml_current_language', null); ?></span>
</body>
</html>
