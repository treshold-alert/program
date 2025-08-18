<div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
        <li class="nav-item">
            <a class="btn btn-danger" href="javascript:void(0);"><i
                    class="mdi mdi-account-outline mdi-20px me-1"></i>Account</a>
        </li>
    </ul>
    <div class="card mb-1">
        <h4 class="card-header">Detail Profil</h4>
        <div class="card-body">
            <form id="formAccountSettings" method="POST" onsubmit="return false">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" type="text" id="username" name="username"
                                value="{{ Auth::user()->username }}" autofocus readonly />
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" type="text" name="email" id="email"
                                value="{{ Auth::user()->email }}"readonly />
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" type="text" name="phone_number" id="phone_number"
                                value="{{ Auth::user()->phone_number }}"readonly />
                            <label for="phone_number">Phone Number</label>
                        </div>
                    </div>
                </div>
                {{-- <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                </div> --}}
            </form>
        </div>
        <h4 class="card-header">Change Password</h4>
        <div class="card-body">
            <form id="formAccountSettings" method="POST" action="{{ route('password.edit') }}">
                @csrf
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" type="password" name="current_password" id="current"
                                required />
                            <label for="current">Current Password</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" type="password" name="new_password" id="new" required />
                            <label for="new">New Password</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" type="password" name="new_password_confirmation"
                                id="new_confirmation" required />
                            <label for="new_confirmation">Confirm New Password</label>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-danger me-2">Save changes</button>
                </div>
            </form>

        </div>
        <!-- /Account -->
    </div>
</div>
