<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
//if you want to set line layout default then apply this   
localStorage.setItem("layout", "line-layout"); 

document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('accordion-header');
    const content = document.getElementById('content-accordion');

    header.addEventListener('click', function() {
        content.classList.toggle('show-accordion');
        header.classList.toggle('active-accordion');
    });
});</script>
<!-- end Simple Custom CSS and JS -->
