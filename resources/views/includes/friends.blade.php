@php
    $allusers = alluser();
@endphp
<div class="widget friend-list stick-widget">
    <h4 class="widget-title">Friends</h4>
    <div id="searchDir"></div>
    <ul id="people-list" class="friendz-list">

        @foreach($allusers as $alluser)
        <li>
            <figure>
                <img src="{{ asset('upload/images/profile_photo/'.$alluser->profile_photo.'') }}" alt="">
                <span class="status f-online"></span>
            </figure>
            <div class="friendz-meta">
                <a href="time-line.html">{{$alluser->name}}</a>
                <i>{{$alluser->email}}</i>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="chat-box">
        <div class="chat-head">
            <span class="status f-online"></span>
            <h6>Bucky Barnes</h6>
            <div class="more">
                <span><i class="ti-more-alt"></i></span>
                <span class="close-mesage"><i class="ti-close"></i></span>
            </div>
        </div>
        <div class="chat-list">
            <ul>
                <li class="me">
                    <div class="chat-thumb"><img src="{{ asset('assets/images/resources/chatlist1.jpg') }}" alt=""></div>
                    <div class="notification-event">
                        <span class="chat-message-item">
                            Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                        </span>
                        <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                    </div>
                </li>
                <li class="you">
                    <div class="chat-thumb"><img src="{{ asset('assets/images/resources/chatlist2.jpg') }}" alt=""></div>
                    <div class="notification-event">
                        <span class="chat-message-item">
                            Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                        </span>
                        <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                    </div>
                </li>
                <li class="me">
                    <div class="chat-thumb"><img src="{{ asset('assets/images/resources/chatlist1.jpg') }}" alt=""></div>
                    <div class="notification-event">
                        <span class="chat-message-item">
                            Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
                        </span>
                        <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
                    </div>
                </li>
            </ul>
            <form class="text-box">
                <textarea placeholder="Post enter to post..."></textarea>
                <div class="add-smiles">
                    <span title="add icon" class="em em-expressionless"></span>
                </div>
                <div class="smiles-bunch">
                    <i class="em em---1"></i>
                    <i class="em em-smiley"></i>
                    <i class="em em-anguished"></i>
                    <i class="em em-laughing"></i>
                    <i class="em em-angry"></i>
                    <i class="em em-astonished"></i>
                    <i class="em em-blush"></i>
                    <i class="em em-disappointed"></i>
                    <i class="em em-worried"></i>
                    <i class="em em-kissing_heart"></i>
                    <i class="em em-rage"></i>
                    <i class="em em-stuck_out_tongue"></i>
                </div>
                <button type="submit"></button>
            </form>
        </div>
    </div>
</div><!-- friends list sidebar -->