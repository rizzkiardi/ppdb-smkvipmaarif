<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Bukti Pendaftaran - {{ $calonsiswa->nama }}</title>
    <style>
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: Inter, Arial, Helvetica, sans-serif;
      }

      body {
        font-size: 14px;
        position: relative;
      }

      .header {
        padding-top: 25px;
        padding-left: 50px;
        padding-right: 50px;
      }

      .header .garis {
        margin-top: 10px;
      }

      .table-header {
        width: 80%;
        border: none;
        margin: 0 auto;
        /* border-bottom: 10px solid rgb(19, 158, 7); */
      }

      .garis {
        width: 100%;
        height: 7px;
        background-color: green;
      }

      .nama-smk {
        margin: 0 auto;
        text-align: center;
      }

      main {
        padding-top: 50px;
        padding-left: 50px;
        padding-right: 50px;
      }

      main .bukti {
        margin-bottom: 50px;
      }

      .table {
        width: 80%;
        border-collapse: collapse;
        margin: 0 auto;
      }

      .table th,
      .table td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
      }

      main .panitia {
        margin-top: 50px;
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;
      }

      footer {
        position: absolute;
        left: 50px;
        bottom: 20px;
      }

      footer p {
        font-size: 10px;
      }

      /* CSS untuk logo transparan di tengah */
      .logo-tengah {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -1;
        opacity: 0.1; /* Transparansi */
      }

      .logo-tengah img {
        height: auto;
      }
    </style>
  </head>
  <body>
    <!-- Logo transparan di tengah -->
    {{-- <div class="logo-tengah">
      <img
        src="{{ $logo }}"
        alt="Logo SMK VIP Maarif NU 1 Kemiri"
        width="400px"
      />
    </div> --}}

    <div class="header">
      <table class="table-header">
        <tbody>
          <tr>
            <td>
              <img
                src="{{ $logo }}"
                width="90px"
                alt="Logo SMK VIP Maarif NU 1 Kemiri"
              />
            </td>
            <td>
              <div class="nama-smk">
                <h2>SMK VIP MAARIF NU 1 KEMIRI</h2>
                <p>Jl. Kemiri-Pituruh Km 1. Kemiri, Purworejo</p>
                <p>smkvipkemiri@gmail.com | 0275-649300</p>
                <p>www.smkvipkemiri.sch.id</p>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- <hr class="garis" /> -->
      <div class="garis"></div>
    </div>

    <main>
      <div>
        <p class="bukti">
          Bukti Pendaftaran Calon Peserta Didik Baru TA 2024/2025
        </p>
        <table class="table">
          <tbody>
            <tr>
              <td>Pas Foto</td>
              <td><img src="{{ $foto }}" alt="" width="100px" /></td>
            </tr>
            <tr>
              <td>ID Pendaftaran</td>
              <td>{{ $calonsiswa->id_pendaftaran }}</td>
            </tr>
            <tr>
              <td>Waktu Mendaftar</td>
              <td>
                {{
                Carbon\Carbon::parse($calonsiswa->created_at)->translatedFormat('l,
                d F Y - H:i:s')}}
              </td>
            </tr>
            <tr>
              <td>NISN</td>
              <td>{{ $calonsiswa->nisn }}</td>
            </tr>
            <tr>
              <td>Nama Lengkap</td>
              <td>{{ $calonsiswa->nama }}</td>
            </tr>
            <tr>
              <td>Tempat, Tanggal Lahir</td>
              <td>
                {{ $calonsiswa->tempat_lahir }}, {{
                Carbon\Carbon::parse($calonsiswa->tgl_lahir)->translatedFormat('d
                F Y')}}
              </td>
            </tr>
            <tr>
              <td>Agama</td>
              <td>{{ $calonsiswa->agama }}</td>
            </tr>
            <tr>
              <td>Kartu PIP</td>
              <td>{{ $calonsiswa->kartu_pip }}</td>
            </tr>
            <tr>
              <td>Jurusan</td>
              <td>{{ $calonsiswa->jurusan }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="panitia">
        <div>
          <p>Panitia PPDB SMK VIP Maarif NU 1 Kemiri</p>
          <div>
            <img src="{{ $ttd }}" alt="" width="100px">
          </div>
          <p>Sigit Rudianto S.Pd</p>
        </div>
      </div>
    </main>

    <footer>
      <p>Dicetak oleh {{ $user->name }}. {{ $date }}</p>
    </footer>
  </body>
</html>
