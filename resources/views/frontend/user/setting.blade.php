@extends('frontend.layouts.usermaster')
@section('user_content')
<div class="col-md-8 col-lg-9">
    <div class="row">
        <div class="col-md-12 db-sec-com">
            <h2 class="db-tit">Profile settings</h2>
            <div class="col7 fol-set-rhs">
                <!--START-->
                <div class="ms-write-post fol-sett-sec sett-rhs-pro">
                    <div class="foll-set-tit fol-pro-abo-ico">
                        <h4>Profile</h4>
                    </div>
                    <div class="fol-sett-box">
                        <ul>
                            <li>
                                <div class="sett-lef">
                                    <div class="auth-pro-sm sett-pro-wid">
                                        <div class="auth-pro-sm-img">
                                            <img src="{{ asset(Auth::guard('user')->user()->profile->image) }}" alt="">
                                        </div>
                                        <div class="auth-pro-sm-desc">
                                            <h5>{{ Auth::guard('user')->user()->name }}</h5>
                                            <p>{{ Auth::guard('user')->user()->currentPackage()->name }} user </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="sett-rig">
                                    <a href="{{ route('user.logout') }}" class="set-sig-out">Sign Out</a>
                                </div>
                            </li>
                            <li>
                                <div class="sett-lef">
                                    <div class="sett-rad-left">
                                        <h5>Profile visible</h5>
                                        <p>You can set-up who can able to view your profile.</p>
                                    </div>
                                </div>
                                <div class="sett-rig">
                                    <div class="sett-select-drop">
                                        <select>
                                          <option value="All users">All users</option>
                                          <option value="Premium">Premium</option>
                                          <option value="Free">Free</option>
                                          <option value="Free">No-more visible(You can't visible, so no one can view your profile)</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sett-lef">
                                    <div class="sett-rad-left">
                                        <h5>Who can send you Interest requests?</h5>
                                        <p>You can set-up who can able to make Interest request here.</p>
                                    </div>
                                </div>
                                <div class="sett-rig">
                                    <div class="sett-select-drop">
                                        <select>
                                            <option value="All users">All users</option>
                                            <option value="Premium">Premium</option>
                                            <option value="Free">Free</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--END-->	
                <!--START-->
                <div class="ms-write-post fol-sett-sec sett-rhs-acc">
                    <div class="foll-set-tit fol-pro-abo-ico">
                        <h4>Account</h4><a href="{{ route('user.profileEdit') }}" class="sett-edit-btn sett-acc-edit-eve"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                    </div>
                    <div class="fol-sett-box sett-acc-view sett-two-tab">
                        <ul>
                            <li>
                                <div>Full name</div>
                                <div>{{ Auth::guard('user')->user()->name }}</div>
                            </li>
                            <li>
                                <div>Mobile</div>
                                <div>{{ Auth::guard('user')->user()->phone }}</div>
                            </li>
                            <li>
                                <div>Email id</div>
                                <div>{{ Auth::guard('user')->user()->email }}</div>
                            </li>
                            <li>
                                <div>Password</div>
                                <div>**********</div>
                            </li>
                            <li>
                                <div>Profile type</div>
                                <div>{{ Auth::guard('user')->user()->currentPackage()->name }}</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--END-->	
                <!--START-->
                <div class="ms-write-post fol-sett-sec sett-rhs-not">
                    <div class="foll-set-tit fol-pro-abo-ico">
                        <h4>Notifications</h4>
                    </div>
                    <div class="fol-sett-box">
                        <ul>
                            <li>
                                <div class="sett-lef">
                                    <div class="sett-rad-left">
                                        <h5>Interest request</h5>
                                        <p>Interest request email notificatios</p>
                                    </div>
                                </div>
                                <div class="sett-rig">
                                    <div class="checkboxes-and-radios">
                                       <input type="checkbox" name="checkbox-cats" id="sett-not-mail" value="1" checked="">
                                        <label for="sett-not-mail"></label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sett-lef">
                                    <div class="sett-rad-left">
                                        <h5>Chat</h5>
                                        <p>New chat notificatios</p>
                                    </div>
                                </div>
                                <div class="sett-rig">
                                    <div class="checkboxes-and-radios">
                                       <input type="checkbox" name="checkbox-cats" id="sett-not-fri" value="1" checked="">
                                        <label for="sett-not-fri"></label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sett-lef">
                                    <div class="sett-rad-left">
                                        <h5>Profile views</h5>
                                        <p>If any one view your profile means you get the notifications at end of the day</p>
                                    </div>
                                </div>
                                <div class="sett-rig">
                                    <div class="checkboxes-and-radios">
                                       <input type="checkbox" name="checkbox-cats" id="sett-not-fol" value="1" checked="">
                                        <label for="sett-not-fol"></label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sett-lef">
                                    <div class="sett-rad-left">
                                        <h5>New profile match</h5>
                                        <p>You get the profile match emails</p>
                                    </div>
                                </div>
                                <div class="sett-rig">
                                    <div class="checkboxes-and-radios">
                                       <input type="checkbox" name="checkbox-cats" id="sett-not-mes" value="1" checked="">
                                        <label for="sett-not-mes"></label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--END-->
                                       
            </div>
        </div>
    </div>
</div>
@endsection