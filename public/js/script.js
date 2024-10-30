
//  dropdown navbar
    // Ambil elemen tombol dropdown dan menu dropdown

    //nav-dekstop
    const button = document.getElementById('dropdownButton'); //akun GURU
    const buttonMaster = document.getElementById('dropdownButtonMaster'); //master DATA

    const menu = document.getElementById('dropdownMenu'); //menu akun GURU
    const menuMaster = document.getElementById('dropdownMenuMaster'); //menu master DATA

      // Tambahkan event listener untuk klik pada tombol dropdown
    button.addEventListener('click', function() {
        // Toggle class 'hidden' pada menu dropdown untuk menampilkannya atau menyembunyikannya
        menu.classList.toggle('hidden');
    });
    buttonMaster.addEventListener('click', function() {
        // Toggle class 'hidden' pada menu dropdown untuk menampilkannya atau menyembunyikannya
        menuMaster.classList.toggle('hidden');
    });


    //nav-mobile
    const buttonM = document.getElementById('dropdownButton-M');  //akun GURU Mobile
    const buttonMasterM = document.getElementById('dropdownButtonMaster-M'); //master DATA Mobile

    const menuM = document.getElementById('dropdownMenu-M');  //menu akun GURU Mobile
    const menuMasterM = document.getElementById('dropdownMenuMaster-M'); //menu master DATA Mobile

        // Tambahkan event listener untuk klik pada tombol dropdown
    buttonM.addEventListener('click', function() {
        // Toggle class 'hidden' pada menu dropdown untuk menampilkannya atau menyembunyikannya
        menuM.classList.toggle('hidden');
    });

    buttonMasterM.addEventListener('click', function() {
        // Toggle class 'hidden' pada menu dropdown untuk menampilkannya atau menyembunyikannya
        menuMasterM.classList.toggle('hidden');
    });






 // menu mobile
 let navButton = document.getElementById('nav-btn');
 let navButtonM = document.getElementById('nav-btn-m');
 
 let tutup = document.getElementById('tutup');
 navButton.addEventListener('click',function(){
     navButtonM.classList.toggle('translate-x-0');
 });
 
 
 tutup.addEventListener('click',function(){
    navButtonM.classList.remove('translate-x-0');
     
 });

 
         //  dropdown header
 // Ambil elemen tombol dropdown dan menu dropdown
 const button2 = document.getElementById('dropdownButton2');
 const menu2 = document.getElementById('dropdownMenu2');
 
  // Tambahkan event listener untuk klik pada tombol dropdown
 button2.addEventListener('click', function() {
      // Toggle class 'hidden' pada menu dropdown untuk menampilkannya atau menyembunyikannya
     menu2.classList.toggle('hidden');
 });