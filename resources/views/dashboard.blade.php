<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @role('admin')
    <p>
        <h5>Visi & Misi</h5> 
            <b>VISI</b><br>
            Mewujudkan Lulusan yang berkarakter, Kompeten dan berdaya saing global di Tahun 2024<br><br>

            <b>MISI</b><br>
            Menanamkan budaya agamis untuk membentuk karakter unggul dan berakhlak mulia<br>
            Menyediakan lingkungan yang kondusif dan menyenangkan<br>
            Meningkatkan mutu pendidik dan tenaga kependidikan<br>
            Mengembangkan kurikulum implementatif berbasis industry yang fleksibel<br>
            Menyediakan Sarana prasarana praktik yang representatif<br>
            Meningkatkan hubungan Kerjasama dengan iduka baik nasional maupun internasional<br><br><br>
    </p>
    <p>
        {{-- <h5>Tata Tertib</h5> --}}


    </p>
    @endrole
    @role('siswa')
    <p>You're logged in As a Siswa!</p>
    @endrole
</x-app-layout>
