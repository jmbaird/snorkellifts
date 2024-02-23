  document.addEventListener('DOMContentLoaded', function() {
    var containers = document.querySelectorAll('.elementor-element.elementor-widget.elementor-widget-html');

    containers.forEach(function(container) {
      var specValue = container.querySelector('.spec--value');
      
      if (!specValue.textContent.trim()) {
        container.classList.add('hidden'); // Add a class to hide the parent div
      }
    });
  });
  
document.addEventListener('DOMContentLoaded', function() {
    var downloadLinks = document.querySelectorAll('.single-product--downloads-pdf');

    downloadLinks.forEach(function(link) {
        if (!link.getAttribute('href')) {
            link.style.display = 'none'; // Hide the link
        }
    });
});


document.addEventListener('DOMContentLoaded', function() {
    var allAssessoriesAcc = document.querySelectorAll('#assessories');
    var allDownloadAcc = document.querySelectorAll('#download');

    allAssessoriesAcc.forEach(function(single_acc){

        var empty_assessories = single_acc.querySelectorAll('.snk-srx-empty');
        if(empty_assessories.length > 0){
            single_acc.style.display = 'none';
        }
    });

    allDownloadAcc.forEach(function(single_acc){

        var downloadSections = single_acc.querySelectorAll('.single-product-download-flyer, .single-product-download-imperial, .single-product-download-metric,.single-product-download-multifold, .single-product-download-emergency');
        var acc_hidden_sections_count = 0;
        var acc_total_section_count = downloadSections.length;
        downloadSections.forEach(function(section) {
            var links = section.querySelectorAll('.single-product--downloads-pdf');

            var hideSection = Array.from(links).every(function(link) {
                return !link.getAttribute('href');
            });

            if (hideSection) {
                acc_hidden_sections_count++;
                section.style.display = 'none';
            }
        });

        if(acc_total_section_count !== 0 && acc_total_section_count == acc_hidden_sections_count){
            single_acc.style.display = 'none';
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    hideElement('.single-product-video iframe', '.single-product-video-label');
    hideElement('.single-product-gallery', '.single-product-gallery-label');
    hideElement('.video-category', '.video-cat-container');
    hideElement('.espanol-heading .elementor-heading-title a', '.espanol-heading ');
});

function hideElement(titleElement, contentElement) {
    var title = document.querySelector(titleElement);
    if (title) {
        var content = document.querySelector(contentElement);
        if (content) {
            content.classList.add('srx-block');
        }
    }
}

// Hide elements when the page loads
window.onload = function() {
    hideElement('.single-product-video iframe', '.single-product-video-label');
    hideElement('.single-product-gallery', '.single-product-gallery-label');
    hideElement('.video-category', '.video-cat-container');
    hideElement('.espanol-heading .elementor-heading-title a', '.espanol-heading ');
};



function kmToMiles(km) {
    return (km * 0.621371).toFixed(3);
}

// Get the select element
var select = document.getElementById("store_locator_filter_radius");

// Loop through options and add miles equivalent
for (var i = 0; i < select.options.length; i++) {
    var km = parseInt(select.options[i].value);
    var miles = kmToMiles(km);
    select.options[i].text += " / " + miles + " miles";
}

// OPEN SPECIFIC ACCORDIAN TAB ON BROWING A LINK

window.addEventListener('load', () => {
    setTimeout(function () {
        let scrollOffset = 100; 

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
                        jQuery('html, body').animate({
                            scrollTop: jQuery(scrollTarget).offset().top - scrollOffset,
                        }, 'slow');
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
    }, 300);
});
// OPEN SPECIFIC ACCORDIAN TAB ON BROWING A LINK END
