<?php

$original_mem = ini_get('memory_limit');
ini_set('memory_limit', '256M');

$getarray = explode("~", base64_decode($arr_urinya[4]));

$data = array();
$data['id_event'] = $getarray[0];
$data['email'] = $sesi['email'];
$data['id_peserta'] = $getarray[1];
// eduprint($data);
// exit;


$dataposisi = array();
$dataposisi['id_event'] = base64_decode($getarray[0]);
$dataposisi['email'] = $sesi['email'];
// eduprint($data);
// exit;

$link = '';
$pathpdf = $_SERVER['DOCUMENT_ROOT'] . '/rpt/tryoutskd_' . base64_decode($data['id_event']) . '-' . $data['id_peserta'] . '-' . date('Ymdhis') . '.pdf';
$link = $inc_ . '/rpt/tryoutskd_' . base64_decode($data['id_event']) . '-' . $data['id_peserta'] . '-' . date('Ymdhis') . '.pdf';
// echo $link;
// exit;


if (file_exists($pathpdf)) {
    // echo "ok";
} else {

    $getcurl_hasil = postcurl($base_api_dinas . 'cari_nilai', $data);
    // eduprint($getcurl_hasil, 1);

    if (!$getcurl_hasil) {
        header('Location: ' . $inc_, true, 301);
        exit;
    } else {
        $datahasil = $getcurl_hasil;
    }


    $getcurl_pembahasan = postcurl($base_api_dinas . 'pembahasan', $data);
    if (!$getcurl_pembahasan) {
        header('Location: ' . $inc_, true, 301);
        exit;
    } else {
        $datapembahasan = $getcurl_pembahasan;
    }




    require_once($_SERVER['DOCUMENT_ROOT'] . '/tcpdf/tcpdf.php');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


    // Add Cover page
    $pdf->AddPage();

    $cover = '
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        }
    </style>
    <div style="text-align:left">
        <div style="text-align:right"><img src="assets/ic/edunovasi-logo.png" style="width:100px;"></div>
        <div style="font-size:25px">&nbsp;</div>
        <div style="font-size:24px;"><b>Hasil Ujian :</b></div>
        <div style="font-size:10px">&nbsp;</div>
        <table>
            <tr>
                <td style="width:15%">Nama</td>
                <td style="width:40%"><b>' . $sesi['nama'] . '</b></td>
                <td style="width:25%">Jawaban Benar</td>
                <td style="width:20%"><b>' . $datahasil['benar'] . '</b></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><b>' . $sesi['email'] . '</b></td>
                <td>Jawaban Salah</td>
                <td><b>' . $datahasil['salah'] . '</b></td>
            </tr>
            <tr>
                <td>Skor</td>
                <td><b>' . $datahasil['skor'] . '</b></td>
                <td>Tidak Terjawab</td>
                <td><b>' . $datahasil['kosong'] . '</b></td>
            </tr>
        </table>
        <div style="font-size:10px">&nbsp;</div>
        <div>Berikut kami sediakan soal serta pembahasan dari Ujian yang telah Kamu selesaikan, agar bisa jadi bahan pembelajaraan Kamu kedepan. Terimakasih telah menggunakan tryout eduNitas</div>
    </div>
    <div style="text-align:right">
        <div style="font-size:50px">&nbsp;</div>
        <div style="text-align:right"><img src="assets/img/tryout-si-edun.png" style="width:300px;"></div>
        <div style="text-align:right">Tryout by Edunovasi copyright ' . date('Y') . '</div>
    </div>';

    $pdf->writeHTML($cover, true, false, false, false, '');

    // Add Cover page

    $no = 1; // No Pembahasan
    $arrabcde = array("0" => "A", "1" => "B", "2" => "C", "3" => "D", "4" => "E", "5" => "");
    foreach ($datapembahasan as $key => $val) {
        $dom = '';
        foreach ($val as $k => $v) {
            $nom = 1; // No Soal 
            $dom .= '<tr><td colspan="3" style="font-size:14px;"><b>Pembahasan ' . $no . ' - ' . $v[0]['materi_nama'] . '</b></td></tr>';
            $dom .= '<tr><td colspan="3">&nbsp;</td></tr>';

            foreach ($v as $id => $soal) {
                $arrjawaban = ($soal['jawaban'] - 1);
                $arrjawab = ($soal['jawaban_anda'] - 1);
                if ($arrjawaban !== $arrjawab) {
                    $style = "text-danger";
                }

                $img_soal = '';
                if ($soal['img'] != '' && $soal['img'] != 'https://backend.edunovasi.com/assets/file_upload/soalonline/soal/.') {

                    $img_soal_link = str_replace("https://" . $base_backend, $_SERVER['DOCUMENT_ROOT'] . $base_backend, $soal['img']);
                    $img_soal = '<img src="' . $img_soal_link . '" style=""><br><br>';
                }
                $pertanyaan = ubahkotak(nl2br(ubahkecilgede($soal['pertanyaan'])));

                $pilihan = "";
                foreach ($soal['pilihan'] as $kp => $vp) {

                    $pilihannya = ubahkotak(ubahkecilgede($vp['name']));
                    if ($vp['type'] == 'gambar') {
                        $pilihanimg = str_replace("https://" . $base_backend, $_SERVER['DOCUMENT_ROOT'] . $base_backend, $vp['name']);
                        $pilihannya = '<img style="" src="' . $pilihanimg . '">';
                    }

                    $abcd = '';
                    if ($kp == '0') {
                        $abcd = 'A';
                    } else if ($kp == '1') {
                        $abcd = 'B';
                    } else if ($kp == '2') {
                        $abcd = 'C';
                    } else if ($kp == '3') {
                        $abcd = 'D';
                    } else if ($kp == '4') {
                        $abcd = 'E';
                    }
                    $pilihan .= $abcd . ". " . $pilihannya . "<br>";
                }


                $img_pembahasan = '';
                if ($soal['pembahasan_img'] != '') {

                    $img_pembahasan_link = str_replace("https://" . $base_backend, $_SERVER['DOCUMENT_ROOT'] . $base_backend, $soal['pembahasan_img']);
                    $img_pembahasan = '<img src="' . $img_pembahasan_link . '" style=""><br><br>';
                }
                $pembahasan = ubahkotak(nl2br(ubahkecilgede($soal['pembahasan'])));

                $jawaban = ubahkotak(ubahkecilgede($soal['pilihan'][$arrjawaban]['name']));
                if ($soal['pilihan'][$arrjawaban]['type'] == 'gambar') {
                    $jawabanimg = str_replace("https://" . $base_backend, $_SERVER['DOCUMENT_ROOT'] . $base_backend, $jawaban);
                    $jawaban = '<img style="" src="' . $jawabanimg . '">';
                }

                if ($arrjawab >= 0) {
                    $jawab = ubahkotak(ubahkecilgede($soal['pilihan'][$arrjawab]['name']));
                    if ($soal['pilihan'][$arrjawab]['type'] == 'gambar') {
                        $jawabimg = str_replace("https://" . $base_backend, $_SERVER['DOCUMENT_ROOT'] . $base_backend, $jawab);
                        $jawab = '<img style="" src="' . $jawabimg . '">';
                    }
                    $jawab = $arrabcde[$arrjawab] . ". " . $jawab;
                } else {
                    $jawab = 'Tidak terjawab';
                }

                $dom .= '
                    <tr><td width="15%"><b>No</b></td> <td width="5%" valign="top"><b>&nbsp;:&nbsp;</b></td> <td width="80%">' . $nom . '</td></tr>
                    <tr>
                        <td><b>Pertanyaan</b></td> 
                        <td valign="top"><b>&nbsp;:&nbsp;</b></td> 
                        <td>' . $img_soal . ' <br />' . $pertanyaan . ' <br />' . $pilihan . '</td>
                    </tr>
                    <tr><td><b>Jawaban Benar</b></td> <td valign="top"><b>&nbsp;:&nbsp;</b></td> <td>' . $arrabcde[$arrjawaban] . ". " . $jawaban . '</td></tr>
                    <tr><td><b>Pembahasan Soal</b></td> <td valign="top"><b>&nbsp;:&nbsp;</b></td> <td>' . $pembahasan . ' <br />' . $img_pembahasan . '</td></tr>
                    <tr><td><b>Jawaban Kamu</b></td> <td valign="top"><b>&nbsp;:&nbsp;</b></td> <td>' . $jawab . '</td></tr>
                    <tr><td colspan="3" height="20px;">&nbsp;</td></tr>
                    
                ';
                $nom++;
            }
        }
        $no++;

        $pdf->AddPage();
        $dom_print = '<table width="100%" cellpadding="0" cellspacing="0" style="font-size:10px;">' . $dom . '</table>';
        $pdf->writeHTML($dom_print, true, false, true, false, '');
    }



    // $pdf->writeHTMLCell(0, 0, '', '', $template, 0, 1, 0, true, '', true);
    // $pdf->writeHTML($dom_print, true, false, true, false, '');
    $pdf->Output($pathpdf, 'F');
}

// echo $link;
if (file_exists($pathpdf)) {

    echo "Download Berhasil";
    echo "<script>swal.fire({icon:'success',html: 'Download Berhasil'})</script>";
    echo "<script>document.location.href='" . $link . "'</script>";
} else {

    echo "File Tidak ditemukan";
    echo "<script>alert('File tidak ditemukan')</script>";
}


function edu_tag_replace($str)
{
    $str = str_replace("_ul", "<ul class='list-unstyled'>", $str);
    $str = str_replace("ul_", "</ul", $str);
    $str = str_replace("_li", "<li>", $str);
    $str = str_replace("li_", "</li>", $str);
    $str = str_replace("_b", "<b>", $str);
    $str = str_replace("b_", "</b>", $str);
    $str = str_replace("_n_", "<br>", $str);
    $str = str_replace("data:image/png;base64,", "", $str);
    $str = str_replace("data:image/jpg;base64,", "", $str);
    $str = str_replace("data:image/jpeg;base64,", "", $str);
    $str = str_replace("data:image/gif;base64,", "", $str);
    return $str;
}
