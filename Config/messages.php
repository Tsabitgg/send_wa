<?php
function getKelasOptions($conn) {
    $sqlKelas = "SELECT * FROM mst_kelas";
    $resultKelas = $conn->query($sqlKelas);

    $kelasOptions = "";
    if ($resultKelas->num_rows > 0) {
        while($row = $resultKelas->fetch_assoc()) {
            $selected = (isset($_POST['kelas']) && $_POST['kelas'] == $row['id']) ? 'selected' : '';
            $kelasOptions .= "<option value='" . $row['id'] . "' $selected>" . $row['kelas'] . "</option>";
        }
    }
    return $kelasOptions;
}

function getSiswaOptions($conn, $kelasId) {
    $siswaOptions = "";
    $sqlSiswa = "SELECT * FROM mst_siswas WHERE id_kelas = ?";
    $stmt = $conn->prepare($sqlSiswa);
    $stmt->bind_param("i", $kelasId);
    $stmt->execute();
    $resultSiswa = $stmt->get_result();

    if ($resultSiswa->num_rows > 0) {
        while($row = $resultSiswa->fetch_assoc()) {
            $siswaOptions .= "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
        }
    }
    return $siswaOptions;
}

function getAngkatanOptions($conn) {
    $sqlAngkatan = "SELECT DISTINCT angkatan FROM mst_siswas";
    $resultAngkatan = $conn->query($sqlAngkatan);

    $angkatanOptions = "";
    if ($resultAngkatan->num_rows > 0) {
        while($row = $resultAngkatan->fetch_assoc()) {
            $selected = (isset($_POST['angkatan']) && $_POST['angkatan'] == $row['angkatan']) ? 'selected' : '';
            $angkatanOptions .= "<option value='" . $row['angkatan'] . "' $selected>" . $row['angkatan'] . "</option>";
        }
    }
    return $angkatanOptions;
}
?>
