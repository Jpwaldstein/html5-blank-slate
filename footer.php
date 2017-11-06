<?php
/**
 * Default Footer Template
 *
 */
?>

<?php get_template_part('parts/applicationModal'); ?>

<footer class="footer row p-top-50px p-bottom-50px">
    <div class="column small-12 text-center">
        <div class="footer-copyright">
            <a class="applicationModal" href="#">MODAL</a>
            <p>Have questions? Happy to help. <a class="text-underline" href="#">Email</a> us or call us at 617-939-0368 Monday through Friday 9AM – 6PM ET, excluding public holidays.</p>
            <p><strong><a class="text-underline" href="/terms-and-conditions/">Terms & Conditions</a></strong> / <strong><a class="text-underline" href="/privacy-policy/">Privacy Policy</a></strong></p>
            <img src="<?= get_stylesheet_directory_uri();?>/assets/images/Powered-by-TLC-updated-BW-Copy.png" alt="">
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<?php
// don't track admins or editors and google analytics option is filled in
if ( ! current_user_can( 'edit_pages' ) && get_option( 'client_google_analytics' ) ) :
    $analytics_id = get_option( 'client_google_analytics' ); ?>

    <!-- Google Universal Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', '<?php echo $analytics_id; ?>', 'auto');ga('send', 'pageview');
    </script>
<?php endif; ?>

</body>
</html>
