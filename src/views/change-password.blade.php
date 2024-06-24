<div class="dbody">
    <div class="dbody-inner">
         @include('message')
        <div class="dashHead">
            <div class="dashHead-left">
                <h4 class="dashTitle">Change Password</h4>
                <p></p>
            </div>
        </div>
        <div class="dashBoard-tiles">
            <div class="dashBoard-tile">
                <div class="dForm-middle">
                    <div class="dForm">

                        <form action="{{ route('AbnCmsAdminTheme-update-password') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                               <div class="row">
                                    <div class="col">
                                        <div class="dForm-group">
                                            <label class="dForm-label">Old Password<span class="mandatory">*</span></label>
                                            <input class="dForm-control" type="password" required="" name="old_password" value="" placeholder="Old Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col">
                                        <div class="dForm-group">
                                            <label class="dForm-label">New Password<span class="mandatory">*</span></label>
                                            <input class="dForm-control password-policy" type="password" name="new_password" value="" placeholder="New Password" id="new_password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col">
                                        <div class="dForm-group">
                                            <label class="dForm-label">Confirm Password<span class="mandatory">*</span></label>
                                            <input class="dForm-control password-policy" type="password" name="confirm_password" value="" placeholder="Confirm Password" id="confirm_password">
                                        </div>
                                    </div>
                                </div>

                            </div>
                             <div class="row">
                            <div class="col">
                                <div class="dForm-actions form-buttons">
                                
                                    <button class="buttons secondary" type="submit" name="button">Update</button>
                                    
                                </div>
                                <div class="dForm-actions loader" style="display: none;">
                                
                                    <a class="buttons secondary" href="javascript:;" style="float: left"><img src="{{url('public/asset/images/loader-white.gif')}}" class="loader_img"> </a>
                                    
                                </div>
                            </div>
                        </div>

                            <!-- <div class="card-footer">
                                <button class="btn btn-success">Submit</button>
                            </div> -->

                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
