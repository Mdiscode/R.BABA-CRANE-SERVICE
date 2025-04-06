<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        {{-- <form class="search-form"> --}}
            <div class="input-group items-center justify-center">
                
                <P class="text-2xl  text-orange-600">@lang('message.rbaba')</P>
            </div>
        {{-- </form> --}}
        <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-item">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flag-icon flag-icon-in mt-1" title="India" id="current-flag"></i> <span
                        class="ms-1 me-1 d-none d-md-inline-block" id="lang">India</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <a href="{{url('admin/locale/gu')}}" class="dropdown-item py-2"> <i class="flag-icon flag-icon-in"
                            title="india" id="india"></i> <span class="ms-1" id="gu"> Gujrati</span></a>
                    <a href="{{url('admin/locale/hi')}}" class="dropdown-item py-2"><i class="flag-icon flag-icon-in"
                            title="india" id="fr"></i> <span class="ms-1" id="hi"> Hindi </span></a>
                    <a href="{{url('admin/locale/en')}}" class="dropdown-item py-2"><i class="flag-icon flag-icon-gb"
                            title="de" id="de"></i> <span class="ms-1" id="en"> English </span></a>
                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt"
                            title="pt" id="pt"></i> <span class="ms-1"> Portuguese
                        </span></a>
                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es"
                            title="es" id="es"></i> <span class="ms-1"> Spanish </span></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid"></i>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p class="mb-0 fw-bold">Web Apps</p>
                
                    </div>
                    <div class="row g-0 p-1">
                        <div class="col-3 text-center">
                            <a  href="{{route('company.invoice-list')}}"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70">
                                <i data-feather="file-text" class="icon-lg mb-1"></i>
                                <p class="tx-12">Invoice</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="{{route('admin.users.list')}}"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70">
                                <i class="bi bi-people-fill text-xl" ></i>   
                                <p class="tx-12">UserList</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="{{route('admin.email.compose')}}"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i
                                    data-feather="mail" class="icon-lg mb-1"></i>
                                <p class="tx-12">Email</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="{{url('admin/profile')}}"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i
                                    data-feather="instagram" class="icon-lg mb-1"></i>
                                <p  class="tx-12">Profile</p>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </li>
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="mail"></i>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>9 New Messages</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
                    <div class="p-1">
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle"
                                    src="https://via.placeholder.com/30x30" alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Leonardo Payne</p>
                                    <p class="tx-12 text-muted">Project status</p>
                                </div>
                                <p class="tx-12 text-muted">2 min ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle"
                                    src="https://via.placeholder.com/30x30" alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Carl Henson</p>
                                    <p class="tx-12 text-muted">Client meeting</p>
                                </div>
                                <p class="tx-12 text-muted">30 min ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle"
                                    src="https://via.placeholder.com/30x30" alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Jensen Combs</p>
                                    <p class="tx-12 text-muted">Project updates</p>
                                </div>
                                <p class="tx-12 text-muted">1 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle"
                                    src="https://via.placeholder.com/30x30" alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Amiah Burton</p>
                                    <p class="tx-12 text-muted">Project deatline</p>
                                </div>
                                <p class="tx-12 text-muted">2 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle"
                                    src="https://via.placeholder.com/30x30" alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>Yaretzi Mayo</p>
                                    <p class="tx-12 text-muted">New record</p>
                                </div>
                                <p class="tx-12 text-muted">5 hrs ago</p>
                            </div>
                        </a>
                    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="#inquiry">View all</a>
                    </div>
                </div>
            </li> --}}

            {{-- ----Notificationn----- --}}
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown"
                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell"></i>
                    <div class="indicator">
                        <div class="circle"></div>
                    </div>
                </a>
                
                <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>6 New Notifications</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
                    <div class="p-1">
                        @foreach ($notific as $noti)
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <i class="icon-sm text-white" data-feather="gift"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>New Order Recieved</p>
                                <p class="tx-12 text-muted">30 min ago</p>
                            </div>
                        </a> 
                        @endforeach
                        
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <i class="icon-sm text-white" data-feather="alert-circle"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>Server Limit Reached!</p>
                                <p class="tx-12 text-muted">1 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <img class="wd-30 ht-30 rounded-circle"
                                    src="https://via.placeholder.com/30x30" alt="userr">
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>New customer registered</p>
                                <p class="tx-12 text-muted">2 sec ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <i class="icon-sm text-white" data-feather="layers"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>Apps are ready for update</p>
                                <p class="tx-12 text-muted">5 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <i class="icon-sm text-white" data-feather="download"></i>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>Download completed</p>
                                <p class="tx-12 text-muted">6 hrs ago</p>
                            </div>
                        </a>
                    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="{{route('company.invoice-list')}}">View all</a>
                    </div>
                </div>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{asset('upload/'.Auth::user()->photo)}}"
                        alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle"
                                src="{{asset('upload/'.Auth::user()->photo)}}" alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{Auth::user()->name}}</p>
                            <p class="tx-12 text-muted">{{Auth::user()->email}}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="{{url('admin/profile')}}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{url('admin/profile')}}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Edit Profile</span>
                            </a>
                        </li>
                        
                        <li class="dropdown-item py-2">
                            <a href="{{route('admin.logout')}}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>


    <script>
        // Save selected language and flag on click
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function () {
                const flagClass = this.querySelector('i').className;
                const langText = this.querySelector('span').innerText.trim();
    
                sessionStorage.setItem('selectedFlag', flagClass);
                sessionStorage.setItem('selectedLang', langText);
    
                // Immediately update on click (optional)
                document.getElementById('current-flag').className = flagClass;
                document.getElementById('lang').textContent = langText;
            });
        });
    
        // Load on page refresh
        window.addEventListener('DOMContentLoaded', function () {
            const flag = sessionStorage.getItem('selectedFlag');
            const lang = sessionStorage.getItem('selectedLang');
    
            if (flag && lang) {
                document.getElementById('current-flag').className = flag;
                document.getElementById('lang').textContent = lang;
            }
        });
    </script>
    


    
</nav>