<style>
         .sidebar.slider-container {
            display: flex;
            align-items: center;
            position: relative;
        }
        .sidebar .slider {
            overflow: hidden;
            display: flex;
            white-space: nowrap;
            width: 100%;
            padding: 10px 0;
            margin: 0px 1.5rem;
            cursor: grab;
            overflow-x: scroll;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .sidebar .slider li {
            list-style: none;
        }
        .sidebar .slider a {
            display: inline-block;
            text-align: center;
            padding: 10px;
            white-space: normal;
            color: black;
            text-decoration: none;
            min-width: 120px; 
            text-wrap: nowrap;
        }
        .sidebar .slider a i {
            display: block;
            font-size: 24px;
            margin-bottom: 5px;
        }
        .sidebar .slick-prev{
            position: absolute;
            left: 4px;
            padding: 0 !important;
            top: 2.5rem;
        }
        .sidebar .slick-next{
            position: absolute;
            right: 4px;
            padding: 0 !important;
            top: 2.5rem;
        }
    </style>
<h3>MP Connect</h3>

<div class="sidebar slider-container mobileview">
    <button class="button prev slick-prev slick-arrow">&lt;</button>
    <ul class="slider ">
        <li><a role="button" href="hospital"><i class="icofont-hospital"></i> HOSPITALS</a></li>
        <li><a role="button" href="doctors"><i class="icofont-doctor"></i> DOCTORS</a></li>
        <li><a role="button" href="medical"><i class="icofont-nurse"></i> MEDICAL CLINIC</a></li>
        <li><a role="button" href="pharmacies"><i class="icofont-medical-sign"></i> PHARMACIES</a></li>
        <li><a role="button" href="beauty"><i class="icofont-girl-alt"></i> BEAUTY SALON</a></li>
        <li><a role="button" href="studio"><i class="icofont-camera"></i> STUDIOS</a></li>
    </ul>
    <button class="button next slick-next slick-arrow">&gt;</button>
</div>
<ul class="desktopview" style="list-style-type:none; padding-left:0">
    <li><a role="button" href="hospital"><i class="icofont-hospital"></i> HOSPITALS</a></li>
    <li><a role="button" href="doctors"><i class="icofont-doctor"></i> DOCTORS</a></li>
    <li><a role="button" href="medical"><i class="icofont-nurse"></i> MEDICAL CLINIC</a></li>
    <li><a role="button" href="pharmacies"><i class="icofont-medical-sign"></i> PHARMACIES</a></li>
    <li><a role="button" href="beauty"><i class="icofont-girl-alt"></i> BEAUTY SALON</a></li>
    <li><a role="button" href="studio"><i class="icofont-camera"></i> STUDIOS</a></li>
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
                    case 'saloon':
                        activateLink('beauty');
                        break;
                    case 'studio':
                        activateLink('studio');
                        break;
                }
            }
        }
    });
    const slider = document.querySelector('.slider');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const items = document.querySelectorAll('.slider li');

    let currentIndex = 0;
    const itemWidth = items[0].clientWidth;

    function scrollToItem(index) {
        slider.scrollTo({
            left: index * itemWidth,
            behavior: 'smooth'
        });
    }

    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % items.length;
        scrollToItem(currentIndex);
    });

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        scrollToItem(currentIndex);
    });
</script>
