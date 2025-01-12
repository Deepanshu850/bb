document.addEventListener("turbo:load", loadNewsLetterData);

function loadNewsLetterData() {
    if ($("#sendMail").length == 1) {
        CKEDITOR.replace("send_mail");
        CKEDITOR.config.skin = "moono-lisa";
        CKEDITOR.config.width = "100%";
        CKEDITOR.config.height = 350;
    }
}
listen("click", ".delete-subscriber-btn", function (event) {
    let subscriberId = $(event.currentTarget).data("id");
    deleteItem(
        route("news-letter.destroy", subscriberId),
        Lang.get("js.news_letters")
    );
});

window.addEventListener("sendMail", function (data) {
    $("#addMailModal").modal("show");
    $("#AllMailToSend").val(data.detail);
});
window.addEventListener("sendMailClose", function (data) {
    $("#addMailModal").modal("hide");
    $("#mailSubject").val("");
    CKEDITOR.instances["sendMail"].setData("");
});

listenClick("#addMail", function () {
    let emailIds = $("#AllMailToSend").val();
    let emailIdArray = emailIds.split(",");
});

listen("submit", "#addMail", function (e) {
    e.preventDefault();
    let Mail = $("#sendMail").val();
    let mailSubject = $("#mailSubject").val();

    if (Mail == "") {
        displayErrorMessage(Lang.get("js.mail_content_required"));
        return false;
    }
    if (mailSubject == "") {
        displayErrorMessage(Lang.get("js.mail_subject_required"));
        return false;
    }

    let emailIds = $("#AllMailToSend").val();
    let emailIdArray = emailIds.split(",");
    Livewire.dispatch("sendBulkMail", [emailIdArray, Mail, mailSubject]);
});

listen("hidden.bs.modal", "#addMailModal", function () {
    resetModalForm("#addMail", "#languageValidationErrorsBox");
    CKEDITOR.instances["sendMail"].setData("");
});
