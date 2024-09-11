<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Siswa XII MIPA 1</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            font-weight: 600;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            padding: 10px;
            text-align: left;
        }
        td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: 600;
        }
        .lulus {
            color: green;
            font-weight: 600 ;
        }
        .tidak-lulus {
            color: red;
            font-weight: 600 ;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Nilai Siswa XII MPA 1</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nilai Rata-Rata</th>
                    <th>Status</th>
                    <th>Mata Pelajaran Yang Harus Diperbaiki</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Data siswa
                $siswa = [
                    ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
                    ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
                    ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
                    ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
                    ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
                ];

                $lulus_count = 0;
                $tidak_lulus_count = 0;

                // Fungsi untuk menghitung rata-rata
                function hitungRataRata($nilai) {
                    return array_sum($nilai) / count($nilai);
                }

                // Fungsi untuk mencari mata pelajaran dengan nilai terendah
                function mataPelajaranTerendah($siswa) {
                    $nilai_matapelajaran = [
                        'Matematika' => $siswa['matematika'],
                        'Bahasa Inggris' => $siswa['bahasa_inggris'],
                        'IPA' => $siswa['ipa']
                    ];
                    // Mencari mata pelajaran dengan nilai terendah untuk diperbaiki
                    asort($nilai_matapelajaran);
                    return array_keys($nilai_matapelajaran)[0];
                }

                // Memproses data siswa
                foreach ($siswa as $data) {
                    $nilai = [$data['matematika'], $data['bahasa_inggris'], $data['ipa']];
                    $rata_rata = hitungRataRata($nilai);

                    // Menentukan kelulusan
                    if ($rata_rata >= 75) {
                        $status = "<span class='lulus'>Lulus</span>";
                        $lulus_count++;
                        $matapelajaran_terendah = "-";
                    } else {
                        $status = "<span class='tidak-lulus'>Tidak Lulus</span>";
                        $tidak_lulus_count++;
                        $matapelajaran_terendah = mataPelajaranTerendah($data);
                    }

                    // Menampilkan hasil dalam tabel
                    echo "<tr>";
                    echo "<td>{$data['nama']}</td>";
                    echo "<td>" . number_format($rata_rata, 2) . "</td>";
                    echo "<td>{$status}</td>";
                    echo "<td>{$matapelajaran_terendah}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <p><strong>Jumlah siswa yang lulus:</strong> <?php echo $lulus_count; ?></p>
        <p><strong>Jumlah siswa yang tidak lulus:</strong> <?php echo $tidak_lulus_count; ?></p>
    </div>
</body>
</html>
