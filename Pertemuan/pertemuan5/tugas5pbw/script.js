function hitung_angka() {
    let nilai = document.getElementById("nilai").value;
    let angka = parseInt(nilai);
    if (!(isNaN(angka))) {
      if (angka > 100 || angka < 0) {
          document.getElementById("hasil").innerText = "Nilai tidak valid!";    
      } else if (angka >= 80) {
        document.getElementById("hasil").innerHTML = "A";
      } else if (angka >= 70) {
        document.getElementById("hasil").innerText = "B";
      } else if (angka >= 60) {
        document.getElementById("hasil").innerText = "C";
      } else if (angka >= 50) {
        document.getElementById("hasil").innerText = "D";
      } else {
        document.getElementById("hasil").innerText = "E";
      }
    } else {
      document.getElementById("hasil").innerText = "Nilai tidak valid!";
    }
  }