<x-dashboard.layouts.layouts :menus="$menus">
    <x-slot name="css">
    </x-slot>

    <x-slot name="js_head">
    </x-slot>
    
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div
                    class="card-body profile-card pt-4 d-flex flex-column align-items-center"
                    >
                    <img
                        src={{ asset('assets/img/profile-img.jpg') }}
                        alt="Profile"
                        class="rounded-circle"
                    />
                    {{-- <h2>Otong Surotong</h2> --}}
                    <h2>{{ auth()->user()->name }}</h2>
                    <h3>{{ auth()->user()->nip }}</h3>
                    <div class="social-links mt-2">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"
                        ><i class="bi bi-facebook"></i
                        ></a>
                        <a href="#" class="instagram"
                        ><i class="bi bi-instagram"></i
                        ></a>
                        <a href="#" class="linkedin"
                        ><i class="bi bi-linkedin"></i
                        ></a>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                        <button
                            class="nav-link active"
                            data-bs-toggle="tab"
                            data-bs-target="#profile-overview"
                        >
                            Overview
                        </button>
                        </li>

                        <li class="nav-item">
                        <button
                            class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#profile-edit"
                        >
                            Edit Profile
                        </button>
                        </li>

                        <li class="nav-item">
                        <button
                            class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#profile-change-password"
                        >
                            Ubah Password
                        </button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2">
                        <div
                        class="tab-pane fade show active profile-overview"
                        id="profile-overview"
                        >
                        <h5 class="card-title">Detail Profil</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                            <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">NIP</div>
                            <div class="col-lg-9 col-md-8">{{ auth()->user()->nip }}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Email</div>
                            <div class="col-lg-9 col-md-8">
                                {{ auth()->user()->email }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Role</div>
                            <div class="col-lg-9 col-md-8">
                                @foreach(auth()->user()->roles as $role)
                                    <button class="btn btn-sm btn-primary disabled">{{ $role->name }}</button>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Alamat</div>
                            <div class="col-lg-9 col-md-8">
                                {{ auth()->user()->address }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">No Telepon</div>
                            <div class="col-lg-9 col-md-8">{{ auth()->user()->phone_number }}</div>
                        </div>
                    </div>

                    <div
                        class="tab-pane fade profile-edit pt-3"
                        id="profile-edit"
                        >
                        <!-- Profile Edit Form -->
                        <form>
                            @csrf
                            <div class="row mb-3">
                                <label
                                    for="profileImage"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Gambar Profil</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <div class="d-flex justify-content-center align-items-center" style="width: 120px; height: 120px; border-radius: 50%;">
                                        @if($user->picture && Storage::disk('public')->exists($user->picture))
                                            <img src="{{ asset('storage/'.$user->picture) }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">
                                        @else
                                            <i class="bi bi-person-circle" style="font-size: 120px;"></i>
                                        @endif
                                    </div>

                                    <div class="pt-2">
                                    <a
                                        href="#"
                                        class="btn btn-primary btn-sm"
                                        title="Upload new profile image"
                                        ><i class="bi bi-upload"></i
                                    ></a>
                                    <a
                                        href="#"
                                        class="btn btn-danger btn-sm"
                                        title="Remove my profile image"
                                        ><i class="bi bi-trash"></i
                                    ></a>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="fullName"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Nama Lengkap</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    id="fullName"
                                    value="{{ auth()->user()->name }}"
                                    disabled
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="nip"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >NIP</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="nip"
                                    type="text"
                                    class="form-control"
                                    id="nip"
                                    value="{{ auth()->user()->nip }}"
                                    disabled
                                    />
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label
                                    for="emai"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Email</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="email"
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    value="{{ auth()->user()->email }}"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="email"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Role</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    @foreach(auth()->user()->roles as $role)
                                        <button class="btn btn-sm btn-primary disabled">{{ $role->name }}</button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="address"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Alamat</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <textarea
                                    name="address"
                                    class="form-control"
                                    id="address"
                                    style="height: 100px"
                                    >{{ auth()->user()->address }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="phoneNumber"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >No Telepon</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="phoneNumber"
                                    type="text"
                                    class="form-control"
                                    id="phoneNumber"
                                    value="{{ auth()->user()->phone_number }}"
                                    />
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </form>
                        <!-- End Profile Edit Form -->
                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password">
                        <!-- Change Password Form -->
                        <form>
                            <div class="row mb-3">
                            <label
                                for="currentPassword"
                                class="col-md-4 col-lg-3 col-form-label"
                                >Password Lama</label
                            >
                            <div class="col-md-8 col-lg-9">
                                <input
                                name="password"
                                type="password"
                                class="form-control"
                                id="currentPassword"
                                />
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label
                                for="newPassword"
                                class="col-md-4 col-lg-3 col-form-label"
                                >Password Baru</label
                            >
                            <div class="col-md-8 col-lg-9">
                                <input
                                name="newpassword"
                                type="password"
                                class="form-control"
                                id="newPassword"
                                />
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label
                                for="renewPassword"
                                class="col-md-4 col-lg-3 col-form-label"
                                >Konfirmasi Password Baru</label
                            >
                            <div class="col-md-8 col-lg-9">
                                <input
                                name="renewpassword"
                                type="password"
                                class="form-control"
                                id="renewPassword"
                                />
                            </div>
                            </div>

                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                Ubah Password
                            </button>
                            </div>
                        </form>
                        <!-- End Change Password Form -->
                        </div>
                    </div>
                    <!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="js_body">
    </x-slot>
</x-dashboard.layouts.layouts>