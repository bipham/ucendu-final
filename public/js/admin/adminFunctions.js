/**
 * Created by BiPham on 10/11/2017.
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('[name="_token"]').val()
    }
});

// Define variable:
var baseUrl = document.location.origin;
var mainUrl = baseUrl.substring(13);