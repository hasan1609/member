$(function(){

    $('.modalPpam').on('click', function(){
        $('#modalLabel').html('Upload Sertifikat PPAM')
        const id = $(this).data('id');
        $('.modal-body #id').val(id);
        
        $("#form").on("submit", (function(e) {
            e.preventDefault();
            $.ajax({
                url: 'sertifikat_ppam.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(msg) {
                    $('.table').html(msg);
                }
            })
        }))
    })

    $('.modalTaman').on('click', function(){
        $('#modalLabel').html('Upload Sertifikat Taman');
        
        // ambil data
        const id = $(this).data('id');
        $('.modal-body #id').val(id);
        
        $("#form").on("submit", (function(e) {
            e.preventDefault();
            $.ajax({
                url: 'sertifikat_taman.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(msg) {
                    $('.table').html(msg);
                }
            })
        }))
    })
})