CREATE VIEW vw_gugur AS
SELECT COUNT(status) AS Total_Gugur, prodi, tahun_akademik FROM vw_induk WHERE status='Gugur';


SELECT vw_induk.*, Total_Belum, Total_Bekerja from vw_induk LEFT JOIN vw_bekerja on vw_induk.prodi = vw_bekerja.prodi LEFT JOIN vw_belum on vw_induk.prodi = vw_belum.prodi GROUP BY vw_induk.prodi, vw_induk.tahun_akademik;

SELECT vw_induk.prodi, vw_induk.tahun_akademik, 
Total_Belum, Total_Bekerja, Total_Berwirausaha, Total_Bermasalah, Total_Gugur
from vw_induk 
LEFT JOIN vw_bekerja on vw_induk.prodi = vw_bekerja.prodi
LEFT JOIN vw_belum on vw_induk.prodi = vw_belum.prodi 
LEFT JOIN vw_berwirausaha on vw_induk.prodi = vw_berwirausaha.prodi
LEFT JOIN vw_bermasalah on vw_induk.prodi = vw_bermasalah.prodi 
LEFT JOIN vw_gugur on vw_induk.prodi = vw_gugur.prodi
GROUP BY vw_induk.prodi, vw_induk.tahun_akademik;

SELECT vw_induk.prodi, vw_induk.tahun_akademik, 
Total_Belum, Total_Bekerja, Total_Berwirausaha, Total_Bermasalah, Total_Gugur, Total_Cnp, Total_Sendiri
from vw_induk 
LEFT JOIN vw_bekerja on vw_induk.prodi = vw_bekerja.prodi
LEFT JOIN vw_belum on vw_induk.prodi = vw_belum.prodi 
LEFT JOIN vw_berwirausaha on vw_induk.prodi = vw_berwirausaha.prodi
LEFT JOIN vw_bermasalah on vw_induk.prodi = vw_bermasalah.prodi 
LEFT JOIN vw_gugur on vw_induk.prodi = vw_gugur.prodi
LEFT JOIN vw_cnp on vw_induk.prodi = vw_cnp.prodi 
LEFT JOIN vw_sendiri on vw_induk.prodi = vw_sendiri.prodi
GROUP BY vw_induk.prodi, vw_induk.tahun_akademik;

SELECT vw_induk.prodi, vw_induk.tahun_akademik, 
belum, kerja, usaha, bermasalah, gugur, cnp, sendiri
from vw_induk 
LEFT JOIN vw_krj on vw_induk.prodi = vw_krj.prodi
LEFT JOIN vw_blm on vw_induk.prodi = vw_blm.prodi 
LEFT JOIN vw_usaha on vw_induk.prodi = vw_usaha.prodi
LEFT JOIN vw_bermasalah on vw_induk.prodi = vw_bermasalah.prodi 
LEFT JOIN vw_gugur on vw_induk.prodi = vw_gugur.prodi
LEFT JOIN vw_cnp on vw_induk.prodi = vw_cnp.prodi 
LEFT JOIN vw_sendiri on vw_induk.prodi = vw_sendiri.prodi
GROUP BY vw_induk.prodi, vw_induk.tahun_akademik;

SELECT vw_induk.prodi, vw_induk.tahun_akademik, 
belum, kerja, usaha, bermasalah, gugur, cnp, sendiri, jumlah
from vw_induk 
LEFT JOIN vw_krj on vw_induk.prodi = vw_krj.prodi AND vw_krj.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_blm on vw_induk.prodi = vw_blm.prodi AND vw_blm.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_usaha on vw_induk.prodi = vw_usaha.prodi AND vw_usaha.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_bermasalah on vw_induk.prodi = vw_bermasalah.prodi AND vw_bermasalah.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_gugur on vw_induk.prodi = vw_gugur.prodi AND vw_gugur.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_cnp on vw_induk.prodi = vw_cnp.prodi AND vw_cnp.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_sendiri on vw_induk.prodi = vw_sendiri.prodi AND vw_sendiri.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_jml on vw_induk.prodi = vw_jml.prodi AND vw_jml.tahun_akademik = vw_induk.tahun_akademik
GROUP BY vw_induk.prodi, vw_induk.tahun_akademik;

SELECT vw_induk.prodi, vw_induk.tahun_akademik, 
belum, kerja, usaha, bermasalah, gugur, cnp, sendiri, jumlah
from vw_induk 
LEFT JOIN vw_krj on vw_induk.prodi = vw_krj.prodi AND vw_krj.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_blm on vw_induk.prodi = vw_blm.prodi AND vw_blm.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_usaha on vw_induk.prodi = vw_usaha.prodi AND vw_usaha.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_bermasalah on vw_induk.prodi = vw_bermasalah.prodi AND vw_bermasalah.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_gugur on vw_induk.prodi = vw_gugur.prodi AND vw_gugur.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_cnp on vw_induk.prodi = vw_cnp.prodi AND vw_cnp.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_sendiri on vw_induk.prodi = vw_sendiri.prodi AND vw_sendiri.tahun_akademik = vw_induk.tahun_akademik
LEFT JOIN vw_jml on vw_induk.prodi = vw_jml.prodi AND vw_jml.tahun_akademik = vw_induk.tahun_akademik
GROUP BY vw_induk.prodi, vw_induk.tahun_akademik;

SELECT vw_induk.prodi, vw_induk.tahun_akademik, COUNT(ket) from vw_induk WHERE ket = 'Sendiri' GROUP BY vw_induk.prodi, vw_induk.tahun_akademik;

SELECT prodi, tahun_akademik, COUNT(status) AS Total_Belum from vw_induk WHERE status = 'Belum' GROUP BY prodi,tahun_akademik;

CREATE VIEW vw_belum AS
SELECT prodi, tahun_akademik, COUNT(status) AS belum from mahasiswa WHERE status = 'Belum' GROUP BY prodi,tahun_akademik;

SELECT vw_induk.prodi, vw_induk.tahun_akademik, belum, kerja, jumlah from vw_induk LEFT JOIN vw_blm on vw_induk.prodi = vw_blm.prodi LEFT JOIN vw_krj on vw_induk.prodi = vw_krj.prodi LEFT JOIN vw_jml on vw_induk.prodi = vw_jml.prodi GROUP BY vw_induk.prodi, vw_induk.tahun_akademik;

SELECT vw_induk.prodi, vw_induk.tahun_akademik, belum, kerja, usaha, bermasalah, gugur from vw_induk LEFT JOIN vw_blm on vw_induk.prodi = vw_blm.prodi LEFT JOIN vw_krj on vw_induk.prodi = vw_krj.prodi LEFT JOIN vw_usaha on vw_induk.prodi = vw_usaha.prodi LEFT JOIN vw_bermasalah on vw_induk.prodi = vw_bermasalah.prodi LEFT JOIN vw_gugur on vw_induk.prodi = vw_gugur.prodi GROUP BY vw_induk.prodi, vw_induk.tahun_akademik;

SELECT prodi, tahun_akademik, COUNT(status) AS kerja from vw_induk WHERE status = 'Bekerja' GROUP BY prodi,tahun_akademik;