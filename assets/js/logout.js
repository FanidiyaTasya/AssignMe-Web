function confirmLogout() {
    var result = confirm("Apakah Anda yakin ingin logout?");
  
    if (result) {
      // Jika pengguna menekan OK, tambahkan logika logout di sini
      alert("Anda berhasil logout!"); // Ini hanya contoh, gantilah dengan logika logout sebenarnya
    } else {
      // Jika pengguna menekan Cancel, tidak lakukan apa-apa
      alert("Logout dibatalkan.");
    }
  }
  