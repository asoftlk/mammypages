<div class="left-menu-part">
    <h3>MP Directory</h3>
    <ul style="list-style-type:none; padding-left:0">
    <li><a role="button" href="hospital"><i class="icofont-hospital"></i> HOSPITALS</a></li>
    <li><a role="button" href="doctors"><i class="icofont-doctor"></i> DOCTORS</a></li>
    <li><a role="button" href="midwifes"><i class="icofont-nurse"></i> MIDWIFE CLINICS</a></li>
    <li><a role="button" href="medical"><i class="icofont-nurse-alt"></i> MEDICAL CLINICS</a></li>
    <li><a role="button" href="pharmacies"><i class="icofont-medical-sign"></i> PHARMACIES</a></li>
    <li><a role="button" href="beauty"><i class="icofont-girl-alt"></i> BEAUTY SALON</a></li>
    </ul>
    <div class="client-sec"><a class="client-btn">Sponsors</a></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var path = window.location.pathname.split("/").pop();
        var menuLinks = document.querySelectorAll(".left-menu-part a");

        menuLinks.forEach(function(link) {
            var href = link.getAttribute("href");
            if (href === path) {
                link.classList.add("active");
            }
        });
    });
</script>
