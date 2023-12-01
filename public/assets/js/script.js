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
let NamaUnit = document.getElementById("inputNamaUnit");

let dokumenUnit = document.getElementById("dokumen-unit");
let dokumenPPK = document.getElementById("dokumen-ppk");
let dokumenPBJ = document.getElementById("dokumen-pbj");

dokumenPPK.classList.remove("d-none");
NamaUnit.addEventListener("change", function () {
    let selectedRole = NamaUnit.value;

    if (selectedRole === "Unit") {
        dokumenUnit.classList.remove("d-none");
        dokumenPPK.classList.add("d-none");
        dokumenPBJ.classList.add("d-none");
    } else if (selectedRole === "PPK") {
        dokumenPPK.classList.remove("d-none");
        dokumenPBJ.classList.add("d-none");
        dokumenUnit.classList.add("d-none");
    } else if (selectedRole === "PBJ") {
        dokumenPBJ.classList.remove("d-none");
        dokumenUnit.classList.add("d-none");
        dokumenPPK.classList.add("d-none");
    }
});
