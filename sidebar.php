<h3>MP Directory</h3>
<ul style="list-style-type:none; padding-left:0">
    <li><a role="button" href="hospital"><i class="icofont-hospital"></i> HOSPITALS</a></li>
    <li><a role="button" href="doctors"><i class="icofont-doctor"></i> DOCTORS</a></li>
    <li><a role="button" href="midwife"><i class="icofont-nurse"></i> MIDWIFE CLINICS</a></li>
    <li><a role="button" href="medical"><i class="icofont-nurse-alt"></i> MEDICAL CLINICS</a></li>
    <li><a role="button" href="pharmacies"><i class="icofont-medical-sign"></i> PHARMACIES</a></li>
    <li><a role="button" href="beauty"><i class="icofont-girl-alt"></i> BEAUTY SALON</a></li>
    <!-- <li><a role="button" href="testmidwife/midwife"><i class="icofont-nurse"></i>TEST MIDWIFE</a></li> -->

</ul>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var path = window.location.pathname.split("/").pop();
        var queryParams = new URLSearchParams(window.location.search);
        var type = queryParams.get('type') ? queryParams.get('type').toLowerCase() : null;
        var menuLinks = document.querySelectorAll("ul li a");

        function activateLink(href) {
            menuLinks.forEach(function(link) {
                if (link.getAttribute("href") === href) {
                    link.classList.add("active");
                }
            });
        }

        switch (path) {
            case 'hospital':
                activateLink('hospital');
                break;
            case 'doctors':
                activateLink('doctors');
                break;
            case 'midwife':
                activateLink('midwife');
                break;
            case 'medical':
                activateLink('medical');
                break;
            case 'pharmacies':
                activateLink('pharmacies');
                break;
            case 'beauty':
                activateLink('beauty');
                break;
            case 'studio':
                activateLink('studio');
                break;
        }

        if (path === 'mpdetails' && type) {
            switch (type) {
                case 'doctor':
                    activateLink('doctors');
                    break;
                case 'hospital':
                    activateLink('hospital');
                    break;
                case 'midwife':
                    activateLink('midwife');
                    break;
                case 'medical':
                    activateLink('medical');
                    break;
                case 'pharmacy':
                    activateLink('pharmacies');
                    break;
                case 'saloon':
                    activateLink('beauty');
                    break;
                case 'studio':
                    activateLink('studio');
                    break;
            }
        }

        var pathSegments = window.location.pathname.split("/");
        if (pathSegments.includes("mpconnect") && pathSegments.length > 2) {
            var detailType = pathSegments[pathSegments.length - 2];
            if (detailType) {
                switch (detailType.toLowerCase()) {
                    case 'doctor':
                        activateLink('doctors');
                        break;
                    case 'hospital':
                        activateLink('hospital');
                        break;
                    case 'midwife':
                        activateLink('midwife');
                        break;
                    case 'medical':
                        activateLink('medical');
                        break;
                    case 'pharmacy':
                        activateLink('pharmacies');
                        break;
                    case 'beauty':
                        activateLink('beauty');
                        break;
                    case 'studio':
                        activateLink('studio');
                        break;
                }
            }
        }
    });
</script>
