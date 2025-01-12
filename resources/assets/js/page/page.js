document.addEventListener("turbo:load", loadPageData);

function loadPageData() {
    let pageTableName = $("#pageTable");
    $("#pageLanguageId").select2({
        language: {
            noResults: function (params) {
                return Lang.get("js.no_results_found");
            },
        },
        width: "100%",
    });
    if ($(".visibility").length) {
    }
}

listen("click", ".delete-page-btn", function (event) {
    let deletePagetId = $(event.currentTarget).data("id");
    deleteItem(route("pages.destroy", deletePagetId), Lang.get("js.page"));
});

listen("change", ".visibility", function (event) {
    let visibilityID = $(event.currentTarget).data("id");
    updateVisibility(visibilityID);
});

window.updateVisibility = function (id) {
    $.ajax({
        url: route("page.visibility"),
        method: "POST",
        data: { data: id },
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                Livewire.dispatch("refresh");
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
            Livewire.dispatch("refresh");
        },
    });
};
