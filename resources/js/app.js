require('./bootstrap');

// Basic
$("select").select2({
    theme: "bootstrap-5",
});

// Small using Select2 properties
$("#form-select-sm").select2({
    theme: "bootstrap-5",
    containerCssClass: "select2--small", // For Select2 v4.0
    selectionCssClass: "select2--small", // For Select2 v4.1
    dropdownCssClass: "select2--small",
});

// Small using Bootstrap 5 classes
$("#form-select-sm").select2({
    theme: "bootstrap-5",
    dropdownParent: $("#form-select-sm").parent(), // Required for dropdown styling
});

// Large using Select2 properties
$("select").select2({
    theme: "bootstrap-5",
    containerCssClass: "select2--large", // For Select2 v4.0
    selectionCssClass: "select2--large", // For Select2 v4.1
    dropdownCssClass: "select2--large",
});

// Large using Bootstrap 5 classes
$("#form-select-lg").select2({
    theme: "bootstrap-5",
    dropdownParent: $("#form-select-lg").parent(), // Required for dropdown styling
});