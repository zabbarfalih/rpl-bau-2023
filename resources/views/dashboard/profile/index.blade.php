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
                            <div class="col-lg-3 col-md-4 label">Jabatan</div>
                            <div class="col-lg-9 col-md-8">Penguasa Bumi</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Alamat</div>
                            <div class="col-lg-9 col-md-8">Bonasel</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">No Telepon</div>
                            <div class="col-lg-9 col-md-8">089123459</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Email</div>
                            <div class="col-lg-9 col-md-8">
                                {{ auth()->user()->email }}
                            </div>
                        </div>
                    </div>

                    <div
                        class="tab-pane fade profile-edit pt-3"
                        id="profile-edit"
                        >
                        <!-- Profile Edit Form -->
                        <form>
                            <div class="row mb-3">
                                <label
                                    for="profileImage"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Profile Image</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <img src={{ asset('assets/img/profile-img.jpg') }} alt="Profile" />
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
                                    >Full Name</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    id="fullName"
                                    value="{{ old('name') ?? auth()->user()->name }}"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="about"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >About</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <textarea
                                    name="about"
                                    class="form-control"
                                    id="about"
                                    style="height: 100px"
                                    >Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="company"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Company</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="company"
                                    type="text"
                                    class="form-control"
                                    id="company"
                                    value="Lueilwitz, Wisoky and Leuschke"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="Job"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Job</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="job"
                                    type="text"
                                    class="form-control"
                                    id="Job"
                                    value="Web Designer"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="Country"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Country</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="country"
                                    type="text"
                                    class="form-control"
                                    id="Country"
                                    value="USA"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="Address"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Address</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="address"
                                    type="text"
                                    class="form-control"
                                    id="Address"
                                    value="A108 Adam Street, New York, NY 535022"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="Phone"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Phone</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="phone"
                                    type="text"
                                    class="form-control"
                                    id="Phone"
                                    value="(436) 486-3538 x29071"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="Email"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Email</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="email"
                                    type="email"
                                    class="form-control"
                                    id="Email"
                                    value="{{ old('email') ?? auth()->user()->email }}"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="Twitter"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Twitter Profile</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="twitter"
                                    type="text"
                                    class="form-control"
                                    id="Twitter"
                                    value="https://twitter.com/#"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="Facebook"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Facebook Profile</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="facebook"
                                    type="text"
                                    class="form-control"
                                    id="Facebook"
                                    value="https://facebook.com/#"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="Instagram"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Instagram Profile</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="instagram"
                                    type="text"
                                    class="form-control"
                                    id="Instagram"
                                    value="https://instagram.com/#"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="Linkedin"
                                    class="col-md-4 col-lg-3 col-form-label"
                                    >Linkedin Profile</label
                                >
                                <div class="col-md-8 col-lg-9">
                                    <input
                                    name="linkedin"
                                    type="text"
                                    class="form-control"
                                    id="Linkedin"
                                    value="https://linkedin.com/#"
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
                                >Password Anda saat ini</label
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
                                >Password baru</label
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
                                >Password baru</label
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