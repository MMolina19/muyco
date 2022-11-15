$(document).ready(function() {
    $('button#arrowed-btn-toggle').click(function(){
        $(this).find('i').toggleClass('bi-arrow-right-square-fill').toggleClass('bi-arrow-left-square-fill');
    });
});
