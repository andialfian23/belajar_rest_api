//OBJEK ke JSON
// let mahasiswa = {
//     nama: "Andi Alfian",
//     npm: "181410001",
//     email:"andialfi90@gmail.com"
// }
// console.log(JSON.stringify(mahasiswa));

//JSON ke OBJEK
let xhr = new XMLHttpRequest();
xhr.onreadystatechange = function (){
    if(xhr.readyState == 4 && xhr.status==200){
        let mahasiswa = JSON.parse(this.responseText);
        console.log(mahasiswa);
    }
}
xhr.open('GET','coba.json',true);
xhr.send();

//MENGGUNAKAN AJAX
// $.getJSON('coba.json',function(data)){
//     console.log(data);
// }