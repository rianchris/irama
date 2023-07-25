<footer class="content-footer footer bg-label-secondary">



    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="position-fixed" style="bottom:70px; right:26px">
            @if (auth()->user()->myprofile->role == 'mitra')
                <a href="https://wa.me/62{{ $pegawai->buMitra->myprofileWarga->phone }}">
                    <i class='bx bxl-whatsapp bg-white rounded-pill text-success p-2 shadow' style="font-size:50px;"></i>
                </a>
            @elseif(auth()->user()->myprofile->role == 'warga')
                <a href="https://wa.me/62{{ $pegawai->buWarga->myprofileMitra->phone }}">
                    <i class='bx bxl-whatsapp bg-white rounded-pill text-success p-2 shadow' style="font-size:50px;"></i>
                </a>
            @endif
        </div>


        <div>
            <a href="https://bpkp.go.id" target="_blank" class="footer-link me-4 fw-semibold text-dark">
                <img src="{{ asset('assets/img/branding/logo_bpkp.png') }}" class="img-fluid" alt="" width="65px">
                Badan Pengawasan Keuangan dan Pembangunan
            </a>
        </div>
        <div class="mb-2 mb-md-0">
            <a href="https://dan.bpkp.go.id/portal" target="_blank" class="footer-link fw-semibold text-dark">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                Deputi Bidang Akuntan Negara
                <img src="{{ asset('assets/img/branding/DAN-icon.png') }}" class="ms-2 img-fluid" width="35px">
            </a>
        </div>
    </div>
</footer>
