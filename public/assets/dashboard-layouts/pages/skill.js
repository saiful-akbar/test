/*
 * inisilisasi datatable
 */
const dataTable = $("#table-skill").DataTable({
    processing: true,
    serverSide: true,
    scrollX: true,
    lengthChange: false,
    pageLength: 10,
    ajax: url("api/app/skill"),
    language: {
        info: "_START_-_END_ of _TOTAL_",
    },
    columns: [
        {
            data: "skill_name",
            title: "Skill",
        },
        {
            data: "skill_publish",
            title: "Publish",
            className: "text-center",
            orderable: false,
            searchable: false,
            render: function (data, type, row, meta) {
                return `
                    <i class="font-weight-bold feather ${
                        data == 1
                            ? "icon-check-circle text-success"
                            : "icon-x-circle text-danger"
                    }"></i>
                `;
            },
        },
        {
            data: "created_at",
            title: "Created",
        },
        {
            data: "updated_at",
            title: "Updated",
        },
        {
            data: "action",
            title: "Action",
            className: "text-center",
            orderable: false,
            searchable: false,
        },
    ],
});

/**
 * Handle open modal form
 *
 * @param {String} type
 * @param {integer} id
 */
function handleOpenModalForm(type = "Add", id = null) {
    const modal = $("#modal-form");
    const title = $("#modal-form .modal-title");
    const form = $("#modal-form form");
    const btnSubmit = $("#modal-form button[type=submit]");

    // set atribute form nama dan ction
    form.attr("name", type.trim().toLowerCase());
    form.attr(
        "action",
        url(
            type.trim().toLowerCase() == "add"
                ? "api/app/skill"
                : `api/app/skill/${id}`
        )
    );

    // set title
    title.text(
        type.trim().toLowerCase() == "add" ? "Add new skill" : "Edit skill"
    );

    // set title button submit
    btnSubmit.html(
        `<i class="feather ${
            type.trim().toLowerCase() == "add"
                ? "icon-plus-circle"
                : "icon-edit-1"
        }"></i> ${type.trim().toLowerCase() == "add" ? "Add" : "Update"}`
    );

    if (type.trim().toLowerCase() == "add") {
        modal.modal({ show: true, backdrop: "static" }); // open modal
    } else {
        $.ajax({
            type: "get",
            url: url(`api/app/skill/${id}/edit`),
            dataType: "json",
            success: function (res) {
                const { skill_name, skill_publish } = res.data; // ambil hasil request

                modal.modal({ show: true, backdrop: "static" }); // open modal

                // set value pada form
                $("#skill_name").val(skill_name);
                $("#publish").attr(
                    "checked",
                    skill_publish == 1 ? true : false
                );
            },
            error: function (err) {
                toast("Error", `${err.status} : ${err.responseJSON.message}`);
            },
        });
    }
}

/**
 * Handle close modal form
 */
function handleCloseModalForm() {
    $("#modal-form form")[0].reset(); // reset form
    $("#publish").attr("checked", true); // set publish menjadi true
    $("#modal-form").modal("hide"); // close modal
    $("#modal-form .is-invalid").removeClass("is-invalid"); // remove invalid class
}

/**
 * disabled || readonly form
 *
 * @param {Boolean} value
 */
function isDissableForm(value = false) {
    const button = $("#modal-form button");
    const input = $("#modal-form form :input");
    const spinner = $("#modal-form .spinner-border");

    button.attr("disabled", value);
    input.attr("readonly", value);
    value ? spinner.show() : spinner.hide();
}

/**
 * Handle submit form pada modal
 */
$("#modal-form form").submit(function (e) {
    e.preventDefault();
    isDissableForm(true);

    const { name, action } = e.target;

    $.ajax({
        type: name == "add" ? "post" : "patch",
        url: action,
        data: $(this).serialize(),
        dataType: "json",
        success: function (res) {
            isDissableForm(false);
            handleCloseModalForm();
            toast("Success", res.message);
            dataTable.ajax.reload();
        },
        error: function (err) {
            isDissableForm(false);

            const { errors, message } = err.responseJSON;

            if (err.status == 422) {
                Object.keys(errors).find((key) => {
                    $(`#${key}`).addClass("is-invalid");
                    $(`small[data-error=${key}]`).text(errors[key].join(" "));
                });
            } else {
                handleCloseModalForm();
                bootbox.alert({
                    title: `Error : ${err.status}`,
                    message: message,
                });
            }
        },
    });
});

/**
 * Delete data skill
 *
 * @param {Integer} id
 */
function destroy(id) {
    bootbox.confirm({
        title: "Delete",
        message: "Are you sure you want to permanently delete this data?",
        buttons: {
            confirm: {
                label: "Delete",
                className: "btn-danger btn-round",
            },
            cancel: {
                label: "Cancel",
                className: "btn-outline-secondary btn-round",
            },
        },
        callback: (result) => {
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: url(`api/app/skill/${id}`),
                    dataType: "json",
                    data: {
                        _token: $("meta[name=csrf-token]").attr("content"),
                    },
                    success: function (res) {
                        toast("Success", res.message);
                        dataTable.ajax.reload();
                    },
                    error: function (err) {
                        bootbox.alert({
                            title: `Error: ${err.status}`,
                            message: err.responseJSON.message,
                        });
                    },
                });
            }
        },
    });
}
