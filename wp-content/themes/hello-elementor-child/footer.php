<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
	if ( hello_elementor_display_header_footer() ) {
		if ( did_action( 'elementor/loaded' ) && hello_header_footer_experiment_active() ) {
			get_template_part( 'template-parts/dynamic-footer' );
		} else {
			get_template_part( 'template-parts/footer' );
		}
	}
}
?>

<?php wp_footer(); ?>

<script>
window.scrollTo(0, 0);
if (window.location.hash) {
    document.getElementById('scroll').style.display = 'none';
}
window.addEventListener('load', () => {
  setTimeout(() => {
    document.getElementById('scroll').style.display = 'block';
  }, 500);
  if (window.location.hash) {
    setTimeout(() => {
      smoothScrollTo(0, 750, 1000); 
    }, 500);
  }

  let scrollOffset = 100; /* scroll offset from the top of title */
  
  const tabsAccordionToggleTitles = document.querySelectorAll('.e-n-accordion-item-title, .e-n-tab-title, .elementor-tab-title');
  
  const clickTitleWithAnchor = (anchor) => {
    tabsAccordionToggleTitles.forEach(title => {
      if (title.querySelector(`#${anchor}`) != null || title.id === anchor || (title.closest('details') && title.closest('details').id === anchor)) {
        if (title.getAttribute('aria-expanded') !== 'true' && !title.classList.contains('elementor-active')) title.click();
        let timing = 0;
        let scrollTarget = title;
        if (getComputedStyle(title.closest('.elementor-element')).getPropertyValue('--n-tabs-direction') == 'row') scrollTarget = title.closest('.elementor-element');
        if (title.closest('.e-n-accordion, .elementor-accordion-item, .elementor-toggle-item')) {
          timing = 400;
        }
        setTimeout(function () {
          scrollTarget.scrollIntoView({ 
            behavior: 'smooth', 
            block: 'start' 
          });
        }, timing);
      }
    });
  };
  
  document.addEventListener('click', (event) => {
    if (event.target.closest('a') && event.target.closest('a').href.includes('#')) {
      const anchor = extractAnchor(event.target.closest('a').href);
      if (anchor && isAnchorInTitles(anchor, tabsAccordionToggleTitles)) {
        event.preventDefault();
        clickTitleWithAnchor(anchor);
      }
    }
  });
  
  const currentAnchor = extractAnchor(window.location.href);
  if (currentAnchor) {
    clickTitleWithAnchor(currentAnchor);
  }
  
  function extractAnchor(url) {
    const match = url.match(/#([^?]+)/);
    return match ? match[1] : null;
  };
  
  function isAnchorInTitles(anchor, titles) {
    return Array.from(titles).some(title => {
      return title.querySelector(`#${anchor}`) !== null || title.id === anchor || (title.closest('details') && title.closest('details').id === anchor);
    });
  };

  function getStickyNavbarHeight() {
    const stickyNavbar = document.querySelector('.elementor-sticky');
    return stickyNavbar ? stickyNavbar.offsetHeight : 0;
  }

  function smoothScrollTo(x, y, duration) {
    const startingY = window.pageYOffset;
    const diff = y - startingY;
    let start;

    // Bootstrap our animation - it will get called right before next frame shall be rendered.
    window.requestAnimationFrame(function step(timestamp) {
      if (!start) start = timestamp;
      // Elapsed milliseconds since start of scrolling.
      const time = timestamp - start;
      // Get percent of completion in range [0, 1].
      const percent = Math.min(time / duration, 1);

      window.scrollTo(0, startingY + diff * percent);

      // Proceed with animation as long as we wanted it to.
      if (time < duration) {
        window.requestAnimationFrame(step);
      }
    })
  }
});
</script>

</body>
</html>
