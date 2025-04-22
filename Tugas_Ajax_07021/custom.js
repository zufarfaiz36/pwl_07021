$(document).ready(function () {
    $('#search').on('keyup', function () {
        let keyword = $(this).val();

        if (keyword.length > 2) {
            $('#spinner').show(); // tampilkan spinner
            $.ajax({
                url: 'search.php',
                type: 'POST',
                data: { keyword: keyword },
                success: function (data) {
                    $('#spinner').hide(); // sembunyikan spinner
                    $('#result').html(data).fadeIn(); // tampilkan hasil
                },
                error: function (xhr, status, error) {
                    $('#spinner').hide();
                    $('#result').html('<p class="text-danger">Terjadi kesalahan: ' + error + '</p>');
                }
            });
        } else {
            $('#result').fadeOut(); // sembunyikan hasil kalau kosong
        }
    });
});
