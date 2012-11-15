<div id="footer">
    <footer>
      <?php wp_nav_menu( array( 'theme_location' => 'bottom_menu', 'container' => 'nav', 'container_id' => 'bottom_menu') ); ?>
      <small class="copyright">Sapeca Paz - <?php echo date('Y');?> - Website por <a target="_blank" href="http://gustavoguichard.com/">Gustavo Guichard</a> - Ilustrações por <a target="_blank" href="http://lianachiapinotto.com/">Liana Chiapinotto</a></small>
    </footer>
  </div>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/sapeca.js"></script>
<?php	wp_footer(); ?>	
</body>
</html>