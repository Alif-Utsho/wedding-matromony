@extends('frontend.layouts.usermaster')
@section('user_content')
    <div class="col-md-8 col-lg-9">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-8 db-sec-com">
                <h2 class="db-tit">
                    Profiles status
                    <span class="float-end" style="font-size: 15px;"><a href="{{ route('user.profile.download') }}" class=" border rounded px-2 py-1"><i class="fa fa-download"></i> Biodata </a>
                </h2>
                
                <div class="db-profile">
                    <div class="img">
                        <img src="{{ asset($user->profile->image) }}" loading="lazy" alt="">
                    </div>
                    <div class="edit">
                        <a class="cta-dark" href="{{ route('user.profileEdit') }}">Edit profile</a>
                    </div>
                </div>
            </div>
            @include('frontend.includes.profile-card')

        </div>

        <div class="row">
            <h2 class="db-tit">Profile Images</h2>

            @foreach ($user->profile->images as $userimage)
                <div class="col-md-3 col-lg-3 col-xl-3 db-sec-com">
                    <div class="db-profile"
                        style="
                        background: transparent;
                        box-shadow: none;
                        padding: 0;
                    ">
                        <div class="img">
                            <img src="{{ asset($userimage->image) }}" loading="lazy" alt="">
                        </div>
                        <form action="{{ route('user.imageDelete') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $userimage->id }}" name="imageId">
                            <div class="edit">
                                <button type="submit" class="col-12">
                                    <a class="cta-dark">Delete</a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="col-md-3 col-lg-3 col-xl-3 db-sec-com">
                <div class="db-profile text-center"
                    style="
                        background: #fff;
                        padding: 0;
                    ">
                    <form action="{{ route('user.imageUpload') }}" method="POST" enctype="multipart/form-data"
                        id="uploadForm">
                        @csrf


                        <div class="profile-uploadOuter">
                            <span class="profile-dragBox rounded">
                                Darg and Drop image here
                                <input type="file" onChange="dragNdrop(event)" ondragover="drag()" ondrop="drop()"
                                    id="uploadFile" name="images[]" multiple />
                            </span>
                        </div>
                        <div id="preview" class="mb-2"></div>
                        <div class="edit">
                            <button type="submit" class="col-12">
                                <a class="cta-dark">Upload</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-12 db-sec-com db-pro-stat-pg">
                <h2 class="db-tit">Profiles views</h2>
                <div class="db-pro-stat-view-filter cho-round-cor chosenini">
                    <div>
                        <select class="chosen-select">
                            <option value="">Current month</option>
                            <option value="">Jan 2024</option>
                            <option value="">Fan 2024</option>
                            <option value="">Mar 2024</option>
                            <option value="">Apr 2024</option>
                            <option value="">May 2024</option>
                            <option value="">Jun 2024</option>
                        </select>
                    </div>
                </div>
                <div class="chartin">
                    <canvas id="Chart_leads"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('user-script')
        <!-- JavaScript to handle drag-and-drop -->
        <script>
            "use strict";

            function dragNdrop(event) {
                var preview = document.getElementById("preview");
                preview.innerHTML = ""; // Clear any existing images

                // Loop through all selected files
                for (let i = 0; i < event.target.files.length; i++) {
                    var fileName = URL.createObjectURL(event.target.files[i]);
                    var previewImg = document.createElement("img");
                    previewImg.setAttribute("src", fileName);
                    previewImg.setAttribute("class", "preview-image"); // Optional: Add a class for styling
                    preview.appendChild(previewImg);
                }
            }

            function drag() {
                document.getElementById('uploadFile').parentNode.className = 'profile-draging profile-dragBox';
            }

            function drop() {
                document.getElementById('uploadFile').parentNode.className = 'profile-dragBox';
            }
        </script>
    @endpush
@endsection
