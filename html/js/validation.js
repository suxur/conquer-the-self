$(function() {
    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
        autoAdd: {helpBlocks: false}
    });
});