var fileInputs = document.querySelectorAll(".file-upload");
var removeButtons = document.querySelectorAll(".btn-danger");

fileInputs.forEach(function (input, index) {
    input.addEventListener("change", function () {
        handleFileChange(index);
    });
});

removeButtons.forEach(function (button, index) {
    button.addEventListener("click", function () {
        removeFile(index);
    });
});

function handleFileChange(index) {
    var inputFile = fileInputs[index];
    var removeButton = removeButtons[index];

    removeButton.style.display = "inline-block";
    inputFile.disabled = true;
}

function removeFile(index) {
    var inputFile = fileInputs[index];
    var removeButton = removeButtons[index];

    removeButton.style.display = "none";

    inputFile.value = "";
    inputFile.disabled = false;
}

// Tampilan dropdown details
$(document).ready(function () {
    let NamaUnit = $("#inputNamaUnit");
    let dokumenUnit = $("#dokumen-unit");
    let dokumenPPK = $("#dokumen-ppk");
    let dokumenPBJ = $("#dokumen-pbj");

    dokumenPPK.removeClass("d-none");

    NamaUnit.on("change", function () {
        let selectedRole = NamaUnit.val();

        if (selectedRole === "Unit") {
            dokumenUnit.removeClass("d-none");
            dokumenPPK.addClass("d-none");
            dokumenPBJ.addClass("d-none");
        } else if (selectedRole === "PPK") {
            dokumenPPK.removeClass("d-none");
            dokumenPBJ.addClass("d-none");
            dokumenUnit.addClass("d-none");
        } else if (selectedRole === "PBJ") {
            dokumenPBJ.removeClass("d-none");
            dokumenUnit.addClass("d-none");
            dokumenPPK.addClass("d-none");
        }
    });

    // Trigger change on load
    NamaUnit.val("PPK").trigger("change");
});

document.querySelectorAll(".btn-upload").forEach((item) => {
    item.addEventListener("click", (event) => {
        let jenis = event.target.getAttribute("data-jenis");
        let namaDokumen = event.target.getAttribute("data-nama-dokumen");
        document.getElementById("jenisDokumen").value = jenis;
        document.querySelector("#uploadFileModal .alert-heading").textContent =
            namaDokumen;
        document.querySelector("#editFileModal .alert-heading").textContent =
            namaDokumen;
    });
});
