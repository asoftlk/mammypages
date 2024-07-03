<h3>MP Directory</h3>
<ul style="list-style-type:none; padding-left:0">
    <li><a role="button" href="hospital"><i class="icofont-hospital"></i> HOSPITALS</a></li>
    <li><a role="button" href="doctors"><i class="icofont-doctor"></i> DOCTORS</a></li>
    <li><a role="button" href="midwifes"><i class="icofont-nurse"></i> MIDWIFE CLINICS</a></li>
    <li><a role="button" href="medical"><i class="icofont-nurse-alt"></i> MEDICAL CLINICS</a></li>
    <li><a role="button" href="pharmacies"><i class="icofont-medical-sign"></i> PHARMACIES</a></li>
    <li><a role="button" href="beauty"><i class="icofont-girl-alt"></i> BEAUTY SALON</a></li>
    <li><a role="button" href="studio"><i class="icofont-camera"></i> STUDIOS</a></li>
</ul>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var path = window.location.pathname.split("/").pop();
        var queryParams = new URLSearchParams(window.location.search);
        var type = queryParams.get('type') ? queryParams.get('type').toLowerCase() : null;
        var menuLinks = document.querySelectorAll(".left-menu-part a");

        menuLinks.forEach(function(link) {
            var href = link.getAttribute("href");
            if (href === path) {
                link.classList.add("active");
            }
        });

        if (path === 'mpdetails' && queryParams.get('type') === 'doctor') {
            document.querySelector('a[href="doctors"]').classList.add("active");
        } else if (path === 'mphospital_details' && queryParams.get('type') === 'hospital') {
            document.querySelector('a[href="hospital"]').classList.add("active");
        } else if (path === 'mpdetails' && queryParams.get('type') === 'midwife') {
            document.querySelector('a[href="midwifes"]').classList.add("active");
        } else if (path === 'mpdetails' && queryParams.get('type') === 'medical') {
                document.querySelector('a[href="medical"]').classList.add("active");
        } else if (path === 'mpdetails' && queryParams.get('type') === 'pharmacy') {
                document.querySelector('a[href="pharmacies"]').classList.add("active");
        } else if (path === 'mpdetails' && queryParams.get('type') === 'saloon') {
            document.querySelector('a[href="beauty"]').classList.add("active");
        }else if (path === 'mpdetails' && queryParams.get('type') === 'studio') {
            document.querySelector('a[href="studio"]').classList.add("active");
        }
    });
</script>
