<!-- Google Element -->
<QuixTemplate id="google-map-template">
  <QuixHtml>
    <?php echo file_get_contents(__DIR__ . "/partials/html.twig") ?>
  </QuixHtml>
  <QuixStyle>
    <!-- Global Style -->
    <?php echo file_get_contents(__DIR__ . "/../../global.twig") ?>
    <!-- Element Style -->
    <?php echo file_get_contents(__DIR__ . "/partials/style.twig") ?>
  </QuixStyle>
</QuixTemplate>