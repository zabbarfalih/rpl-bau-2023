// Fungsi untuk mengecek validasi ketika formulir disubmit
$("form").submit(function (event) {
    // Mengambil nilai input NIP dan Password
    var nipValue = $("#inputNip").val();
    var passwordValue = $("#inputPassword").val();

    // Reset pesan kesalahan sebelumnya
    $(".invalid-feedback").empty();

    // Cek validasi NIP
    if (nipValue.trim() === "") {
        $("#inputNip").addClass("is-invalid");
        $("#input-login-nip").addClass("is-invalid");
        $("#nip-error").text("NIP harus diisi.");
        event.preventDefault(); // Mencegah formulir untuk disubmit
    } else {
        $("#inputNip").removeClass("is-invalid");
        $("#input-login-nip").removeClass("is-invalid");
    }

    // Cek validasi Password
    if (passwordValue.trim() === "") {
        $("#inputPassword").addClass("is-invalid");
        $("#input-login-password").addClass("is-invalid");
        $("#password-error").text("Password harus diisi.");
        event.preventDefault();
    } else {
        $("#inputPassword").removeClass("is-invalid");
        $("#input-login-password").removeClass("is-invalid");
    }
});

// Toggle Password Start
$(".togglePassword").click(function (e) {
    e.preventDefault();
    var icon = $(this).find("svg");
    var type = $(this).parent().parent().find("#inputPassword").attr("type");
    console.log(type);

    if (type == "password") {
        icon.remove(); // Remove the existing SVG icon
        $(this).append('<i class="fas fa-eye-slash"></i>'); // Add the new eye-slash icon
        $(this).parent().parent().find("#inputPassword").attr("type", "text");
    } else if (type == "text") {
        icon.remove(); // Remove the existing SVG icon
        $(this).append('<i class="fas fa-eye"></i>'); // Add the new eye icon
        $(this)
            .parent()
            .parent()
            .find("#inputPassword")
            .attr("type", "password");
    }
});
// Toggle Password End
