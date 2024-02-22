<?php

const MAPEL = ['indonesia', 'jepang', 'inggris'];
class Nilai
{

    public function __construct(
        private string $mapel,
        private int $nilai
    ) {
        if (!in_array($mapel, MAPEL)) {
            throw new Exception('Invalid value on mapel');
        }
        if ($nilai < 0 || $nilai > 100) {
            throw new Exception('Invalid value on nilai');
        }
    }
}


class Siswa
{
    /**
     *
     * @param integer $nrp
     * @param string $nama
     * @param Nilai[] $daftarNilai
     */
    public function __construct(
        private int $nrp,
        private string $nama,
        private array $daftarNilai
    ) {
        if (count($daftarNilai) > 3) {
            throw new Exception('Daftar nilai tidak boleh lebih dari 3');
        }
    }
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

echo 'Tugas 1: Buat siswa dengan nilai 100 di mapel inggris' . PHP_EOL;

$nilai = new Nilai('inggris', 100);

$siswa = new Siswa(0, 'Ando', [$nilai]);

print_r($siswa);

echo 'Tugas 2: Mencoba validasi' . PHP_EOL;
//Line 61-65 di comment untuk mencoba tugas 3
$nilai = new Nilai('inggris', 100);

$siswa = new Siswa(0, 'Ando', [$nilai, $nilai, $nilai, $nilai]);

print_r($siswa);

echo 'Tugas 3: Random 10 Siswa'.PHP_EOL;
$banyak_siswa = [];
for ($i = 0; $i < 10; $i++) {
    $nama = generateRandomString(10);
    $generate_nilai = rand(1, 3);
    $banyak_nilai = [];
    for ($f = 0; $f < $generate_nilai; $f++) {
        $mapel = MAPEL[rand(0, count(MAPEL) - 1)];
        $nilai_atr = rand(0, 100);
        $banyak_nilai[] = new Nilai($mapel, $nilai_atr);
    }
    // print_r($banyak_nilai);
    $banyak_siswa[] = new Siswa($i + 1, $nama, $banyak_nilai);
}

print_r($banyak_siswa);