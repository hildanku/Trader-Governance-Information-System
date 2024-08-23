@extends('_voler.layout.master')

@section('content')
<h1> Profile Dashboard </h1>
<section class="section">
    <div class="row mb-12">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Your Profile</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="http://localhost:8080/frontend/assets/images/avatar/avatar-s-1.png" alt="Admin" class="rounded-circle p-1" width="110">
                        <div class="mt-3">
                            <h4>{{ $user->fullname }}</h4>
                            <h5><!-- Employment --> at <!-- Company --></h5>
                            <p class="text-secondary mb-1"></p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-muted"><!-- Created at --></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile and Account Settings</h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="account-settings-tab" data-bs-toggle="tab" href="#account-settings" role="tab" aria-controls="account-settings" aria-selected="false" tabindex="-1">Account Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="col-md-12 col-12">
                                <!-- Success Message -->
                                <!-- Profile Data Check -->
                                <form class="form mt-4" action="/my/profile/update" method="post">
                                    <input type="hidden" name="userid" value="<!-- User ID -->">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="full-name-column">Full Name</label>
                                                <input type="text" class="form-control" name="fullname" value="<!-- Full Name -->">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="gender-column">Gender</label>
                                                <input type="text" class="form-control" name="gender" value="<!-- Gender -->">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="address-column">Address</label>
                                                <input type="text" class="form-control" name="address" value="<!-- Address -->">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="home-phone-number-column">Home Phone Number</label>
                                                <input type="text" class="form-control" name="homePhoneNumber" value="<!-- Home Phone Number -->">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-settings" role="tabpanel" aria-labelledby="account-settings-tab">
                            <div class="col-md-12 col-12">
                                <form class="form mt-4" action="/my/profile/authentication/update" method="post">
                                    <!-- Flashdata Check -->
                                    <div class="row">
                                        <!-- UserData Check -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-column">Email</label>
                                                <input type="email" class="form-control" name="email" value="<!-- Email -->">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="username-column">Username</label>
                                                <input type="text" class="form-control" name="username" value="<!-- Username -->">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="password-column">Password</label>
                                                <input type="password" class="form-control" name="password" value="<!-- Password -->">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection