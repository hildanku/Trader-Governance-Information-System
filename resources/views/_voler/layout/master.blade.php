@include('_voler.layout.header')
@include('_voler.layout.navbar')

@yield('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swalShownTime = localStorage.getItem('swalShownTime');
        const oneHour = 60 * 60 * 1000; // 1 hour in milliseconds

        if (!swalShownTime || (new Date().getTime() - swalShownTime) > oneHour) {
            Swal.fire({
                icon: 'info',
                title: 'Aplikasi Sedang Dalam Pengembangan',
                text: 'Kami sedang mengembangkan aplikasi ini. Harap kembali lagi nanti!',
                footer: 'Kontak hildankutomo[at]gmail.com jika ada pertanyaan lebih lanjut',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    localStorage.setItem('swalShownTime', new Date().getTime());
                }
            });
        }
    });
</script>
@include('_voler.layout.footer')