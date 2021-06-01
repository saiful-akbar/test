$(document).ready(function () {
    // Tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Popovers
    $('[data-toggle="popover"]').popover();

    // Ladda Bind normal buttons
    Ladda.bind(".ladda-button", { timeout: 2000 });

    // Ladda Bind progress buttons and simulate loading progress
    Ladda.bind(".ladda-progress", {
        callback: function (instance) {
            var progress = 0;
            var interval = setInterval(function () {
                progress = Math.min(progress + Math.random() * 0.1, 1);
                instance.setProgress(progress);

                if (progress === 1) {
                    instance.stop();
                    clearInterval(interval);
                }
            }, 200);
        },
    });

    // Select2
    $(".select2").each(function () {
        $(this)
            .wrap('<div class="position-relative"></div>')
            .select2({
                placeholder: "Select...",
                dropdownParent: $(this).parent(),
            });
    });
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
        positionClass: "toast-bottom-right",
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
    // Pemasangan jam
    window.setTimeout("time()", 1000);
})();
