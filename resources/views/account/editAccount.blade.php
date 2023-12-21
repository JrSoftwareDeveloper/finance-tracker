<x-authlayout>
    <x-bannerPrimary :Image="'https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'" class="top-0" />
    <x-stickyNavbar />
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Edit {{ $account->name }}</h4>
                                    <p class="mb-0">Details to create a new account</p>
                                </div>
                                <div class="card-body bg-white">
                                    <form method="POST"
                                        action="{{ route('edit.account.update', ['id' => $account->id]) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg" name="name"
                                                placeholder="Account Name" aria-label="Account Name"
                                                value="{{ $account->name }}">
                                            @error('name')
                                                <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select form-control-lg" aria-label="Type"
                                                name="type">
                                                <option value="">Account Type</option>
                                                <option value="current"
                                                    {{ $account->type == 'current' ? 'selected' : '' }}>
                                                    Current
                                                </option>
                                                <option value="saving"
                                                    {{ $account->type == 'saving' ? 'selected' : '' }}>
                                                    Saving
                                                </option>

                                            </select>
                                            @error('type')
                                                <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="file" name="icon" class="form-control"
                                                id="inputGroupFile02" accept="image/*">
                                            @error('icon')
                                                <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <img src="{{ $account->icon ? asset('storage/' . $account->icon) : asset('/storage/icons/no-image.png') }}"
                                                alt="icon" class="img-fluid" width="100px">
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" class="form-control form-control-lg" name="balance"
                                                placeholder="Balance" aria-label="Balance"
                                                value="{{ $account->balance }}">
                                            @error('balance')
                                                <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Update
                                                Account</button>
                                        </div>
                                    </form>
                                    <form method="POST"
                                        action="{{ route('delete.account', ['id' => $account->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-lg btn-danger btn-lg w-100 mt-4 mb-0">Delete Account</button>
                                    </form>
                                </div>

                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="text-sm mx-1">
                                        Account once <b>Deleted</b> can not be recovered.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
</x-authlayout>
