$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip(); // Tooltips
    $('[data-toggle="popover"]').popover(); // Popovers

    // Select2
    $(".select2").each(function () {
        $(this)
            .wrap('<div class="position-relative"></div>')
            .select2({
                placeholder: "Select...",
                dropdownParent: $(this).parent(),
            });
    });

    // Hide loading
    $("#preloader").fadeOut();
});

/**
 * Fungsi url
 * @param {String} path
 */
function url(path = "/") {
    let baseUrl = document.querySelector("meta[name=base-url]").content;
    let url = baseUrl + path.trim().toLocaleLowerCase();

    if (path.substring(0, 1) !== "/") {
        url = baseUrl + "/" + path.trim().toLocaleLowerCase();
    }

    return url;
}

/**
 * Fungsi show toastr
 * @param {String} type
 * @param {String} title
 * @param {String} message
 */
function toast(type = "Success", message = null) {
    toastr[type.trim().toLowerCase()](message.trim(), type.trim(), {
        positionClass: "toast-top-right",
        closeButton: true,
        progressBar: true,
        timeOut: 10000,
        closeDuration: 300,
        showDuration: 300,
    });
}

/**
 * Fungsi jam digital
 */
function time() {
    setTimeout("time()", 1000);
    document.getElementById("time").innerHTML = new Date().toLocaleString();
}

(function () {
    window.setTimeout("time()", 1000); // Pemasangan jam
})();
