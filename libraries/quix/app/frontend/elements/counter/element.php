<!-- Image Element -->
<QuixTemplate id="counter-template">
  <QuixHtml>
    <?php echo file_get_contents(__DIR__ . "/partials/html.twig") ?>
  </QuixHtml>
  <QuixStyle>

    <!-- Global Style -->
    <?php echo file_get_contents(__DIR__ . "/../../global.twig") ?>

    <!-- Element Style -->
    <?php echo file_get_contents(__DIR__ . "/partials/style.twig") ?>
  </QuixStyle>
  <QuixScript>
    <!-- Element script -->
    <?php echo file_get_contents(__DIR__ . "/partials/script.twig") ?>
  </QuixScript>
</QuixTemplate>