<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
    </x-slot>

    <section class="section draft-pengajuan bg-white">
        <div class="container">
            <div class="row">
              <div class="col-12">
                <h1 class="my-3 text-center">Daftar Pengajuan</h1>
                <a th:href="@{/mahasiswa/add}" class="d-flex justify-content-center mb-3">
                    <button class="btn btn-primary mb-3">
                        Tambah Pengajuan
                    </button>
                </a>
      
                <table class="table">
                  <thead>
                    <tr>
                        <th class="text-center col-1" scope="col">No</th>
                        <th class="text-center col-2" scope="col">Kolom 1</th>
                        <th class="text-center col-4" scope="col">Kolom 2</th>
                        <th class="text-center col-2" scope="col">Kolom 3</th>
                        <th class="text-center col-3" scope="col">Aksi</th>
                        </tr>
                  </thead>
                  <tbody>
                  <tr th:each="mahasiswa, index : ${mahasiswaList}">
                    <th class="text-center">
                      <span th:text="${index.count}"></span>
                    </th>
                    <td class="text-center">
                      <span th:text="${mahasiswa.nim}"></span>
                    </td>
                    <td class="text-center">
                      <span th:text="${mahasiswa.namaMahasiswa}"></span>
                    </td>
                    <td class="text-center">
                      <span th:text="${mahasiswa.jurusan.namaJurusan}"></span>
                    </td>
                    <td>
                      <div class="d-flex align-items-center justify-content-center gap-2">
                        <button class="btn btn-success" th:data-id="${mahasiswa.id}">
                          <a class="text-decoration-none text-light fw-semibold" th:href="@{/mahasiswa/detail/{nim}(nim=${mahasiswa.nim})}">
                            <i class="fa-solid fa-eye"></i>
                            <span>Lihat</span>
                          </a>
                        </button>
                        <button class="btn btn-info" th:data-id="${mahasiswa.id}">
                          <a class="text-decoration-none text-light fw-semibold" th:href="@{/mahasiswa/edit/{nim}(nim=${mahasiswa.nim})}">
                            <i class="fa-regular fa-pen-to-square"></i>
                            <span>Edit</span>
                          </a>
                        </button>
                        <button class="btn btn-danger" th:data-id="${mahasiswa.id}">
                          <a class="text-decoration-none text-light fw-semibold" th:href="@{/mahasiswa/delete/{nim}(nim=${mahasiswa.nim})}">
                            <i class="fa-solid fa-trash"></i>
                            <span>Hapus</span>
                          </a>
                        </button>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </section>

    <x-slot name="js">
    </x-slot>
</x-dashboard.layouts.layouts>