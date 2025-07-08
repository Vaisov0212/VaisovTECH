 @include('layout.header')
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"

                       src="{{ asset('storage/' . $user->avatar) }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                 {{ $user->edu }}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{ $user->location }}</p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Bio</strong>

                <p class="text-muted">{{ $user->bio }}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link  " href="#timeline" data-toggle="tab">ma'lumotlar</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">sozlamalar</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        ssvhgsv
                    <!-- Post -->
                    <div class="post">
                    </div>
                    <!-- /.post -->
                        </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->


                    <form class="form-horizontal" action="{{ route('info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">F.I.Sh:</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" id="inputName"  placeholder="F.I.Sh" required >
                        </div>
                      </div>
                    <!-- phone mask -->

                      <div class="form-group row">
                         <label for="inputEmail" class="col-sm-2 col-form-label">Tel:</label>
                          <div class="col-sm-10">
                            <div class="input-group">
                                 <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                 </div>
                                 <input type="text" name="phone" placeholder="(998)-99-___ - __ - __" class="form-control"  maxlength="12" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                            </div>
                          </div>
                        </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Bio:</label>
                        <div class="col-sm-10">
                          <input type="text" name="bio" class="form-control" id="inputName2" placeholder="Bio" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Manzil:</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="location" id="inputExperience" placeholder="Viloyat, Tuman/Shahar" required></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                         <label for="inputSkills" class="col-sm-2 col-form-label">Sinf:</label>
                         <div  class="col-sm-10">

                        <select name="class"  id="inputSkills" class="form-control" required >
                            <option selected="selected">4</option>
                            <option value="5" >5</option>
                            <option value="6" >6</option>
                            <option value="7" >7</option>
                            <option value="8" >8</option>
                            <option value="9" >9</option>
                            <option value="10" >10</option>
                            <option value="11" >11</option>
                            <option value="12">Boshqa</option>
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label"  >Rasm:</label>
                        <div class="col-sm-10">
                           <input type="file" name="avatar" class="form-control" id="customFile" required accept="image/*">
                            <label class="custom-file-label" for="customFile">Fayl tanlang</label>
                        </div>
                      </div>
                        {{-- <a href="{{ route('profile_show') }}"></a> --}}
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>

                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 @include('layout.footer')
