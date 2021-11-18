@php 
    
    $get_user_permission = get_user_permission();

@endphp

<div class="bottombar bg-light">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <span class="copyright">© Winku 2018. All rights reserved.</span>
             <i><img src="{{ asset('assets/images/credit-cards.png') }}" alt=" text-secondary"></i>
          </div>
       </div>
    </div>
 </div>
 </div>
 <div class="side-panel">
    <h4 class="panel-title">General Setting</h4>
    <form method="post">
       <div class="setting-row">
          <span>use night mode</span>
          <input type="checkbox" id="nightmode1" @if($get_user_permission->night_mode == 0) onclick="acitve_settings('night_mode','1','nightmode1')" @else checked="true"  onclick="acitve_settings('night_mode','0','nightmode1')" @endif/>
          <label for="nightmode1"  data-on-label="ON"  data-off-label="OFF"></label>
       </div>
       <div class="setting-row">
          <span>Notifications</span>
          <input type="checkbox" id="switch22" @if($get_user_permission->notification == 0) onclick="acitve_settings('notification','1','switch22')" @else checked="true" onclick="acitve_settings('notification','0','switch22')" @endif/>
          <label for="switch22" data-on-label="ON"  data-off-label="OFF" ></label>
       </div>
       <div class="setting-row">
          <span>Notification sound</span>
          <input type="checkbox" id="switch33" @if($get_user_permission->notificaiton_sound == 0) onclick="acitve_settings('notificaiton_sound','1','switch33')" @else checked="true"  onclick="acitve_settings('notificaiton_sound','0','switch33')" @endif/>
          <label for="switch33"data-on-label="ON" data-off-label="OFF"></label>
       </div>
       <div class="setting-row">
          <span>My profile</span>
          <input type="checkbox" id="switch44" @if($get_user_permission->my_profile == 0) onclick="acitve_settings('my_profile','1','switch44')" @else checked="true" onclick="acitve_settings('my_profile','0','switch44')" @endif/>
          <label for="switch44"  data-on-label="ON"   data-off-label="OFF" ></label>
       </div>
       <div class="setting-row">
          <span>Show profile</span>
          <input type="checkbox" id="switch55" @if($get_user_permission->show_profile == 0) onclick="acitve_settings('show_profile','1','switch55')" @else checked="true" onclick="acitve_settings('show_profile','0','switch55')" @endif/>
          <label for="switch55"   data-on-label="ON"   data-off-label="OFF" ></label>
       </div>
    </form>
    <h4 class="panel-title">Account Setting</h4>
    <form method="post">
       <div class="setting-row">
          <span>Sub users</span>
          <input type="checkbox"  id="switch66" @if($get_user_permission->sub_users == 0) onclick="acitve_settings('sub_users','1','switch66')" @else checked="true"  onclick="acitve_settings('sub_users','0','switch66')" @endif/>
          <label for="switch66" data-on-label="ON"   data-off-label="OFF" ></label>
       </div>
       <div class="setting-row">
          <span>personal account</span>
          <input type="checkbox" id="switch77" @if($get_user_permission->personal_account == 0) onclick="acitve_settings('personal_account','1','switch77')"  @else checked="true" onclick="acitve_settings('personal_account','0','switch77')" @endif/>
          <label for="switch77"  data-on-label="ON"   data-off-label="OFF" ></label>
       </div>
       <div class="setting-row">
          <span>Business account</span>
          <input type="checkbox" id="switch88" @if($get_user_permission->bussiness_account == 0) onclick="acitve_settings('bussiness_account','1','switch88')"   @else checked="true" onclick="acitve_settings('bussiness_account','0','switch88')" @endif/>
          <label bussiness_account for="switch88"  data-on-label="ON"   data-off-label="OFF" ></label>
       </div>
       <div class="setting-row">
          <span>Show me online</span>
          <input type="checkbox" id="switch99" @if($get_user_permission->show_me_online == 0) onclick="acitve_settings('show_me_online','1','switch99')" @else checked="true" onclick="acitve_settings('show_me_online','0','switch99')" @endif/>
          <label for="switch99" data-on-label="ON"   data-off-label="OFF" ></label>
       </div>
       <div class="setting-row">
          <span>Delete history</span>
          <input type="checkbox" id="switch101" @if($get_user_permission->delete_history == 0) onclick="acitve_settings('delete_history','1','switch101')" @else checked="true" onclick="acitve_settings('delete_history','0','switch101')" @endif/>
          <label for="switch101"  data-on-label="ON"   data-off-label="OFF" ></label>
       </div>
       <div class="setting-row">
          <span>Expose author name</span> 
          <input type="checkbox" id="switch111" @if($get_user_permission->expose_author_name == 0) onclick="acitve_settings('expose_author_name','1','switch111')" @else checked="true" onclick="acitve_settings('expose_author_name','0','switch111')" @endif/>
          <label for="switch111"  data-on-label="ON"   data-off-label="OFF" ></label>
       </div>
       {{ csrf_field() }}
    </form>
 </div>