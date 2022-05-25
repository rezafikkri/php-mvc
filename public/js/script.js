const listMahasiswaElement = document.querySelector('#list-mahasiswa');
listMahasiswaElement.addEventListener('click', async (e) => {
  const targetElement = e.target;

  if (targetElement.getAttribute('id') == 'ubah') {
    document.querySelector('#modal-mahasiswa-label').innerText = 'Ubah Data Mahasiswa';
    document.querySelector('.modal-body form').setAttribute('action', 'http://localhost/belajar/php-mvc/public/mahasiswa/ubah');

    const id = targetElement.dataset.id;
    try {
      const response = await fetch(`http://localhost/belajar/php-mvc/public/mahasiswa/get-one/${id}`);
      const responseJson = await response.json();

      document.querySelector('#nama').value = responseJson.mahasiswa.nama;
      document.querySelector('#email').value = responseJson.mahasiswa.email;
      document.querySelector('#jurusan').value = responseJson.mahasiswa.jurusan;
      
      const idElement = document.querySelector('#id');
      if (idElement) {
        idElement.value = responseJson.mahasiswa.id;
      } else {
        const idElementNew = document.createElement('input');
        idElementNew.setAttribute('type', 'hidden');
        idElementNew.setAttribute('id', 'id');
        idElementNew.setAttribute('name', 'id');
        idElementNew.value = responseJson.mahasiswa.id;
        document.querySelector('.modal-body form').appendChild(idElementNew);
      }
    } catch (error) {
      console.log(error);
    }
  }
});

document.querySelector('#tambah-mahasiswa').addEventListener('click', () => {
  document.querySelector('#modal-mahasiswa-label').innerText = 'Tambah Data Mahasiswa';
  document.querySelector('.modal-body form').setAttribute('action', 'http://localhost/belajar/php-mvc/public/mahasiswa/tambah');
  document.querySelector('.modal-body form').reset();
      
  const idElement = document.querySelector('#id');
  if (idElement) idElement.remove();
});
