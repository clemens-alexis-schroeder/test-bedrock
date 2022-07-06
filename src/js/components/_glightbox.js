// https://github.com/biati-digital/glightbox
import 'glightbox/dist/css/glightbox.css';
import GLightbox from 'glightbox';
const lightbox = GLightbox();


    $( document ).ready(function() {

        const searchbox = GLightbox({
            touchNavigation: false,
            touchFollowAxis: false,
            keyboardNavigation: false,
            selector: ".searchboxlink",
            zoomable: false,
            draggable: false,
            height: 'auto'
        });
        searchbox.on('open', () => {
            $('.button--close').click(function(){
            searchbox.close();
            })
        });

    });
