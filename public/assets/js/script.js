var fileInputs = document.querySelectorAll('.file-upload');
var removeButtons = document.querySelectorAll('.btn-danger');

// Tambahkan event listener untuk setiap elemen file input
fileInputs.forEach(function(input, index) {
    input.addEventListener('change', function() {
        handleFileChange(index);
    });
});

// Tambahkan event listener untuk setiap tombol "Remove"
removeButtons.forEach(function(button, index) {
    button.addEventListener('click', function() {
        removeFile(index);
    });
});

function handleFileChange(index) {
    var inputFile = fileInputs[index];
    var removeButton = removeButtons[index];

    // Tampilkan tombol "Remove" dan sembunyikan tombol download template
    removeButton.style.display = 'inline-block';
    // Anda dapat menambahkan logika untuk tombol download template jika diperlukan

    // Disable input file setelah file dipilih (opsional)
    inputFile.disabled = true;
}

function removeFile(index) {
    var inputFile = fileInputs[index];
    var removeButton = removeButtons[index];

    // Sembunyikan tombol "Remove" dan tampilkan kembali tombol download template
    removeButton.style.display = 'none';
    // Anda dapat menambahkan logika untuk tombol download template jika diperlukan

    // Reset nilai input file dan aktifkan kembali
    inputFile.value = '';
    inputFile.disabled = false;
}
